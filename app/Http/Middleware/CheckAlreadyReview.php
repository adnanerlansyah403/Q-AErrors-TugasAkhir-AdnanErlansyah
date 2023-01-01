<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class CheckAlreadyReview
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {

        if ($request->user()->review) {
            return redirect()->route('home')
                ->withErrors("You're already a reviewer, you can't create another!");
        }

        return $next($request);
    }
}
