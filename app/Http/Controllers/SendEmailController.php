<?php
/**
 * Created by PhpStorm.
 * User: dorin
 * Date: 6/4/18
 * Time: 16:54
 */

namespace App\Http\Controllers;


use App\Mail\RutaTransportSofer;
use Illuminate\Support\Facades\Mail;

class SendEmailController extends Controller
{

    public function send()
    {
        \Log::info("here");
        Mail::to('iosifescu.dorin@gmail.com')->send(new RutaTransportSofer());
    }
}