@extends('layouts.app')

@section('title', 'Add New Task')

@section('content')
    <div class="container">
        <h1 class="text-center mb-4">Add New Task</h1>

        <div class="card">
            <div class="card-body">



                <form action="{{ route('tasks.store') }}" method="POST">
                    @csrf
                    <div class="mb-3">
                        <label for="title" class="form-label">Title</label>
                        <input type="text" name="title" id="title" class="form-control" value="{{ old('title') }}" required>
                    </div>
                    <div class="mb-3">
                        <label for="description" class="form-label">Description</label>
                        <textarea name="description" id="description" class="form-control" rows="4" required>{{ old('description') }}</textarea>
                    </div>
                    <div class="mb-3 form-check">
                        <input type="checkbox" name="is_completed" id="is_completed" class="form-check-input" {{ old('is_completed') ? 'checked' : '' }}>
                        <label for="is_completed" class="form-check-label">Mark as Completed</label>
                    </div>
                    <button type="submit" class="btn btn-primary">Add Task</button>
                </form>
            </div>
        </div>
    </div>
@endsection
