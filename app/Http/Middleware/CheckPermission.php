<?php
 
namespace App\Http\Middleware;
 
use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
 
class CheckPermission
{
    public function handle(Request $request, Closure $next, string $permission): Response
    {
        // dd($permission, $request->user()->temPermissao($permission));
        // abort_unless($request->user()->temPermissao($permission), Response::HTTP_FORBIDDEN);
        abort_unless($request->user()->can($permission), Response::HTTP_FORBIDDEN);

        // dd($request,  $next,  $permission);
        // if (! $request->user()->hasRole($permission)) {
        //     // Redirect...
        // }
 
        return $next($request);
    }
 
}