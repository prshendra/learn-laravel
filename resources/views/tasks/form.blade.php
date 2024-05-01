@php
    $t = $task ?? new \App\Models\Task();
@endphp

@section('content')
    <form action="{{ isset($task) ? route('tasks.update', ['task' => $task]) : route('tasks.store') }}" method="POST">
        @csrf
        @isset($task)
            @method('PUT')
        @endisset
        <div class="mb-4">
            <label for="title">Title</label>
            <input
                type="text"
                name="title"
                id="title"
                value="{{ old('title') ?? $t->title }}"
                @class(['border-red-500' => $errors->has('title')])
            />
            @error('title')
                <p class="error">{{ $message }}</p>
            @enderror
        </div>

        <div class="mb-4">
            <label for="description">Description</label>
            <textarea
                name="description"
                id="description"
                rows="10"
                @class(['border-red-500' => $errors->has('description')])
            >{{ old('description') ?? $t->description }}</textarea>
            @error('description')
                <p class="error">{{ $message }}</p>
            @enderror
        </div>

        <div class="mb-4">
            <label for="long_description">Long Description</label>
            <textarea
                name="long_description"
                id="long_description"
                rows="10"
                @class(['border-red-500' => $errors->has('long_description')])
            >{{ old('long_description') ?? $t->long_description }}</textarea>
            @error('long_description')
                <p class="error">{{ $message }}</p>
            @enderror
        </div>

        <div class="flex items-center gap-2">
            <button type="submit" class="btn">{{ isset($task) ? 'Update' : 'Create' }}</button>
            <a href="{{ route('tasks.index') }}" class="link">Cancel</a>
        </div>
    </form>
@endsection
