<?php
/**
 * Created by PhpStorm.
 * User: dorin
 * Date: 5/30/18
 * Time: 11:05
 */

namespace App\Http\Controllers\ParcAuto;


use App\ParcAuto;
use Illuminate\Http\Request;

class ParcAutoController
{
    public function getAll()
    {
        $parcAuto = ParcAuto::with('soferi')->get();

        return response($parcAuto)
            ->header('Content-Type', 'text/plain');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nume' => 'required',
            'numar' => 'required',
            'tonaj' => 'required',
            'km' => 'required',
            'revizie' => 'required',
            'fabricatie' => 'required'
        ]);

        ParcAuto::create([
            'denumire_auto' => $request['nume'],
            'numar_inmatriculare' => $request['numar'],
            'tonaj' => $request['tonaj'],
            'km' => $request['km'],
            'revizie' => $request['revizie'],
            'an_fabricatie' => $request['fabricatie'],
        ]);

    }
}