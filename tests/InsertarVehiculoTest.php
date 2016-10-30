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

        $this->actingAs($user)
                ->withSession(['foo' => 'bar'])
                ->visit('/Vehiculos/create')
                ->type('122', 'placa')
                ->type('122', 'marca')
                ->type('122', 'modelo')
                ->type('122', 'km_total')
                ->press('Enviar')
                ->seeInDatabase('vehiculos', ['placa' => '122']);
//                ->seePageIs('/Vehiculos');
    }

}
