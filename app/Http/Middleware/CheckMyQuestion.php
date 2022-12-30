<?php

namespace App\Http\Middleware;

use App\Models\Question;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CheckMyQuestion
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

        if (
            $request->question->user_id == Auth::user()->id
        )
            return $next($request);


        return redirect()->route("errors.searcherror.index")->withErrors([
            "You are the unknown user to access this page.",
        ]);
    }
}
