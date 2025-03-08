<?php

namespace App\Http\Services;

use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class TodoService
{
    public function getTodos(Request $request)
    {
        $request->validate([
            'priority' => ['nullable', 'array'],
            'status' => ['nullable', 'array'],
            'before' => ['nullable', 'date', 'date_format:Y-m-d\TH:i:s.v\Z'],
            'after' => ['nullable', 'date', 'date_format:Y-m-d\TH:i:s.v\Z'],
        ]);

        $todos = $request->user()->todos;

        if ($request->has('priority')) {
            $todos = $todos->whereIn('priority', $request->input('priority'));
        }

        if ($request->has('status')) {
            $todos = $todos->whereIn('status', $request->input('status'));
        }

        if ($request->has('before') && $request->input('before') != '') {
            $carbonBefore = Carbon::parse($request->input('before'));
            $todos = $todos->where('deadline', '<', $carbonBefore);
        }

        if ($request->has('after') && $request->input('after') != '') {
            $carbonAfter = Carbon::parse($request->input('after'));
            $todos = $todos->where('deadline', '>', $carbonAfter);
        }

        return $todos;
    }
}
