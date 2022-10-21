
<x-livewire-tables::bs4.table.cell>
    {{ $row->financial_year }}
</x-livewire-tables::bs4.table.cell>

<x-livewire-tables::bs4.table.cell>
    {{ $row->position}}
</x-livewire-tables::bs4.table.cell>

<x-livewire-tables::bs4.table.cell>
    Grade {{ $row->current_grade }}
</x-livewire-tables::bs4.table.cell>

<x-livewire-tables::bs4.table.cell>
    {{ $row->rank_applied }}
</x-livewire-tables::bs4.table.cell>

<x-livewire-tables::bs4.table.cell>
    Grade {{ $row->grade_applied }}
</x-livewire-tables::bs4.table.cell>

<x-livewire-tables::bs4.table.cell>
    {{ $row->status }}
</x-livewire-tables::bs4.table.cell>

<x-livewire-tables::bs4.table.cell>
    {{$row->created_at->format('d-M-Y')}}
</x-livewire-tables::bs4.table.cell>