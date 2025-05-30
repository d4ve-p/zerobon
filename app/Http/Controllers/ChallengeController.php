<?php

namespace App\Http\Controllers;

use App\Models\Challenge;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\View\View;

class ChallengeController extends Controller
{
    function getChallenges(): View {
        $now = Carbon::now();

        $challenges = Challenge::where('start_date', '<=', $now)
                        // ->where('end_date', '>=', $now)
                        ->orderBy('start_date', 'asc')
                        ->get();
    

        return view("challenge.challenge", [
            "challenges" => $challenges
        ]);
    }

    function getChallengeDetail($id): View {
        return view("challenge.detail");
    }
}
