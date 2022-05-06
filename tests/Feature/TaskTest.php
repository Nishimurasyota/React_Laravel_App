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
    public function 登録テスト()
    {

        $data = [
            "title" => 'テスト投稿'
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

        $response->assertOk()
            ->assertJsonFragment($task->toArray());
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

        // $response->assertOk()
        //     ->assertJsonFragment($task->toArray());
    }
}
