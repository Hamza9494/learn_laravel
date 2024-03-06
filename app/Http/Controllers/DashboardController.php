<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $users = [
            [
                "name" => "alex",
                "age" => "25"
            ],
            [
                "name" => "sara",
                "age" => "16",
            ]
        ];

        return view("dashboard", ["users" => $users]);
    }
}
