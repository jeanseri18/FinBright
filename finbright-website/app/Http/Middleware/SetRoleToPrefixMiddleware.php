<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class SetRoleToPrefixMiddleware
{
    /**
     * Gère une requête entrante.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        // Récupère le rôle de l'utilisateur authentifié
        $user = $request->user();
        if ($user) {
            $role = $user->getRoleNames()->first();
            
            // Si le paramètre {role} n'est pas déjà défini ou ne correspond pas au rôle de l'utilisateur
            if ($request->route('role') !== $role) {
                // Redirige vers la même route avec le bon rôle
                $route = $request->route();
                $params = $route->parameters();
                $params['role'] = $role;

                return redirect()->route($route->getName(), $params);
            }
        }

        return $next($request);
    }
}
