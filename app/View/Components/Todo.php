<?php

namespace App\View\Components;

use App\Models\Todo as TodoModel;
use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Todo extends Component
{
    /**
     * Create a new component instance.
     */
    public function __construct(
        public TodoModel $todo
    ) {}

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.todo');
    }
}
