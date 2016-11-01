<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use App\User;
//use PHPUnit_Framework_ExpectationFailedException as PHPUnitException;

class EliminarVehiculoTest extends TestCase {

    /**
     * A basic test example.
     *
     * @test
     * @return void
     */
    public function testExample() {
//        $this->assertTrue(true);





//        try {
            // something here


            $user = new User(array('name' => 'admin'));


//        $this->be($user) //You are now authenticated
            $this->actingAs($user)
                    ->withSession(['foo' => 'bar'])
                    ->visit('Vehiculos/eliminar/1223')
                    ->seePageIs('Vehiculos');
//        } catch (NotFoundHttpException $e) {
//            // force a fail:
//            throw new PHPUnitException("EL VEHICULO QUE INTENTA ELIMINAR NO EXISTE EN LA BASE DE DATOS.");
//        }
    }

}
