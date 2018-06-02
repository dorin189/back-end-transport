<?php
/**
 * Created by PhpStorm.
 * User: dorin
 * Date: 4/30/18
 * Time: 14:52
 */

namespace App\Http\Controllers;


class TestController
{
    public function issueToken()
    {
        return response('Hello World', 200)
            ->header('Content-Type', 'text/plain');
    }
}