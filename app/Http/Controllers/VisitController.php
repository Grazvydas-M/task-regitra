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

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }


    public function store(StoreVisitRequest $request, Service $service)
    {
        $visit = $this->customerService->registerCustomer($service);
//dd($visit);
        return redirect()->route('customers.show', ['uuid' => $visit->customer->uuid]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Visit  $visit
     * @return \Illuminate\Http\Response
     */
    public function show(Visit $visit)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Visit  $visit
     * @return \Illuminate\Http\Response
     */
    public function edit(Visit $visit)
    {
        //
    }


    public function update(UpdateVisitRequest $request, Visit $visit): RedirectResponse
    {
        $status = $request->get('status');
        $this->visitService->changeVisitStatus($visit, $status);

        return redirect()->route('dashboard');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Visit  $visit
     * @return \Illuminate\Http\Response
     */
    public function destroy(Visit $visit)
    {
        //
    }
}
