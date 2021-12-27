<?php

namespace App\Http\Controllers;

use App\Models\Service;
use App\Models\Visit;
use App\Http\Requests\StoreVisitRequest;
use App\Http\Requests\UpdateVisitRequest;
use App\Services\CustomerService;
use App\Services\VisitService;
use Illuminate\Http\RedirectResponse;

class VisitController extends Controller
{
    private CustomerService $customerService;
    private VisitService $visitService;

    public function __construct(CustomerService $customerService, VisitService $visitService)
    {
        $this->customerService = $customerService;
        $this->visitService = $visitService;
    }

    public function store(StoreVisitRequest $request, Service $service): RedirectResponse
    {
        $visit = $this->customerService->registerCustomer($service);

        return redirect()->route('customers.show', ['uuid' => $visit->customer->uuid]);
    }

    public function update(UpdateVisitRequest $request, Visit $visit): RedirectResponse
    {
        $status = $request->get('status');
        $this->visitService->changeVisitStatus($visit, $status);

        return redirect()->route('dashboard');
    }
}
