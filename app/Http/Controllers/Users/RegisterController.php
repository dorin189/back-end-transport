<?php
/**
 * Created by PhpStorm.
 * User: dorin
 * Date: 4/30/18
 * Time: 17:39
 */

namespace App\Http\Controllers\Users;


use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;


class RegisterController extends Controller
{
    /**
     * @param Request $request
     */
    public function store(Request $request)
    {
        $validateData = $request->validate([
            'firstName' => 'required|min:6',
            'lastName' => 'required|min:6',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:6|confirmed',
            'password_confirmation' => 'required|min:6'
        ]);

       if($validateData) {
           User::create([
               'name' => $request['firstName'] . ' ' .$request['lastName'],
               'email' => $request['email'],
               'password' => Hash::make($request['password']),
           ]);
       }

    }
}