<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use App\User;

class VerTallerTest extends TestCase {

    /**
     * A basic test example.
     *
     * @test
     * @return void
     */
    public function VerTaller() {
        $user = new User(array('name' => 'mecanico'));

        $this->actingAs($user)
                ->withSession(['foo' => 'bar'])
                ->visit('/Taller')
                ->see("Taller Universidad de Costa rica");
    }

}
