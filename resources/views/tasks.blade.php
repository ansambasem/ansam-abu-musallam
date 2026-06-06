<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Laravel Quickstart - Basic</title>

    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Lato:100,300,400,700" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        body {
            font-family: 'Lato';
        }
    </style>
</head>

<body id="app-layout">

<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="container">
        <a class="navbar-brand" href="#">
            Task List
        </a>
    </div>
</nav>

<div class="container mt-4">
    <div class="offset-md-2 col-md-8">

        <div class="card">

            @if (isset($task))

            <div class="card-header">
                Update Task
            </div>

            <div class="card-body">

                <!-- Update Task Form -->
                <form action="{{ url('update') }}" method="POST">
                    @csrf

                    <input type="hidden" name="id" value="{{ $task->id }}">

                    <div class="mb-3">
                        <label class="form-label">Task</label>
                        <input type="text" name="name" class="form-control" value="{{ $task->name }}">
                    </div>

                    <button type="submit" class="btn btn-primary">
                        <i class="fa fa-plus me-2"></i>Update Task
                    </button>

                </form>
            </div>

            @else

            <div class="card-header">
                New Task
            </div>

            <div class="card-body">

               

                <!-- New Task Form -->
                <form action="create" method="POST">
                    @csrf

                    <div class="mb-3">
                        <label class="form-label">Task</label>
                        <input type="text" name="name" class="form-control">
                        @error('name')
               <div style="color:red; font-size:14px; margin-top:5px;">
                    {{ $message }}
                  </div>
                  @enderror
                    </div>

                    <button type="submit" class="btn btn-primary">
                        <i class="fa fa-plus me-2"></i>Add Task
                    </button>

                </form>
            </div>

            @endif

        </div>

        <!-- Current Tasks -->
        <div class="card mt-4">

            <div class="card-header">
                Current Tasks
            </div>

            <div class="card-body">

                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>Task</th>
                            <th>Actions</th>
                        </tr>
                    </thead>

                    <tbody>

                    @foreach ($tasks as $task)
                        <tr>
                            <td>{{ $task->name }}</td>
                            <td>

                                <form action="/delete/{{ $task->id }}" method="POST" class="d-inline">
                                    @csrf
                                    <button type="submit" class="btn btn-danger">
                                        <i class="fa fa-trash me-2"></i>Delete
                                    </button>
                                </form>

                                <form action="/edit/{{ $task->id }}" method="POST" class="d-inline">
                                    @csrf
                                    <button type="submit" class="btn btn-info">
                                        <i class="fa fa-info me-2"></i>Edit
                                    </button>
                                </form>

                            </td>
                        </tr>
                    @endforeach

                    </tbody>
                </table>

            </div>
        </div>

    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>


 {{-- @extends(view:'layouts.app')
@section(section: 'content')

    <div class="container mt-4">
        <div class="offset-md-2 col-md-8">
            <div class="card">
                @if (isset($task))

    <div class="card-header">
                    Update Task
                </div>
                <div class="card-body">
                    <!-- Update Task Form -->
                    <form action="{{url('update')}}" method="POST">
                        @csrf
                        <input type="hidden" name="id" value="{{$task->id}}">
                        <!-- Task Name -->
                        <div class="mb-3">
                            <label for="task-name" class="form-label">Task</label>
                            <input type="text" name="name" id="task-name" class="form-control" value="{{$task->name}}">
                        </div>

                        <!-- Update Task Button -->
                        <div>
                            <button type="submit" class="btn btn-primary">
                                <i class="fa fa-plus me-2"></i>Update Task
                            </button>
                        </div>
                    </form>
                </div>

                @else
                <div class="card-header">
                    New Task
                </div>
                <div class="card-body">
                    <!-- New Task Form -->
                    <form action="create" method="POST">
                        @csrf
                        <!-- Task Name -->
                        <div class="mb-3">
                            <label for="task-name" class="form-label">Task</label>
                            <input type="text" name="name" id="task-name" class="form-control" value="">
                        </div>

                        <!-- Add Task Button -->
                        <div>
                            <button type="submit" class="btn btn-primary">
                                <i class="fa fa-plus me-2"></i>Add Task
                            </button>
                        </div>
                    </form>
                </div>
                @endif
            </div>

            <!-- Current Tasks -->
            <div class="card mt-4">
                <div class="card-header">
                    Current Tasks
                </div>
                <div class="card-body">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>Task</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                           @foreach ( $tasks as $task )
    <tr>
        <td>{{ $task->name }}</td>
        <td>
            <form action="/delete/{{$task->id}}" method="POST" class="d-inline">
                @csrf

                <button type="submit" class="btn btn-danger">
                    <i class="fa fa-trash me-2"></i>Delete
                </button>
            </form>
                        <form action="/edit/{{$task->id}}" method="POST" class="d-inline">
                                   @csrf

                <button type="submit" class="btn btn-info">
                    <i class="fa fa-info me-2"></i>Edit
                </button>
            </form>
        </td>
    </tr>
                       @endforeach


                     </tbody>
                </table>
            </div>
        </div>
    </div>
     </div>


@endsection --}}




