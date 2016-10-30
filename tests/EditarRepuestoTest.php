<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions; 
use App\User;

class EditarRepuestoTest extends TestCase {

    use WithoutMiddleware;

    /**
     * A basic test example.
     *
     * @test
     * @return void
     */
    public function EditarRepuesto() {
//        $this->assertTrue(true);
        $user = new User(array('name' => 'mecanico'));


//        $this->be($user) //You are now authenticated
        $this->actingAs($user)
                ->withSession(['foo' => 'bar'])
                ->visit('Repuestos/19/edit')
//                ->type('17', 'id')
                ->type('RepuestoEdicion', 'nombre')
                ->type('130', 'cantidad')
                ->type('43', 'vida_util')
                ->press('Guardar')
                ->seePageIs('/Repuestos');
//                ->type('1', 'id')
//                ->type('0', 'placa')
//                ->click('Asignar');
    }

}
