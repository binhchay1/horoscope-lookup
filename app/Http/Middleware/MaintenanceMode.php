<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use App\Repositories\MaintenanceModeRepository;

class MaintenanceMode
{
    private $maintenanceModeRepository;

    public function __construct(MaintenanceModeRepository $maintenanceModeRepository)
    {
        $this->maintenanceModeRepository = $maintenanceModeRepository;
    }

    public function handle(Request $request, Closure $next): Response
    {
        $mode = $this->maintenanceModeRepository->index();
        if (!empty($mode)) {
            if ($mode->status == 'on') {
                return redirect()->route('maintenance.user');
            }
        }

        return $next($request);
    }
}
