<?php

use Livewire\Component;
use App\Models\Post;
use Illuminate\Support\Facades\Auth;
new class extends Component
{
    public string $title = '';
    public string $content = '';
    public function save(){
        $validated = $this->validate([
        'title' => ['required', 'string', 'max:255'],
        'content' => ['required', 'string'],
    ]);

    Auth::user()->posts()->create($validated);
    return redirect('/tasks');
    }
};
?>

<form wire:submit="save">
    <div>Заголовок</div>
    <div>
        <input type="text" wire:model="title"/>
    </div>
    <div>Сообщение</div>
    <div>
        <textarea rows="6" cols="60" wire:model="content">
        </textarea>
    </div>
    <div><button type="submit">Написать</button></div>
</form>
