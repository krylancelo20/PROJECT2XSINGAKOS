<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth; 

class UserMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        if(Auth::check() && Auth::user()->ban)
        {
            $banned = Auth::user()->ban == "1"; 
            Auth::logout();
    
            if ($banned == 1) {
                $message = 'Akun Anda Telah di Ban Silahkan Hubungi Admin!';
            }
            return redirect()->route('login')
                ->with('status',$message)
                ->withErrors(['email' => 'Akun Anda Telah di Ban Silahkan Hubungi Admin!'])
            ;
        }
        return $next($request);
    }
    
    }

