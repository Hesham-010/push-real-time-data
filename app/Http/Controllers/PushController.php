<?php

namespace App\Http\Controllers;

use App\Events\PushEvent;
use Illuminate\Http\Request;

class PushController extends Controller
{
    public function push(Request $request) {
        event(new PushEvent($request->all()));
        return redirect('/form');
    }
}
