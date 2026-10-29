<?php

use Livewire\Component;

new class extends Component
{
    public int $count = 0;

    public function increment(): void
    {
        $this->count++;
    }

    public function decrement(): void
    {
        $this->count--;
    }
};
?>

<div>
   <button type="button" wire:click="decrement">−</button>

    <span>{{ $count }}</span>

    <button type="button" wire:click="increment">+</button>
</div>
