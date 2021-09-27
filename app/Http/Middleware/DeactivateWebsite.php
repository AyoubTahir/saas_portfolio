<?php

namespace App\Http\Middleware;

use Closure;
use App\Models\User;
use App\Models\Setting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DeactivateWebsite
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        $user = User::where('name', str_replace('-', ' ', $request->route('username')))->firstOrFail();

        $settings = Setting::where('user_id', $user->id)->firstOrFail();

        if (!$settings->website_status) {
            return abort(404);
        }

        return $next($request);
    }
}
