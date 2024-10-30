<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use RealRashid\SweetAlert\Facades\Alert;
use Symfony\Component\HttpFoundation\Response;

class AdminMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if(Auth::check()){
            try{
                if(Auth::user()->role == 'admin'){
                    return $next($request);
                }else{
                    Alert::error('Access Denied', 'Access Denied as you are not the admin');
                    return redirect()->back();
                }
            }catch(\Exception $e){
                return redirect()->back()->with('error', $e->getMessage());
            }   
        }else{
            Alert::error('Access Denied', 'Access Denied as you are not the admin');
            return redirect('login');
        }
    }
}
