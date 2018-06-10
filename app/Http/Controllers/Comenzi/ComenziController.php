<?php
/**
 * Created by PhpStorm.
 * User: dorin
 * Date: 5/31/18
 * Time: 19:24
 */

namespace App\Http\Controllers\Comenzi;


use App\Comenzi;
use App\ComenziAsigned;
use App\Http\Controllers\Controller;
use App\Soferi;
use Illuminate\Http\Request;

class ComenziController extends Controller
{
    /**
     * @return mixed
     */
    public function getAll()
    {
        $comands = Comenzi::all();
        $soferi = Soferi::all(
            'id',
            'nume',
            'prenume'
        );


       $comands->map(function($comand) use ($soferi) {
           $comand['soferi'] = $soferi->toArray();
           return $comand;
       });

        return response($comands->toArray())
            ->header('Content-Type', 'text/plain');

    }

    public function getComandsNotFullModel() {
        $transportatori = Comenzi::all(
            'adresa_client',
            'lat_adresa_client',
            'lng_adresa_client',
            'adresa_destinatar',
            'lat_adresa_destinatar',
            'lng_adresa_destinatar',
            'is_asigned'
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
        $coordonateDestinatar = explode(' ', $request['coordonateDestinatar']);

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


    public function update(Request $request) {
        $comanda = Comenzi::find($request['id']);
        $comanda->is_asigned = $request['is_asigned'];
        $comanda->nume_sofer = $request['nume_sofer'];

        $sofer = Soferi::find($request['sofer_id']);



        ComenziAsigned::create([
           'sofer_id' => $sofer->id,
           'comenzi_id' => $comanda->id
        ]);


        $comanda->save();
    }

    public function remove($id)
    {
        $comanda = Comenzi::find($id);
        $comanda->delete();

    }

    public function getRecordIsOrder() {

        $route = Soferi::with('comenziAsigned', 'parc')->select('id','nume','prenume', 'email')->get();

//        $parc = Soferi::with('parc')->get();

        \Log::info($route);

//        $route = ComenziAsigned::with('sofer')->get();

//        \Log::info($route);

//        $route = Comenzi::where('is_asigned', 1)->get();


        return response($route->toArray())
            ->header('Content-Type', 'text/plain');

    }

    public function getComenzi(int $id) {
        $comenziAsigned = ComenziAsigned::with('comand')->where('sofer_id', $id)->get();


        return response($comenziAsigned->toArray())
            ->header('Content-Type', 'text/plain');
    }
}