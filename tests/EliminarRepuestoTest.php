<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use App\User;
//use PHPUnit_Framework_ExpectationFailedException as PHPUnitException;

class EliminarRepuestoTest extends TestCase {

    /**
     * A basic test example.
     *
     * @&test
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
                    ->visit('Repuestos/eliminar/69')
                    ->seePageIs('Repuestos');
//        } catch (FatalThrowableError $e) {
//            // force a fail:
//            throw new PHPUnitException("EL REPUESTO QUE INTENTA ELIMINAR NO EXISTE EN LA BASE DE DATOS.");
//        }
    }

}
