<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use App\User;

class UsuariosTest extends TestCase {

    use WithoutMiddleware;

    /**
     * Prueba para la insercion de los usuarios.
     * @test
     * @return void
     */
    public function insertUsuario() {
        $user = new User(array('name' => 'admin'));


//        $this->be($user) //You are now authenticated
        $this->actingAs($user)
                ->withSession(['foo' => 'bar'])
                ->visit('/Usuarios/create')
                ->type('10522', 'cedula')
                ->type('1042', 'nombre')
                ->type('1042@104', 'correo')
                ->type('1042', 'apellido')
                ->type('2', 'puesto')
                ->type('1024', 'contrasena')
                ->press('Guardar')
                ->seePageIs('Usuarios');
        ;
    }

}
