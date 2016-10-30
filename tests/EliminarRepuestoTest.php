<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use App\User;


class EliminarRepuestoTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @test
     * @return void
     */
    public function testExample()
    {
        $this->assertTrue(true);
        
         $user = new User(array('name' => 'admin'));


//        $this->be($user) //You are now authenticated
        $this->actingAs($user)
                ->withSession(['foo' => 'bar'])
                ->visit('Repuestos/eliminar/25')
                ->seePageIs('Repuestos');
    }
}
