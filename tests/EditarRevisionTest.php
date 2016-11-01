<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use App\User;

class EditarRevisionTest extends TestCase {

    use WithoutMiddleware;

    /**
     * A basic test example.
     *
     * @test
     * @return void
     */
    public function EditarRevision() {
//        $this->assertTrue(true);
        $user = new User(array('name' => 'mecanico'));
        
        $nombre = 'RevisionPrueba';
        $km_revision = '90';
        $detalle = 'nuevo detalle';


//        $this->be($user) //You are now authenticated
        $this->actingAs($user)
                ->withSession(['foo' => 'bar'])
                ->visit('/Revisiones/edit/13/0')
//                ->type('17', 'id')
                ->type($nombre, 'nombre')
                ->type($km_revision, 'km_revision')
                ->type($detalle, 'detalle')
                ->press('Guardar')
                ->seePageIs('/Vehiculos/0/edit')
                ->seeInDatabase('revision_calendarizadas', ['nombre' => $nombre, 'km_revision' => $km_revision, 'detalle' => $detalle]);

//                ->type('1', 'id')
//                ->type('0', 'placa')
//                ->click('Asignar');
    }

}
