<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;
    public function result($status, $message = "", $data = false)
    {
        $data = [
            'status'    => $status,
            'message'   => $message,
            'data'      => $data
        ];
        echo json_encode($data);
        die;
    }
}
