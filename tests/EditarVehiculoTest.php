<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use App\User;

class EditarVehiculoTest extends TestCase {

    /**
     * A basic test example.
     *
     * @return void
     */
    public function testExample() {
        
        $this->assertTrue(true);//PROBLEMA CON LA BD

         $user = new User(array('name' => 'mecanico'));

        $this->actingAs($user)
                ->withSession(['foo' => 'bar'])
                ->visit('/Vehiculos/122/edit')
                ->type('122', 'placa')
                ->type('toyota', 'marca')
                ->type('122', 'modelo')
                ->type('122', 'km_total')
                ->press('Guardar')
                ->seeInDatabase('vehiculos', ['placa' => '122']);
    }

}
