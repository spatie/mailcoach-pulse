@php
    use Illuminate\Support\Str;
@endphp
<x-pulse::card :cols="$cols" :rows="$rows" :class="$class">
    <x-pulse::card-header
        name="{{ $emailList?->name ?? 'Mailcoach list' }}"
        title=""
        details=""
    >
        <x-slot:icon>
            <x-pulse::icons.queue-list/>
        </x-slot:icon>
    </x-pulse::card-header>

    <x-pulse::scroll :expand="$expand" wire:poll.5s="">
        @if (! \Spatie\MailcoachPulse\MailcoachPulse::isConfigured())
            <x-pulse::no-results/>
        @else
            <div class="grid gap-3 mx-px mb-px">
                @if(! $emailList)
                    Error: Email list not found
                @else
                    <div>
                        Name: {{ $emailList->name }}
                    </div>
                    <div>
                        Active subscribers: {{ $emailList->activeSubscribersCount }}
                    </div>
                @endif
            </div>
        @endif
    </x-pulse::scroll>
</x-pulse::card>
