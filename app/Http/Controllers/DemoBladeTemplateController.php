<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DemoBladeTemplateController extends Controller
{
    public function index(){
        return view('question2.pages.main');
    }
}
