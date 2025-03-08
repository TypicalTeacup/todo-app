<?php

namespace App\Http\Controllers;

use App\Http\Services\TodoService;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function __construct(
        protected TodoService $todoService
    ) {}

    public function home(Request $request)
    {
        $todos = $this->todoService->getTodos($request);
        return view('user.home', ['todos' => $todos]);
    }
}
