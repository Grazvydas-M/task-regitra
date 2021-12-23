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
                     ;>Your Visits
                </div>
                <div class="p-8 bg-white border-b border-gray-200">
                    <div class="card-body" style="box-sizing: border-box">
                        <ul class="list-group" style="padding: 5px; box-sizing: border-box">
                            <?php $i = 0;?>
                            @foreach ($visits as $visit)
                                <li class="list-group-item"
                                    @if($startedVisit !== null && $visit->id === $startedVisit->id)
                                    style="position: relative; display: block; border: 1px solid  rgba(0, 0, 0, 0.125); background-color: #68c290; padding: 12px 20px">
                                    @else
                                        style="position: relative; display: block; border: 1px solid  rgba(0, 0, 0,
                                        0.125);
                                        padding: 12px 20px">
                                    @endif
                                    <div class="list-block"
                                         style="display: flex; align-items: center; justify-content: space-between">
                                        <div class="list-block_content" style="display: flex; flex-direction: column">
                                            <span><b><i>Nr. </i></b>{{ $i++ }} <b><i>Service:</i></b>  {{ $visit->service->name }} <b><i>Time:</i></b> {{ $visit->service->time }} min. {{ $visit->status }} </span>
                                        </div>
                                        <div class="list-block_buttons" style="display: flex">
                                            @if($startedVisit == null)
                                                <form method="POST" action="{{ route('visits.update', $visit) }}">
                                                    {{ method_field('PUT') }}
                                                    <input type="hidden" name="status" value="Started">
                                                    <button class="btn btn-danger" type="submit" value="start"
                                                            style="margin: 3px">
                                                        <b>Start</b>
                                                    </button>
                                                    @csrf
                                                </form>
                                            @endif
                                            @if($startedVisit !== null && $visit->id === $startedVisit->id)
                                                <form method="POST" action="{{ route('visits.update', $visit) }}">
                                                    {{ method_field('PUT') }}
                                                    <input type="hidden" name="status" value="Finished">
                                                    <button class="btn btn-danger" type="submit" value="end"
                                                            style="margin: 3px">
                                                        <b>End</b>
                                                    </button>
                                                    @csrf
                                                </form>
                                            @endif
                                            @if($startedVisit == null)
                                                <form method="POST" action="{{ route('visits.update', $visit) }}">
                                                    {{ method_field('PUT') }}
                                                    <input type="hidden" name="status" value="Canceled">
                                                    <button class="btn btn-danger" type="submit" value="cancel"
                                                            style="margin: 3px">
                                                        <b>Cancel</b>
                                                    </button>
                                                    @csrf
                                                </form>
                                            @endif
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

