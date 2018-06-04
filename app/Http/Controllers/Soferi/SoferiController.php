<?php
/**
 * Created by PhpStorm.
 * User: dorin
 * Date: 5/30/18
 * Time: 16:51
 */

namespace App\Http\Controllers\Soferi;


use App\Http\Controllers\Controller;
use App\Soferi;

class SoferiController extends Controller
{
    public function getAll()
    {
        $soferi = Soferi::with('parc')->get();

        return response($soferi)
            ->header('Content-Type', 'text/plain');
    }


    public function getSoferiName()
    {
        $soferi = Soferi::all(
            'nume',
            'prenume'
        );

          return response($soferi->toArray())
              ->header('Content-Type', 'text/plain');
    }
}