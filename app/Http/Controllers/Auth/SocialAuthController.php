<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Services\SocialAccountService;
use Socialite;

class SocialAuthController extends Controller
{
    protected $providers = [
        'facebook',
        'github',
    ];

    public function redirect($social)
    {
        if (!in_array($social, $this->providers)) {
            abort(404);
        }
        
        return Socialite::driver($social)->redirect();
    }

    public function callback($social)
    {
        if (!in_array($social, $this->providers)) {
            abort(404);
        }
        $user = SocialAccountService::createOrGetUser(Socialite::driver($social)->stateless()->user(), $social);
        auth()->login($user);

        return redirect()->to('/');
    }
}

