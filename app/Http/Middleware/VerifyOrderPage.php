<?php

namespace App\Http\Middleware;


use Closure;
use Illuminate\Routing\Exceptions\InvalidSignatureException;

class VerifyOrderPage
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return \Illuminate\Http\Response
     *
     * @throws \Illuminate\Routing\Exceptions\InvalidSignatureException
     */
    public function handle($request, Closure $next)
    {
        $sessionHash = session()->get('hash');
        if (!$sessionHash) 
        {
            throw new InvalidSignatureException;
        }
        $hashCode = strtolower($request->route('hash'));
        if($hashCode === $sessionHash)
        {
            return $next($request);
        }

        throw new InvalidSignatureException;
    }
}
