<?php

namespace App\Http\Controllers;

abstract class Controller
{
    public $call_back;

    public function setResponse($status = false, $message = 'Somthing Went Wrong.', $data = [])
    {
        $this->call_back['status'] = $status;

        $this->call_back['message'] = $message;

        $this->call_back['data'] = $data;
    }

    public function getResponse()
    {
        return $this->call_back;
    }
}
