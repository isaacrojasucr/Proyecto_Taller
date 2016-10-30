<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use App\User;

class VerRevisionTest extends TestCase {

    /**
     * A basic test example.
     *
     * @test
     * @return void
     */
    public function testExample() {
        $user = new User(array('name' => 'mecanico'));

        $this->actingAs($user)
                ->withSession(['foo' => 'bar'])
                ->visit('/Revisiones/view/1')
                ->see("Revision toyota buseta 5000km");
    }

}
