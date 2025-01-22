@extends('layout.default')
@section('content')
    <div class="row mb-4 align-items-center">
        <div class="col-md-7"></div>
        <div class="col-md-5">
            <form type="get" action="">
                <div class="input-group">
                    <select class="form-control" name="project_id">
                        <option selected disabled>Filter by Project</option>
                        @foreach ($projects as $project)
                            <option @if (Request::get('project_id') == $project->id) selected @endif value="{{ $project->id }}">
                                {{ $project->name }}
                            </option>
                        @endforeach
                    </select>
                    <div class="input-group-append">
                        <button class="btn btn-dark" type="submit">Filter</button>
                    </div>
                </div>
            </form>
        </div>
    </div>

    <div class="card shadow-sm">
        <div class="card-header bg-dark text-white">
            <h5 class="mb-0">Task List</h5>
        </div>
        <div class="card-body p-0">
            <div class="alert alert-success text-center mb-0" id="sorting-m" style="display: none;"></div>
            <table class="table table-hover mb-0">
                <thead class="thead-dark">
                    <tr>
                        <th scope="col">Task ID</th>
                        <th scope="col">Task Name</th>
                        <th scope="col">Project</th>
                        <th scope="col">Created At</th>
                        <th scope="col" class="text-center">Actions</th>
                    </tr>
                </thead>
                <tbody id="sortable">
                    @foreach ($tasks as $task)
                        <tr data-task-id="{{ $task->id }}">
                            <td>#{{ $task->id }}</td>
                            <td>{{ $task->name }}</td>
                            <td>{{ ucfirst($task->project->name) }}</td>
                            <td>{{ $task->created_at->diffForHumans() }}</td>
                            <td class="text-center">
                                <a href="{{ url('task/' . $task->id . '/edit') }}" class="btn btn-sm btn-info">Edit</a>
                                <form action="{{ route('task.destroy', ['task' => $task->id]) }}" method="POST"
                                    style="display: inline-block;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-sm btn-danger">Delete</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

    <div class="mt-3">
        {{ $tasks->links('pagination::bootstrap-4') }}
    </div>

    <script>
        $(function() {
            $("#sortable").sortable({
                update: function() {
                    let sortedIds = $("#sortable tr").map(function() {
                        return $(this).data("task-id");
                    }).get();
                    $.ajax({
                        url: '/task/shorting',
                        method: 'POST',
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        },
                        data: {
                            sortedIds: sortedIds
                        },
                        success: function() {
                            $("#sorting-m").show().text('Task order updated successfully.')
                                .fadeOut(3000);
                        }
                    });
                }
            });
        });
    </script>
@endsection
