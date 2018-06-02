<?php
/**
 * Created by PhpStorm.
 * User: dorin
 * Date: 5/31/18
 * Time: 19:24
 */

namespace App\Http\Controllers\Comenzi;


use App\Comenzi;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ComenziController extends Controller
{
    public function getAll()
    {
        $transportatori = Comenzi::all(
            'adresa_client',
            'lat_adresa_client',
            'lng_adresa_client'
//            'adresa_destinatar',
//            'lat_adresa_destinatar',
//            'lng_adresa_destinatar'
        );

        return response($transportatori->toArray())
            ->header('Content-Type', 'text/plain');
    }


    public function store(Request $request)
    {
        $request->validate([
            'numeClient' => 'required',
            'adresaClient' => 'required',
            'telefonClient' => 'required',
        ]);

        $coordonateClient = explode(' ', $request['coordonateContact']);
        $coordonateDestinatar = explode(' ', $request['coordonateContact']);

        Comenzi::create([
            'nume_client' => $request['numeClient'],
            'adresa_client' => $request['adresaClient'],
            'telefon_client' => $request['telefonClient'],
            'lat_adresa_client' => $coordonateClient[0],
            'lng_adresa_client' => $coordonateClient[1],
            'nume_destinatar' => $request['numeDestinatar'],
            'adresa_destinatar' => $request['adresaDestinatar'],
            'telefon_destinatar' => $request['telefonDestinatar'],
            'lat_adresa_destinatar' => $coordonateDestinatar[0],
            'lng_adresa_destinatar' => $coordonateDestinatar[1],
            'nume_produs' => $request['numeProdus'],
            'dimensiune_produs' => $request['dimensiuneProdus']
        ]);
    }
}