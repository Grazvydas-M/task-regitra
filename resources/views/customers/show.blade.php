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
                     ;>Your Registration
                </div>
                <div class="p-8 bg-white border-b border-gray-200">
                    <div class="card-body" style="box-sizing: border-box">
                        <ul class="list-group" style="padding: 5px; box-sizing: border-box">
                            <li class="list-group-item" style="position: relative; display: block; border: 1px solid  rgba(0, 0, 0,
                                        0.125);
                                        padding: 12px 20px">
                                <div class="list-block"
                                     style="display: flex; align-items: center; justify-content: space-between">
                                    <div class="list-block_content" style="display: flex; flex-direction: column">
                                        <div>
                                            <span><b><i>Your registration code:</i></b>  {{ $customer->uuid }}</span>
                                        </div>
                                        <div>
                                            <script>
                                                TargetDate = "{{ $time }}";
                                                BackColor = "#ceefce";
                                                ForeColor = "navy";
                                                CountActive = true;
                                                CountStepper = -1;
                                                LeadingZero = true;
                                                DisplayFormat = "%%H%% Hours, %%M%% Minutes, %%S%% Seconds.";
                                                FinishMessage = "It is Your turn!";
                                            </script>
                                        </div>
                                    </div>
                                    <script src="https://rhashemian.github.io/js/countdown.js"></script>
                                    <div class="list-block_buttons" style="display: flex">
                                        <form method="POST" action="{{ route('customers.update', $customer) }}">
                                            {{ method_field('PUT') }}
                                            <input type="hidden" name="status" value="Canceled">
                                            <button class="btn btn-danger" type="submit" value="cancel"
                                                    style="margin: 3px">
                                                <b>Cancel</b>
                                            </button>
                                            @csrf
                                        </form>
                                    </div>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>

