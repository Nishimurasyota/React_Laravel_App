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
}
