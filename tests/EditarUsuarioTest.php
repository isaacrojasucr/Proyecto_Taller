<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use App\User;

class EditarUsuarioTest extends TestCase {

    /**
     * A basic test example.
     *
     * @return void
     */
    public function testExample() {
        $user = new User(array('name' => 'admin'));


//        $this->be($user) //You are now authenticated
        $this->actingAs($user)
                ->withSession(['foo' => 'bar'])
                ->visit('/Usuarios/18/edit')
                ->type('10522555', 'cedula')
                ->type('1024', 'password')
                ->type('prueba@p.c', 'email')
                ->type('8933', 'name')
                ->type('dd', 'apellidos')
                ->type('2', 'puesto')
                ->press('Guardar')
                ->seePageIs('Usuarios');
    }

}
