<nav class="navbar navbar-expand-lg navbar-dark bg-dark shadow-sm">
    <div class="container">
        <a class="navbar-brand font-weight-bold" href="{{ asset(url('task')) }}">
            <i class="fas fa-tasks"></i> Task Management
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarContent"
            aria-controls="navbarContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarContent">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item">
                    <a class="nav-link text-white" href="{{ asset(url('task')) }}">Dashboard</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-white btn btn-sm btn-secondary mx-3" href="{{ asset(url('task/create')) }}">
                        <i class="fas fa-plus-circle"></i> Add Task
                    </a>
                </li>
            </ul>
        </div>
    </div>
</nav>
