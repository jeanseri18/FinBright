<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use App\Models\SecurityLog;
use Illuminate\Support\Facades\Auth;

class SecurityLogger
{
    public function handle(Request $request, Closure $next)
    {
        $response = $next($request);

        // Ne journaliser que les actions modifiant l’état
        if (in_array($request->method(), ['POST', 'PUT', 'PATCH', 'DELETE'])) {
            $admin = Auth::guard('admin')->user();

            SecurityLog::create([
                'admin_id' => $admin?->id,
                'event_type' => $this->getEventType($request),
                'action_taken' => $this->getActionDescription($request),
                'source_ip' => $request->ip(),
                'severity' => $this->determineSeverity($request),
                'method' => $request->method(),
                'context' => [
                    'url' => $request->fullUrl(),
                    'payload' => $request->except(['password', '_token']),
                ],
            ]);
        }

        return $response;
    }

    private function getEventType(Request $request): string
    {
        return match ($request->method()) {
            'POST' => 'Donnée créée',
            'PUT', 'PATCH' => 'Donnée modifiée',
            'DELETE' => 'Donnée supprimée',
            default => 'Action système',
        };
    }

    private function getActionDescription(Request $request): string
    {
        return ucfirst($request->route()?->getName() ?? 'Action exécutée');
    }

    private function determineSeverity(Request $request): string
    {
        return match (true) {
            str_contains($request->path(), 'delete') => 'Élévé',
            str_contains($request->path(), 'update') => 'Moyen',
            str_contains($request->path(), 'create') => 'Faible',
            default => 'Faible',
        };
    }
}
