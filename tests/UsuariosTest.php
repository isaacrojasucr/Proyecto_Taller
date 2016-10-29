<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class UsuariosTest extends TestCase
{
    use WithoutMiddleware;
    /**
     * Prueba para la insercion de los usuarios.
     * @test
     * @return void
     */
    public function insertUsuario()
    {
        $this->visit('Usuarios/create')
        ->type('105','cedula')
            ->type('104','nombre')
            ->type('104@104','correo')
            ->type('104','apellido')
            ->type('2','puesto')
            ->type('104','contrasena')
            ->press('Enviar')
        ;

    }
}
