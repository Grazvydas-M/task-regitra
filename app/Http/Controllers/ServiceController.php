<?php

namespace App\Http\Controllers;

use App\Services\ServiceService;
use Illuminate\View\View;

class ServiceController extends Controller
{
    private ServiceService $service;

    public function __construct(ServiceService $service)
    {
        $this->service = $service;
    }

    public function index(): View
    {
        $services = $this->service->getAll();

        return view('service.index', ['services' => $services]);
    }
}
