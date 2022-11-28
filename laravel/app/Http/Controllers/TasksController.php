<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TasksController extends Controller
{
    public function helloWorld(): string
    {
        return 'This is the index function from TasksController';
    }
}
