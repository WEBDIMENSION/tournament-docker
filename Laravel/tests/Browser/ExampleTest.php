<?php

namespace Tests\Browser;

use Tests\DuskTestCase;
use Laravel\Dusk\Browser;
use Illuminate\Foundation\Testing\DatabaseMigrations;

class ExampleTest extends DuskTestCase
{
    /**
     * A basic browser test example.
     *
     * @return void
     */
    public function testBasicExample()
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/')
                ->assertSee('today');
            $browser->visit('/login')
                    ->assertSee('Password');
//            echo $value = config('app.MIX_NODE_PORT');
//            echo 'test';
            $host = env('MIX_NODE_INTERNAL_HOST');
            $port = env('MIX_NODE_PORT');

            $browser->visit('https://'.$host.':'.$port)
                ->assertSee('Send');
        });
//        $this->browse(function (Browser $browser) {
//            $browser->visit('/login')
//                ->assertSee('Password');
//        });
    }
}
