<?php

namespace App\Services;

use App\Models\Customer;
use App\Models\Service;
use App\Models\User;
use App\Models\Visit;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;

class VisitService
{
    public function createVisit(Service $service, User $user, Customer $customer): Visit
    {
        $lastVisit = $user->visits()->orderByDesc('id')->first();

        if ($lastVisit === null) {
            $lastVisitEndTime = Carbon::now();
        } else {
            $lastVisitStartTime = $lastVisit->visit_start_time;
            $lastServiceTime = $lastVisit->time;

            $lastVisitEndTime = $lastVisitStartTime->addMinutes($lastServiceTime);

            if ($lastVisitEndTime < Carbon::now()) {
                $lastVisitEndTime = Carbon::now();
            }
        }

        $visit = new Visit();
        $visit->time = $service->time;
        $visit->user_id = $user->id;
        $visit->customer_id = $customer->id;
        $visit->service_id = $service->id;
        $visit->visit_start_time = $lastVisitEndTime;
        $visit->save();

        return $visit;
    }

    public function getVisitTimeByCustomer(Customer $customer): string
    {
        return $customer->visit->visit_start_time->toIsoString();
    }

    public function getActiveVisitsByUser(User $user): Collection
    {
        return $user->visits()->whereIn('status', ['NOT_STARTED', 'STARTED'])->get();
    }

    public function getStartedVisitByUser(User $user): ?Visit
    {
        /** @var Visit $visit */
        $visit = $user->visits()->where('status', '=', 'STARTED')->first();

        return $visit;
    }

    public function changeVisitStatus(Visit $visit, string $status): void
    {
        /** @var User $user */
        $user = $visit->user;

        $activeVisitsCount = $user->visits()->where('status', '=', 'STARTED')->count();

        if ($activeVisitsCount < 1) {
            $visit->status = $status;
            $visit->save();
        } elseif ($status != 'STARTED') {
            $visit->status = $status;
            $visit->save();
        }
    }

    public function getVisitsByStatus(string $status, int $limit = 5): Collection
    {
        return Visit::query()->where('status', '=', $status)->limit($limit)->get();
    }
}
