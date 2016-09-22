<?php

namespace App\Http\Controllers\Auth;

use Session;
use Illuminate\Http\Request;
use App\User;
use Validator;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Foundation\Auth\Throttleslogins;
use Illuminate\contracts\Auth\Guard;

class AuthController extends Controler{


    use authenticatesUsers;
}