<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use App\User;

class UserCanInsertVehiculoTest extends TestCase {

    use WithoutMiddleware;

    /**
     * A basic test example.
     *
     * @test
     * @return void
     */
    public function UserCanInsertVehiculo() {

//         $user = factory(App\User::class)->create();
        $user = new User(array('name' => 'mecanico'));
        
        $placa = '1929';
        $marca = 'Ferrary';
        $modelo = 'Enzo';
        $km_total = '12023';

        $this->actingAs($user)
                ->withSession(['foo' => 'bar'])
                ->visit('/Vehiculos/create')
                ->type($placa, 'placa')
                ->type($marca, 'marca')
                ->type($modelo, 'modelo')
                ->type($km_total, 'km_total')
                ->press('Enviar')
                ->seeInDatabase('vehiculos', ['placa' => $placa, 'marca' => $marca, 'modelo' => $modelo, 'km_total' => $km_total]);
//                ->seePageIs('/Vehiculos');
    }

}
