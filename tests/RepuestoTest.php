<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class RepuestoTest extends TestCase
{
    
    use WithoutMiddleware;
    /**
     * A basic test example.
     * @test
     * @return void
     */
    public function insertRepuesto()
    {
        $this->visit('Repuestos/create')
            ->type('104', 'cantidad')
            ->type('104', 'vida_util')
            ->type('104', 'nombre')
            ->press('Enviar')
        ;
    }
}
