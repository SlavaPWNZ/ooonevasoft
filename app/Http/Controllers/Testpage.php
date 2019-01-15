<?php

namespace App\Http\Controllers;
use App\MyClasses\MyClass;

class Testpage extends Controller
{
    public function index()
    {
        $MyClass=new MyClass;
        return $MyClass->main();
    }
}
