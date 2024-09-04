<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Symfony\Component\HttpFoundation\Response;
use App\Repositories\MaintenanceModeRepository;

class SessionMaintenanceMode
{
    private $maintenanceModeRepository;

    public function __construct(MaintenanceModeRepository $maintenanceModeRepository)
    {
        $this->maintenanceModeRepository = $maintenanceModeRepository;
    }

    public function handle(Request $request, Closure $next): Response
    {
        $mode = $this->maintenanceModeRepository->index();
        if (empty($mode)) {
            Session::put('status-maintenance-mode', 'off');
            Session::save();
        } else {
            Session::put('status-maintenance-mode', $mode->status);
            Session::save();
        }

        return $next($request);
    }
}
