
<x-livewire-tables::bs4.table.cell>
    {{ $row->keyarea }}
</x-livewire-tables::bs4.table.cell>

<x-livewire-tables::bs4.table.cell>
    {{ $row->achievement}}
</x-livewire-tables::bs4.table.cell>

<x-livewire-tables::bs4.table.cell>
    <a href="#" wire:click="delete({{$row->id}})">Delete</a>
</x-livewire-tables::bs4.table.cell>