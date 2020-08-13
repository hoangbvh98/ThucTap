<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ApiController extends Controller
{
    public function getData()
    {
        $this->result(200, "Success");
    }
    public function showError()
    {
        $this->result(500,"Server Error");
    }
}
