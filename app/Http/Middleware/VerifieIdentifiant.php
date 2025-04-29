<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class VerifieIdentifiant
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {

        $email = $request->email;
        $password = $request->password;

        $user = User::where('email',$email)->first();
        if(!$user || ($user->email != $email) || Hash::check($password, $user->password)){
            return redirect()->route('logins')->session('error','Donnee invalides');
        }
        return $next($request);
    }
}
