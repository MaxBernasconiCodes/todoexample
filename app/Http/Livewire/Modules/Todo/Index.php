<?php

namespace App\Http\Livewire\Modules\Todo;

use App\Models\Todo;
use Livewire\Component;

class Index extends Component
{
    public $todos = [];
    public $newTodo;
    protected $rules = [
        'newTodo.title' => 'required|min:3|max:60|unique:todos,title',
        'newTodo.description' => 'max:300',
        'newTodo.completed' => '',
    ];


    public function store(){
        $this->validate([
            'newTodo.title' => 'required|min:3|max:60|unique:todos,title',
            'newTodo.description' => 'max:300',
            'newTodo.completed' => '',
        ]);
        $this->newTodo->save();
    }
    public function tachar($id){
        $selectedTodo = Todo::findOrFail($id);
        $selectedTodo->completed = !$selectedTodo->completed;
        $selectedTodo->save();
    }

    public function destroy($id){
        $selectedTodo = Todo::findOrFail($id);
        $selectedTodo->destroy($id);
    }

    public function mount(){
        $this->newTodo = new Todo();
    }

    public function render()
    {
        $this->todos = Todo::all();
        return view('livewire.modules.todo.index');
    }
}
