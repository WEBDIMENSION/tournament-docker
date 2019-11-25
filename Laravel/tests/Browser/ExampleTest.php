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
            $host = env('MIX_NODE_INTERNAL_HOST');
            $port = env('MIX_NODE_PORT');
            $url = 'https://'.$host.':'.$port;
            $browser->visit($url)
                ->assertSee('Send');
//        $response = $this->get('https://'.$host.':'.$port);
        });
    }
}
