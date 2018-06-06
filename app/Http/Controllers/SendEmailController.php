<?php
/**
 * Created by PhpStorm.
 * User: dorin
 * Date: 6/4/18
 * Time: 16:54
 */

namespace App\Http\Controllers;


use App\Mail\RutaTransportSofer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class SendEmailController extends Controller
{

    public function send(Request $request)
    {
        Mail::to('iosifescu.dorin@gmail.com')->send(new RutaTransportSofer($request['link']));
    }
}