<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use App\Models\Candidate;
use App\Models\Vote;
use Illuminate\Support\Facades\Mail;

class VoteController extends Controller
{
    public function index()
    {
        $roles = ['President', 'Vice President', 'Secretary', 'Socials', 'Treasurer', 'Education', 'Discipline'];
        $candidates = [];
        foreach ($roles as $role) {
            $candidates[$role] = Candidate::where('role', $role)->get();
        }
        return view('vote', compact('candidates'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'candidates' => 'required|array',
            'candidates.*' => 'exists:candidates,id'
        ]);

        $user = auth()->user();

        if (!$user) {
            return redirect()->route('login')->with('error', 'You must be logged in to vote.');
        }

        foreach ($request->candidates as $role => $candidate_id) {
            $candidate = Candidate::find($candidate_id);
            $existingVote = Vote::where('user_id', $user->id)
                ->whereHas('candidate', function ($query) use ($role) {
                    $query->where('role', $role);
                })->first();

            if ($existingVote) {
                return redirect()->back()->with('error', 'You have already voted.');
            }
            Vote::create([
                'user_id' => $user->id,
                'candidate_id' => $candidate_id
            ]);
        }

        $this->sendEmails($user);

        return redirect()->back()->with('success', 'Your votes have been recorded.');
    }


    protected function sendEmails($user)
    {
        $admins = User::where('role', 'admin')->get();
        $candidates = Candidate::with('votes')->get();

        $data = [
            'user' => $user,
            'candidates' => $candidates
        ];

        Mail::send('emails.admin', $data, function ($message) use ($admins) {
            foreach ($admins as $admin) {
                $message->cc($admin->email)->subject('New Vote Recorded');
            }
        });
        Mail::send('emails.vote', $data, function ($message) use ($user) {
            $message->to($user->email)->subject('Your Vote Confirmation');
        });
    }
}
