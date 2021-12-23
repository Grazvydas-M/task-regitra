<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use App\Services\CustomerService;
use App\Services\VisitService;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

class CustomerController
{
    private CustomerService $customerService;
    private VisitService $visitService;

    public function __construct(CustomerService $customerService, VisitService $visitService)
    {
        $this->customerService = $customerService;
        $this->visitService = $visitService;
    }

    public function show(string $uuid): View
    {
        $customer = $this->customerService->getByUuid($uuid);
        $time = $this->visitService->getVisitTimeByCustomer($customer);

        return view('customers.show', ['customer' => $customer, 'time' => $time]);
    }

    public function update(Customer $customer): RedirectResponse
    {
        $this->customerService->cancelVisit($customer);

        return redirect('/');
    }
}
