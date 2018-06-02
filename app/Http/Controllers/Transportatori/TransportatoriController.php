<?php
/**
 * Created by PhpStorm.
 * User: dorin
 * Date: 5/1/18
 * Time: 18:18
 */

namespace App\Http\Controllers\Transportatori;

use App\transportatori;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;


class TransportatoriController extends Controller
{
    public function getAll()
    {
        $transportatori = transportatori::all();

        return response($transportatori->toArray())
            ->header('Content-Type', 'text/plain');
    }

    public function store(Request $request)
    {
        $request->validate([
            'email' => 'required',
            'numarTelefon' => 'required',
        ]);


        transportatori::create([
            'email' => $request['email'],
        ]);
    }
}