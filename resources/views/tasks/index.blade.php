@extends('layouts.app')

@section('title', 'Task List')

@section('content')
    <h1 class="text-center mb-4">Task List</h1>

    <div class="card">
        <div class="card-body">
            <table class="table table-striped">
                <thead>
                    <tr>

                        <th>Title</th>
                        <th>Description</th>
                        <th>Status</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($tasks as $task)
                        <tr>

                            <td class="@if ($task->is_completed)
                                text-decoration-line-through
                            @endif">{{ $task->title }}</td>
                            <td >{{ $task->description }}</td>
                            <td>
                                @if ($task->is_completed)
                                    <span class="badge bg-success">Completed</span>
                                @else
                                    <span class="badge bg-warning text-dark">Pending</span>
                                @endif
                            </td>
                            <td>
                                @if (!$task->is_completed)
                                    <!-- Mark as Complete Form -->
                                    <form action="{{ route('tasks.complete', $task->id) }}" method="POST" style="display:inline;">
                                        @csrf
                                        @method('PATCH')
                                        <button type="submit" class="btn btn-success btn-sm">Mark as Complete</button>
                                    </form>
                                @endif
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
