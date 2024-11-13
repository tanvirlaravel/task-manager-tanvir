@extends('layouts.app')

@section('title', 'Task List')

@section('content')
    <div class="container mt-5">
        <h1 class="text-center mb-4">Task List</h1>


        <div class="card shadow-sm border-0">
            <div class="card-header bg-primary text-white">
                <h5 class="mb-0">Your Tasks</h5>
            </div>
            <div class="card-body">
                <table class="table table-hover table-bordered">
                    <thead class="table-light">
                        <tr>
                            <th>Title</th>
                            <th>Description</th>
                            <th>Status</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($tasks as $task)
                            <tr>
                                <!-- Task Title -->
                                <td class="@if ($task->is_completed) text-decoration-line-through text-muted @endif">
                                    {{ $task->title }}
                                </td>

                                <!-- Task Description -->
                                <td>{{ $task->description }}</td>

                                <!-- Task Status -->
                                <td>
                                    @if ($task->is_completed)
                                        <span class="badge bg-success">Completed</span>
                                    @else
                                        <span class="badge bg-warning text-dark">Pending</span>
                                    @endif
                                </td>

                                <!-- Action Buttons -->
                                <td>
                                    <div class="d-flex gap-2">
                                        @if (!$task->is_completed)
                                            <!-- Mark as Complete Button -->
                                            <form action="{{ route('tasks.complete', $task->id) }}" method="POST">
                                                @csrf
                                                @method('PATCH')
                                                <button type="submit" class="btn btn-success btn-sm">
                                                    <i class="bi bi-check-circle"></i> Complete
                                                </button>
                                            </form>
                                        @endif

                                        <!-- Delete Task Button -->
                                        <form action="{{ route('tasks.destroy', $task->id) }}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure you want to delete this task?');">
                                                <i class="bi bi-trash"></i> Delete
                                            </button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
