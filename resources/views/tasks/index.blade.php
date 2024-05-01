@extends('layouts.app')

@section('title', 'Task list')

@section('content')
    <nav class="mb-4">
        <a href="{{ route('tasks.create') }}" class="link">Add Task!</a>
    </nav>

    <ul>
        @foreach ($tasks as $task)
            <li>
                <a href="{{ route('tasks.show', ['task' => $task->id]) }}" @class(['line-through' => $task->completed])>{{ $task->title }}</a>
            </li>
        @endforeach
    </ul>

    <nav class="mt-4">{{ $tasks->links('vendor.pagination.tailwind-light') }}</nav>
@endsection
