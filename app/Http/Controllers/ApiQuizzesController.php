<?php

namespace App\Http\Controllers;

use App\Quiz;

class ApiQuizzesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Quiz::all();
    }
}
