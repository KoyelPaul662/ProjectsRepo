<?php

namespace App\Http\Middleware;

use Inertia\Middleware;
use Tightenco\Ziggy\Ziggy;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HandleInertiaRequests extends Middleware
{
    /**
     * The root template that is loaded on the first page visit.
     *
     * @var string
     */
    protected $rootView = 'app';

    /**
     * Determine the current asset version.
     */
    public function version(Request $request): string|null
    {
        return parent::version($request);
    }

    /**
     * Define the props that are shared by default.
     *
     * @return array<string, mixed>
     */
    public function share(Request $request): array
    {
        $user = $request->user();
        if (Auth::guard('hospital')->check()) 
            $user['type'] = 'hospital';
        else if(Auth::guard('admin')->check())
            $user['type'] = 'admin';
        else if(Auth::guard('user')->check())  
            $user['type'] = 'user';
        // dd($user);
        return array_merge(parent::share($request), [
            'auth' => [
                'user' => $user,
            ],
            'ziggy' => function () use ($request) {
                return array_merge((new Ziggy)->toArray(), [
                    'location' => $request->url(),
                ]);
            },
            'flash'=>[
                'errormsg'=>fn()=>$request->session()->get('errormsg'),
                'success'=>fn()=>$request->session()->get('success'),
            ],
        ]);
    }
}
