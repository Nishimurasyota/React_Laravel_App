<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;
use App\Models\Task;

class TaskTest extends TestCase
{
    use RefreshDatabase;
    /**
     * @test
     */
    public function 一覧取得テスト()
    {
        $tasks = Task::factory()->count(10)->create();

        $response = $this->getJson('api/tasks');

        $response->assertOk()
            ->assertJsonCount($tasks->count());
    }

    /**
     * @test
     */
    public function タイトルが空の場合の登録テスト()
    {

        $data = [
            "title" => ''
        ];

        $response = $this->postJson('api/tasks', $data);
        // dd($response->json());
        $response->assertStatus(422)
            ->assertJsonValidationErrors([
                "title" => "タイトルは、必ず指定してください。"
            ]);
    }

    /**
     * @test
     */
    public function タイトルが255文字の場合の登録テスト()
    {

        $data = [
            "title" => str_repeat("a", 256)
        ];

        $response = $this->postJson('api/tasks', $data);
        // dd($response->json());
        $response->assertStatus(422)
            ->assertJsonValidationErrors([
                "title" => "タイトルは、255文字以下にしてください。"
            ]);
    }


    /**
     * @test
     */
    public function 登録テスト()
    {

        $data = [
            "title" => "Test"
        ];

        $response = $this->postJson('api/tasks', $data);

        $response->assertCreated()
            ->assertJsonFragment($data);
    }


    /**
     * @test
     */
    public function 更新テスト()
    {

        $task = Task::factory()->create();

        $task->title = "更新";

        $response = $this->patchJson("api/tasks/{$task->id}", $task->toArray());

        // dd($task->toArray());

        $response->assertOk();
        // ->assertJsonFragment($task->toArray());
    }

    /**
     * @test
     */
    public function 削除テスト()
    {

        $task = Task::factory()->count(10)->create();


        $response = $this->deleteJson('api/tasks/2');
        $response->assertOk();

        $response = $this->getJson('api/tasks');
        $response->assertJsonCount($task->count() - 1);
    }
}
