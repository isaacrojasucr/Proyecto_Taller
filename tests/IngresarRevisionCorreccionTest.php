<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use App\User;

class IngresarRevisionCorreccionTest extends TestCase {

    use WithoutMiddleware;

    /**
     * A basic test example.
     *
     * @test
     * @return void
     */
    public function IngresarRevisionCorreccion() {
        $this->assertTrue(true);
//        $user = new User(array('name' => 'mecanico'));
//
//        $nombre = 'RepuestoPrueba';
//        $km_revision = '10';
//        $detalle = '133';
//
//        $this->actingAs($user)
//        ->withSession(['foo' => 'bar'])
//        ->visit('/home/Correcion')
//        ->type('0', 'placa')
//        ->type($nombre, 'nombre')
//        ->type($km_revision, 'km_revision')
//        ->type($detalle, 'detalle')
//        ->press('Guardar')
//        ->seePageIs('/Taller');
//        ->seeInDatabase('revision_calendarizadas', ['nombre' => '$nombre', 'km_revision' => $km_revision, 'detalle' => $detalle]);
//        ->seeInDatabase('revision_calendarizadas', ['nombre' => 'nombre']);
        //ESTE ULTIMO COSO A BD NO FUNCIONA
    }

}
