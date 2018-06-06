<?php
/**
 * Created by PhpStorm.
 * User: dorin
 * Date: 6/4/18
 * Time: 16:54
 */

namespace App\Http\Controllers;


use App\Mail\RutaTransportSofer;
use App\ParcAuto;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class SendEmailController extends Controller
{

    public function send(Request $request)
    {
        ParcAuto::where(
            'soferi_id', $request['driverId'])
            ->update(['revizie' => $request['revizie']]);


        Mail::to($request['email'])
            ->send(new RutaTransportSofer($request['linkMap']));
    }
}