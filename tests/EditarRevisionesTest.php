<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use App\User;

class EditarRevisionesTest extends TestCase {

    /**
     * A basic test example.
     *
     * @return void
     */
    public function testExample() {
//        $this->assertTrue(true);

        $user = new User(array('name' => 'mecanico'));

        $nombre = 'RevisionPrueba';
        $km_revision = '1000';
        $detalle = 'nuevo detalle';

        $this->actingAs($user)
                ->withSession(['foo' => 'bar'])
                ->visit('/Revisiones/editar/2')
//                ->type('17', 'id')
                ->type($nombre, 'nombre')
                ->type($km_revision, 'km_revision')
                ->type($detalle, 'detalle')
                ->press('Guardar')
//                ->seePageIs('/Vehiculos/0/edit')
                ->seeInDatabase('revision_calendarizadas', ['nombre' => $nombre, 'km_revision' => $km_revision, 'detalle' => $detalle]);
    }

}
