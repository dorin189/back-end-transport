<?php
/**
 * Created by PhpStorm.
 * User: dorin
 * Date: 6/7/18
 * Time: 17:49
 */

namespace App\Http\Controllers\Dashboard;


use App\ComenziAsigned;
use App\Http\Controllers\Controller;
use App\ParcAuto;

class DashboardController extends Controller
{

    public function getRevizie()
    {
        $car = ParcAuto::all()->where('revizie','<', 2000);

        return response($car->toArray())
            ->header('Content-Type', 'text/plain');

    }

    public function getSoferi()
    {
        $comenziAsigned = ComenziAsigned::with('sofer')->select('sofer_id')->get();

        return response($comenziAsigned->toArray())
            ->header('Content-Type', 'text/plain');
    }
}