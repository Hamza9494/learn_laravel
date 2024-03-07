<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TestController extends Controller
{
    public function index()
    {
        $data = [
            ["name" => "Hamza", "job" => "reactjs/laravel"],
            ["name" => "Sara", "job" => "web designer"],
            ["name" => "Karen", "job" => "project manager"],
        ];
        return view("test", ["data" => $data]);
    }
}
