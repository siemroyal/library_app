<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index(){
        return "Home controller";
    }
    public function create(){
        return view("admin.create");
    }
}
