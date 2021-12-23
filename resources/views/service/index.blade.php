<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Regitra') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="card-header"
                     style="font-style: italic; font-size: 20px; border: 1px solid rgba(0, 0, 0, 0.125); padding: 15px"
                     ;>Our Services
                </div>
                <div class="p-8 bg-white border-b border-gray-200">

                    <div class="card-body" style="box-sizing: border-box">
                        <ul class="list-group" style="padding: 5px; box-sizing: border-box">
                            @foreach ($services as $service)
                                <li class="list-group-item"
                                    style="position: relative; display: block; border: 1px solid  rgba(0, 0, 0, 0.125); padding: 12px 20px">
                                    <div class="list-block"
                                         style="display: flex; align-items: center; justify-content: space-between">
                                        <div class="list-block_content" style="display: flex; flex-direction: column">
                                            <span>{{ $service->name }} </span>
                                        </div>
                                        <div class="list-block_buttons" style="display: flex">
                                            <form method="POST" action="{{ route('visits.store', [$service]) }}">
                                                <button class="btn btn-danger" type="submit" style="margin: 3px">
                                                    <b>Register</b>
                                                </button>
                                                @csrf
                                            </form>
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

