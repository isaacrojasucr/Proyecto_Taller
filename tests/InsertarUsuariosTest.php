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

        $cedula = '207080097';
        $nombre = 'Usuario Prueba';
        $correo = 'usuarioP@104.com';
        $apellido = 'Paniagua';
        $puesto = '2';
        $contrasena = 'patito';


//        $this->be($user) //You are now authenticated
        $this->actingAs($user)
                ->withSession(['foo' => 'bar'])
                ->visit('/Usuarios/create')
                ->type($cedula, 'cedula')
                ->type($nombre, 'nombre')
                ->type($correo, 'correo')
                ->type($apellido, 'apellido')
                ->type($puesto, 'puesto')
                ->type($contrasena, 'contrasena')
                ->press('Guardar')
                ->seePageIs('Usuarios')
//        ->seeInDatabase('users', ['cedula' => $cedula, 'name' => $nombre, 'email' => $correo, 'apellidos' => $apellido, 'puesto' => $puesto, 'password' => $contrasena]);
                ->seeInDatabase('users', ['cedula' => $cedula, 'nombre' => $nombre, 'correo' => $correo, 'apellido' => $apellido, 'puesto' => $puesto, 'contrasena' => $contrasena]);
    //ESTE ULTOMO NO FUNCIONA
        
    }

}
