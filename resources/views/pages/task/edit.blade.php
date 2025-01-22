@extends('layout.default')
@section('content')
    <div class="row justify-content-center mt-5">
        <div class="col-6">
            <form action="{{ url('task/' . $task->id) }}" method="POST">
                @csrf
                @method('PUT')
                <div class="form-group">
                    <label><b>Task Name</b></label>
                    <input type="text" class="form-control" name="name" value="{{ $task->name }}" />
                </div>
                <div class="form-group">
                    <label><b>Project</b></label>
                    <select class="custom-select" name="project_id">
                        <option>Select Project</option>
                        @foreach ($projects as $project)
                            <option value="{{ $project->id }}" @if ($task->project_id == $project->id) selected @endif>
                                {{ $project->name }}
                            </option>
                        @endforeach
                    </select>
                </div>
                @if ($errors->any())
                    @foreach ($errors->all() as $error)
                        <p class="text-danger">{{ $error }}</p>
                    @endforeach
                @endif
                <button type="submit" class="btn btn-primary">Update Task</button>
            </form>
        </div>
    </div>
@endsection
