<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="card-header"
                     style="font-style: italic; font-size: 20px; border: 1px solid rgba(0, 0, 0, 0.125); padding: 15px"
                     ;>Department Screen
                </div>
                <div class="p-8 bg-white border-b border-gray-200">
                    <div class="card-body" style="box-sizing: border-box">
                        <ul class="list-group" style="padding: 5px; box-sizing: border-box">
                            <span><b><i>Active Visits</i></b></span>
                            <?php $i = 1;?>
                            @foreach ($activeVisits as $activeVisit)
                                <li class="list-group-item" style="position: relative; display: block; border: 1px solid  rgba(0, 0, 0,
                                            0.125); background-color: #68c290;
                                            padding: 12px 20px">
                                    <div class="list-block"
                                         style="display: flex; align-items: center; justify-content: space-between">
                                        <div class="list-block_content"
                                             style="display: flex; flex-direction: column">
                                            <span><b><i>Nr. </i></b>{{ $i++ }} <b><i>Reservation code:</i></b>  {{ $activeVisit->customer->uuid }} </span>
                                        </div>
                                    </div>
                                </li>
                            @endforeach
                            <span><b><i>Waiting Visits</i></b></span>
                            @foreach ($waitingVisits as $waitingVisit)
                                <li class="list-group-item" style="position: relative; display: block; border: 1px solid  rgba(0, 0, 0,
                                            0.125); background-color: #2c9bec;
                                            padding: 12px 20px">
                                    <div class="list-block"
                                         style="display: flex; align-items: center; justify-content: space-between">
                                        <div class="list-block_content"
                                             style="display: flex; flex-direction: column">
                                            <span><b><i>Nr. </i></b>{{ $i++ }} <b><i>Reservation code:</i></b> {{ $waitingVisit->customer->uuid }} <b><i>Visit time: {{ $waitingVisit->visit_start_time }}</i></b> </span>
                                        </div>
                                    </div>
                                </li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
<script>
    setTimeout(function () {
        window.location.reload(1);
    }, 5000);
</script>
