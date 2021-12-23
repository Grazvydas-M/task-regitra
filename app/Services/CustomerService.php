<?php

namespace App\Services;

use App\Models\Customer;
use App\Models\Service;
use App\Models\Visit;
use Illuminate\Support\Str;

class CustomerService
{
    private UserService $userService;
    private VisitService $visitService;

    public function __construct(VisitService $visitService, UserService $userService)
    {
        $this->userService = $userService;
        $this->visitService = $visitService;
    }

    public function createCustomer(): Customer
    {
        $customer = new Customer();
        $customer->uuid = Str::uuid();
        $customer->save();

        return $customer;
    }

    public function registerCustomer(Service $service): Visit
    {
        $customer = $this->createCustomer();

        $user = $this->userService->getUserWithLeastCustomers();

        return $this->visitService->createVisit($service, $user, $customer);
    }

    public function getByUuid(string $uuid): Customer
    {
        /** @var Customer $customer */
        $customer = Customer::query()->where('uuid', '=', $uuid)->first();

        return $customer;
    }

    public function cancelVisit($customer)
    {
        $visit = $customer->visit;

        $visit->status = $customer->visit->status = 'CANCELED';
        $visit->save();
    }
}


