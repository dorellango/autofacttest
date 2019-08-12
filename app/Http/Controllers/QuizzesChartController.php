<?php

namespace App\Http\Controllers;

use App\Quiz;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class QuizzesChartController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request)
    {
        return Quiz::select([
            'is_the_information_right as answer',
            DB::raw('COUNT(is_the_information_right) as total')
        ])
        ->groupBy('is_the_information_right')
        ->get();
    }
}
