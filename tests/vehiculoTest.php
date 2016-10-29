<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class vehiculoTest extends TestCase
{
    use WithoutMiddleware;
    /**
     * A basic test example.
     * @test
     * @return void
     */
    public function CrearVehiculo()
    {
        $this->visit('Vehiculos/create')
        ->type('104', 'placa')
            ->type('104', 'marca')
            ->type('104', 'modelo')
            ->type('104', 'km_total')
        ->press('Enviar')
        ;
        
    }

    




}
