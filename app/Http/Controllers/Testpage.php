<?php

namespace App\Http\Controllers;
use App\MyClasses\MyClass;

class Testpage extends Controller
{
    public function index()
    {
        $MyClass=new MyClass;
        $MyClass->TAXI_URL=env('TAXI_URL');
        $MyClass->TAXI_LOGIN=env('TAXI_LOGIN');
        $MyClass->TAXI_PASSWORD=env('TAXI_PASSWORD');
        $MyClass->TAXI_COOKIE_FILE=env('TAXI_COOKIE_FILE');
        $MyClass->TAXI_REGEXP=env('TAXI_REGEXP');
        return $MyClass->main();
    }
}
