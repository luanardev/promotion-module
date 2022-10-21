
<x-livewire-tables::bs4.table.cell>
    @if(!is_null($row->avatar))
        <img src="{{ asset("storage/".$row->avatar) }}" class="img-circle" width="60"  />
    @else
        <img src="{{ asset('img/default.png') }}" class="img-circle" width="60" />
    @endif
</x-livewire-tables::bs4.table.cell>

<x-livewire-tables::bs4.table.cell>
    {{ $row->staff_id}}
</x-livewire-tables::bs4.table.cell>

<x-livewire-tables::bs4.table.cell>
    {{ $row->staff_name }}
</x-livewire-tables::bs4.table.cell>

<x-livewire-tables::bs4.table.cell>
    {{ $row->position }}
</x-livewire-tables::bs4.table.cell>

<x-livewire-tables::bs4.table.cell>
    Grade {{ $row->current_grade }}
</x-livewire-tables::bs4.table.cell>

<x-livewire-tables::bs4.table.cell>
    Grade {{ $row->grade_applied}}
</x-livewire-tables::bs4.table.cell>

<x-livewire-tables::bs4.table.cell>
    {{ $row->rank_applied}}
</x-livewire-tables::bs4.table.cell>