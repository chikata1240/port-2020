<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;
use App\Plan;

class ExampleTest extends TestCase
{
  /**
   * A basic test example.
   *
   * @return void
   */
  public function testBasicTest()
  {
    // // トップページ
    // $this->get('/')->assertStatus(200);
    // // メインページ
    // $this->get('/home')->assertStatus(302);
    // // // リプライページ
    // $this->get('/reply?id=1')->assertStatus(302);
    // $this->post('/reply_post?id=1')->assertStatus(302);
    // $this->get('/reply_delete?id=1')->assertStatus(302);
    // // // ユーザーページ
    // $this->get('/user')->assertStatus(302);
    // // // 計画確認ページ
    // $this->get('/details?id=1')->assertStatus(302);
    // $this->get('/details_destroy?id=1')->assertStatus(302);
    // $this->get('/details_arrival?id=1')->assertStatus(302);
    // $this->get('/details_release?id=1')->assertStatus(302);
    // // // 計画入力ページ
    // $this->get('/input?id=1')->assertStatus(302);
    // $this->post('/input_book?id=1')->assertStatus(302);
    // $this->post('/input_training?id=1')->assertStatus(302);
    // // // 実行入力ページ
    // $this->get('/archive')->assertStatus(302);
    // $this->get('/archive_delete?id=1')->assertStatus(302);
    // $this->post('/archive_book?id=1')->assertStatus(302);
    // $this->post('/archive_training?id=1')->assertStatus(302);
    // // // 画像登録ページ
    // $this->get('/user_edit')->assertStatus(302);
    // $this->post('/user_edit?id=1')->assertStatus(302);
    // // 存在しないページ
    // $this->get('/hoge')->assertStatus(404);
    $data = [
      'content' => '歩きます',
      'limit' => '歩きます',
      'rule' => '歩きます',
      'type' => 'training',
      'arrival' => 0,
      'user_id' => 1,
    ];
    $plans = new Plan();
    $plans->fill($data)->save();
    $this->assertDatabaseHas('plans',$data);

  }
  use RefreshDatabase;
}
