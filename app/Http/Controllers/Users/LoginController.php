<?php
/**
 * Created by PhpStorm.
 * User: dorin
 * Date: 5/1/18
 * Time: 14:08
 */

namespace App\Http\Controllers\Users;


use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class LoginController extends Controller
{

    public function issueToken(Request $request)
    {
        $request->validate([
            'email' => 'required',
            'password' => 'required',
        ]);
        $mergeData = [];
        if ($request->has('client_id')) {
            $mergeData['client_id'] = $request->input('client_id');
        }
        if ($request->has('client_secret')) {
            $mergeData['client_secret'] = $request->input('client_secret');
        }

    }
}