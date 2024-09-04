<?php

namespace App\Http\Middleware;

use App\Repositories\VisitorRepository;
use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CountVisitor
{
    private $visitorRepository;

    public function __construct(VisitorRepository $visitorRepository)
    {
        $this->visitorRepository = $visitorRepository;
    }

    public function handle(Request $request, Closure $next): Response
    {
        $ip_address = $request->getClientIp();
        $month = date('m');
        $year = date('Y');
        $getVisitor = $this->visitorRepository->getVisitorByIp($ip_address, $month, $year);

        if (!$getVisitor) {
            $data = [
                'ip_address' => $ip_address,
                'month' => $month,
                'year' => $year
            ];

            $this->visitorRepository->create($data);
        }

        return $next($request);
    }
}
