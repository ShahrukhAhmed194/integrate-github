<?php

namespace App\Http\Controllers;

use Laravel\Socialite\Facades\Socialite;
use App\Services\GitHubServices;

class GitHubController extends Controller
{
    protected $github_services;

    public function __construct()
    {
        $this->github_services = new GitHubServices();
    }

    public function redirectToGitHub()
    {
        return Socialite::driver('github')->redirect();
    }

    public function handleGitHubCallback()
    {
        $user = Socialite::driver('github')->user();
        session(['github_user' => $user]);

        return redirect()->route('profile');
    }

    public function showProfile()
    {
        $user = session('github_user');
        $repos = $this->github_services->getRepositoryListOfUser($user->token);

        return view('profile', compact('user', 'repos'));
    }
}
