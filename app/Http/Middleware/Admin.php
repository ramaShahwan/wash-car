<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use App\Models\Setting;
use Illuminate\Support\Facades\View;
use Symfony\Component\HttpFoundation\Response;

class Admin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if (auth()->check() && auth()->user()->role == 'admin') {
            //من أجل ظهور الاعدادات الموجودة في master في جميع صفحات الأدمن
            $getShowSettings = Setting::first();
        View::share('getShowSettings', $getShowSettings);
            return $next($request);

        }
        return redirect('/');
    }


}
