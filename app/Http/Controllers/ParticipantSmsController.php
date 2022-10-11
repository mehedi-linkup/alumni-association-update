<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ParticipantSmsController extends Controller
{
    public function index()
    {
        // $welcomenotes = WelcomeNotes::findOrFail($request->id);
        return view('admin.welcome.view-active');
    }
}
