<?php

namespace App\Http\Controllers;

use App\Models\Activity;
use Illuminate\Http\Request;

class ActivityController extends Controller
{
    public function index(){
        $activities = Activity::paginate(6);
        return view('activities.activities', compact('activities'));
    }

    public function search(Request $request){
        $search = $request->input('search');
        $activities = Activity::where('title', 'LIKE', '%' . $search . '%')
        ->orWhere('organizer', 'LIKE', '%' . $search . '%')
        ->orWhere('location', 'LIKE', '%' . $search . '%')
        ->paginate(6);
        return view('activities.activities', compact('activities'));  
    }

    public function socialActivityDetail($id){
        $activity = Activity::findOrFail($id);
        return view('activities.activities-detail', compact('activity'));

    }
}
