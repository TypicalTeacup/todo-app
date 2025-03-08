<?php

namespace App\Http\Controllers;

use App\Http\Requests\ShareTodoRequest;
use App\Http\Requests\StoreTodoRequest;
use App\Http\Services\TodoService;
use App\Models\Todo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\URL;

class TodoController extends Controller
{
    public function __construct(
        protected TodoService $todoService
    ) {}

    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $result = $this->todoService->getTodos($request);
        return $result;
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('user.todo.new');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreTodoRequest $request)
    {
        $todo = $request->user()
            ->todos()
            ->create($request->validated());
        return $todo;
    }

    /**
     * Display the specified resource.
     */
    public function show(Todo $todo)
    {
        return view('user.todo.show', ['todo' => $todo]);
    }

    public function get(Todo $todo)
    {
        return $todo;
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Todo $todo)
    {
        return view('user.todo.edit', ['todo' => $todo]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(StoreTodoRequest $request, Todo $todo)
    {
        $todo->update($request->validated());
        return $todo;
    }

    public function share(Todo $todo)
    {
        return view('user.todo.share', ['todo' => $todo]);
    }

    public function shareLink(ShareTodoRequest $request, Todo $todo)
    {
        $expiresAt = $request->expiresAt();
        abort_if(!$expiresAt, 500);
        $shareUrl = URL::temporarySignedRoute('todo.shareLink', $expiresAt, ['todo' => $todo->id]);

        return ['url' => $shareUrl];
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Todo $todo)
    {
        $todo->delete();
    }
}
