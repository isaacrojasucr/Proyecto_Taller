<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use App\User;

class InsertarRepuestoTest extends TestCase {

    use WithoutMiddleware;

    /**
     * A basic test example.
     *
     * @test
     * @return void
     */
    public function AgregarRepuesto() {
//        $this->assertTrue(true);
        $user = new User(array('name' => 'mecanico'));
        
        $nombre = 'RepuestoPrueba';
        $cantidad = '10';
        $vida_util = '133';


//        $this->be($user) //You are now authenticated
        $this->actingAs($user)
                ->withSession(['foo' => 'bar'])
                ->visit('/Repuestos/create')
//                ->type('17', 'id')
                ->type($nombre, 'nombre')
                ->type($cantidad, 'cantidad')
                ->type($vida_util, 'vida_util')
                ->press('Guardar')
                ->seePageIs('/Repuestos')
                ->seeInDatabase('repuestos', ['nombre' => $nombre, 'cantidad' => $cantidad, 'vida_util' => $vida_util]);

//                ->type('1', 'id')
//                ->type('0', 'placa')
//                ->click('Asignar');
    }

}
