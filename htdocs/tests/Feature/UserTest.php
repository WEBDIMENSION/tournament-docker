<?php
namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class MyTest extends TestCase
{
/**
* A basic test example.
*
* @return void
*/
public function testExample()
{
$user = new \App\User;
$user->name = "山田";
$user->email = "yamada@test.com";
$user->password = \Hash::make('password');
$user->save();

$readUser = \App\User::where('name', '山田')->first();
$this->assertNotNull($readUser);            // データが取得できたかテスト
$this->assertTrue(\Hash::check('password', $readUser->password)); // パスワードが一致しているかテスト

\App\User::where('email', 'yamada@test.com')->delete(); // テストデータの削除
}
}