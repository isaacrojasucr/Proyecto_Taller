<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use App\User;

class AsignarRepuestoAVehiculoTest extends TestCase {

    use WithoutMiddleware;

    /**
     * A basic test example.
     *
     * @test
     * @return void
     */
    public function AsignarRepuestoAVehiculo() {
//        $this->assertTrue(true);
//        $user = factory(App\User::class)->create();
//        $user = new User(array('email' => 'mecanico@mecanico.com', 'password' => 'mecanico'));
//       $user = User::find(17);
        $user = new User(array('name' => 'mecanico'));


//        $this->be($user) //You are now authenticated
        $this->actingAs($user)
                ->withSession(['foo' => 'bar'])
                ->visit('/Taller/asignar')
//                ->type('17', 'id')
                ->type('0', 'placa')
                ->type('1', 'opcion')
                ->press('Continuar')
                ->seePageIs('/Taller/continuar');
//                ->type('1', 'id')
//                ->type('0', 'placa')
//                ->click('Asignar');
    }

}
