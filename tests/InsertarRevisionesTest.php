<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use App\User;

class InsertarRevisionTest extends TestCase {

    use WithoutMiddleware;

    /**
     * A basic test example.
     *
     * @test
     * @return void
     */
    public function AgregarRevision() {
//        $this->assertTrue(true);
        $user = new User(array('name' => 'mecanico'));
        
        $nombre = 'RevisionPrueba';
        $km_revision = '10';
        $detalle = 'detalle de la revision prueba';


//        $this->be($user) //You are now authenticated
        $this->actingAs($user)
                ->withSession(['foo' => 'bar'])
                ->visit('/Revisiones/nuevo/0')
//                ->type('17', 'id')
                ->type($nombre, 'nombre')
                ->type($km_revision, 'km_revision')
                ->type($detalle, 'detalle')
                ->press('Guardar')
                ->seePageIs('/Revisiones/guardar')
                ->seeInDatabase('revision_calendarizadas', ['nombre' => $nombre, 'km_revision' => $km_revision, 'detalle' => $detalle]);

//                ->type('1', 'id')
//                ->type('0', 'placa')
//                ->click('Asignar');
    }

}
