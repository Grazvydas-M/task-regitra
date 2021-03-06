<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Services\VisitService;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class DashboardController
{
    private VisitService $visitService;

    public function __construct(VisitService $visitService)
    {
        $this->visitService = $visitService;
    }

    public function index(): View
    {
        /** @var User $user */
        $user = Auth::user();

        $visits = $this->visitService->getActiveVisitsByUser($user);
        $startedVisit = $this->visitService->getStartedVisitByUser($user);

        return view('dashboard',[ 'visits' => $visits, 'startedVisit' => $startedVisit]);
    }

    public function departmentVisitsList(): View
    {
        $activeVisits = $this->visitService->getVisitsByStatus('STARTED');
        $waitingVisits = $this->visitService->getVisitsByStatus('NOT_STARTED');

        return view('user.department',[ 'activeVisits' => $activeVisits, 'waitingVisits' => $waitingVisits]);
    }

}
