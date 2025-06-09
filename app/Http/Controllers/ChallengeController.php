<?php

namespace App\Http\Controllers;

use App\Models\Challenge;
use App\Models\ChallengeAttempt;
use Carbon\Carbon;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;
use Storage;
use Str;

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

    function getChallengeDetail(int $id): View|RedirectResponse {
        $challenge = Challenge::where("id", $id)->first();

        if(!$challenge) {
            return redirect(route("challenge"));
        }

        return view("challenge.detail", ["challenge" => $challenge]);
    }

    function startChallengePage(int $id): View|RedirectResponse {
        $challenge = Challenge::where("id", $id)->first();

        if(!$challenge) {
            return redirect(route("challenge"));
        }

        return view("challenge.submission", ["challenge" => $challenge]);
    }

    function submitChallenge(Request $request): RedirectResponse {
        if(!$request->hasFile('image_file')) {
            return redirect(route("challenge"));
        }

        $user = Auth::user();
        $challengeId = $request->input("id");
        $file = $request->file('image_file');

        // Save fileto DB
        // Adjust filename
        $originalName = pathinfo($file->getClientOriginalName(), PATHINFO_FILENAME);
        $extension = $file->getClientOriginalExtension();
        $safeOriginalName = Str::slug($originalName);
        $fileName = $user->id.'_'.$challengeId.'_'.time().'_'.$safeOriginalName.'.'.$extension;

        // Store to storage
        Storage::disk('user_challenge_submissions')->putFileAs('', $file, $fileName);

        $filePath = $fileName;

        ChallengeAttempt::updateOrCreate(
            [
                'user_id' => $user->id,
                'challenge_id' => $challengeId
            ],
    [
            'submission_image_path' => $filePath,
            'is_approved' => false
            ]
        );

        return redirect(route("challenge"));
    }

    function getChallengeStatus(): View {
        $user = Auth::user();

        return view("challenge.approvals", [
            "attempts" => $user->challenge_attempts
        ]);
    }
}
