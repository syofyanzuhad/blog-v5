<?php

namespace App\Http\Controllers\Auth;

use App\Models\User;
use App\Notifications\Welcome;
use App\Http\Controllers\Controller;
use App\Notifications\NewUserCreated;
use Illuminate\Http\RedirectResponse;
use Laravel\Socialite\Facades\Socialite;

/**
 * Completes GitHub OAuth, upserts the user record, and signs the user in.
 */
class GithubAuthCallbackController extends Controller
{
    public function __invoke() : RedirectResponse
    {
        $githubUser = Socialite::driver('github')->user();

        $email = $githubUser->getEmail() ?: data_get($githubUser->getRaw(), 'notification_email');

        if (empty($email)) {
            $email = $githubUser->getId() . '+' . $githubUser->getNickname() . '@users.noreply.github.com';
        }

        // Either create a brand new user or update their information.
        $user = User::query()->updateOrCreate(['github_id' => $githubUser->getId()], [
            'name' => $githubUser->getName() ?? $githubUser->getNickname(),
            'github_login' => $githubUser->getNickname(),
            'avatar' => $githubUser->getAvatar(),
            'github_data' => (array) $githubUser,
            'email' => $email,
            'refreshed_at' => now(),
        ]);

        auth()->login($user, true);

        if ($user->wasRecentlyCreated) {
            $user->notify(new Welcome);

            User::query()
                ->where('github_login', 'benjamincrozat')
                ->first()
                ?->notify(new NewUserCreated($user));
        }

        return redirect()->intended()->with('status', 'You have been logged in.');
    }
}
