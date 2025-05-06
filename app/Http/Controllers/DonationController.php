<?php

namespace App\Http\Controllers;

use App\Models\Donation;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DonationController extends Controller
{
    /**
     * Get user's list of donations
     */
    public function donations() {
        $user = Auth::id(); // Gets user ID

        $donations = Donation::where('userId', $user)
                        ->paginate(5);
        
        return view('donations.donations', ["donations" => $donations]);
    }
    
    /**
     * Handles user donation
     */
    public function donate($value) {
        Donation::create([
            "userId" => Auth::id(), // Get auth
            "donationDate" => Carbon::now()->date, // Get today's date
            "donationValue" => $value
        ]);
    }
}
