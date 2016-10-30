<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions; 
use App\User;

class AgregarRepuestoTest extends TestCase {

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


//        $this->be($user) //You are now authenticated
        $this->actingAs($user)
                ->withSession(['foo' => 'bar'])
                ->visit('/Repuestos/create')
//                ->type('17', 'id')
                ->type('RepuestoPrueba', 'nombre')
                ->type('10', 'cantidad')
                ->type('133', 'vida_util')
                ->press('Guardar')
                ->seePageIs('/Repuestos');
//                ->type('1', 'id')
//                ->type('0', 'placa')
//                ->click('Asignar');
    }

}
