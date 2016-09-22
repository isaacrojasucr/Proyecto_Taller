<?php

use Illuminate\Database\Seeder;
use App\User;

class UsersTableSeeder extends Seeder {

    public function run () {

        User::create(array(
            'name'=>'Administrador',
            'email'=>'admin@admin.com',
            'password'=>Hash::make('admin'),
            'habilitado'=>1,
            'cedula'=>000000,
            'puesto'=>1,
            'apellidos'=> 'DBA'


        ));

    }

}