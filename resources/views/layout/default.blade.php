<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css"
        integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="//code.jquery.com/ui/1.13.2/themes/base/jquery-ui.css">
    <script src="https://code.jquery.com/jquery-3.6.0.js"></script>
    <style>
        .badge {
            transform: translateY(-10px);
        }

        .toast {
            position: fixed;
            top: 20px;
            right: 20px;
            z-index: 9999;
            padding: 15px 20px;
            border-radius: 5px;
            color: #fff;
            font-size: 16px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            opacity: 0;
            visibility: hidden;
            transform: translateY(-20px);
            transition: all 0.4s ease;
        }

        .toast-success {
            background-color: #28a745;
        }

        .toast.show {
            opacity: 1;
            visibility: visible;
            transform: translateY(0);
        }
    </style>
    <title>Task Management</title>
</head>

<body>
    @include('includes.header')
    <div class="container mt-5">
        <!-- Content Area  -->
        <div class="row">
            <div class="col-md-12 mt-2">
                @if (session()->has('success'))
                    <div id="toast-success" class="toast toast-success">
                        {{ session()->get('success') }}
                    </div>
                @endif
            </div>
        </div>
        @yield('content')
    </div>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js"
        integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js"
        integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous">
    </script>
    <script src="https://code.jquery.com/ui/1.13.2/jquery-ui.js"></script>
    <script>
        document.addEventListener('DOMContentLoaded', () => {
            const toast = document.getElementById('toast-success');
            if (toast) {
                toast.classList.add('show');
                setTimeout(() => {
                    toast.classList.remove('show');
                }, 3000); // Hide after 3 seconds
            }
        });
    </script>

</body>

</html>
