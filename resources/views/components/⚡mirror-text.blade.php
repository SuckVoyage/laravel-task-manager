<?php

use Livewire\Component;

new class extends Component
{
    public string $text = "";
};
?>

<div>
    <div>
        <input type="text" wire:model.live="text"/>
    </div>

    <div>
         {{ $text }}
    </div>
</div>
