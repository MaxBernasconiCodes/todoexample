<div class=" w-4/5 mx-auto p-4 rounded-b shadow ">

    <div class="w-full bg-slate-200 flex flex-col">
        <input wire:model="newTodo.title" type="text"/>
        <textarea wire:model="newTodo.description"> </textarea>
        <button wire:click="store"> Agregar</button>
    </div>
    <div class="text-red flex justify-center items-center w-full">
        @error('title')
            <div class="alert alert-danger">{{ $message }}</div>
        @enderror
    </div>
    <div class="flex flex-col p-4 g-2 border border-slate-300">
        @forelse ($todos as $todo )
        <div class="flex justify-between ">
            <p @if ($todo->completed)
                class="line-through"
                @endif
            wire:click="tachar({{$todo->id}})">{{ $todo->title }} / {{ $todo->description }}</p> <button wire:click="destroy({{$todo->id}})" class="rounded h-12 w-12 " > X </button>
            </div>
        @empty
            <span class="font-bold text-center w-full "> No se encontraron registros </span>
        @endforelse
    </div>

</div>
