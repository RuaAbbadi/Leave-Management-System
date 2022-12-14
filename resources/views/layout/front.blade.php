<!doctype html>
<html lang="{{config('app.locale')}}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Hugo 0.84.0">
    <title>@yield('title')-{{config('app.name')}}</title>
    <link rel="canonical" href="{{config('app.url')}}"> <!-- Bootstrap core CSS -->
    <link href="{{asset('/assets/css/bootstrap.min.css')}}" rel="stylesheet">
    <style>
        .bd-placeholder-img {
            font-size: 1.125rem;
            text-anchor: middle;
            -webkit-user-select: none;
            -moz-user-select: none;
            user-select: none;
        }

        @media (min-width: 768px) {
            .bd-placeholder-img-lg {
                font-size: 3.5rem;
            }
        }
    </style> <!-- Custom styles for this template -->
    <link href="{{asset('public/assets/css/dashboard.css')}}" rel="stylesheet">
</head>

<body>
    <header class="navbar navbar-dark sticky-top bg-dark flex-md-nowrap py-2 shadow">
        <a class="navbar-brand col-md-3 col-lg-2 me-0 px-3" href="#">Leaves Management System</a>
        <button class="navbar-toggler position-absolute d-md-none collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#sidebarMenu" aria-controls="sidebarMenu" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="navbar-nav">
            @auth
            <div class="row">
                <div class="col md-6 mt-2">
                    <a class="text-decoration-none text-white" href="#">{{Auth::user()->email}}</a>
                </div>
                <div class="col md-6">
                    <form action="{{route('logout')}}" method="post">
                        @csrf
                        @method('delete')
                        <button type="submit" class="btn btn-danger me-3">Logout</button>
                    </form>
                </div>
            </div>
            @endauth
        </div>
    </header>
    <div class="container-fluid">
        <div class="row">
            <nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block bg-light sidebar collapse">
                <div class="position-sticky pt-3">
                    <ul class="nav flex-column">
                        <li class="nav-item mb-3">
                            <a class="nav-link active text-black" aria-current="page" href="{{route('leaves.index')}}">
                                <span  class="me-2" data-feather="home"></span>
                                Dashboard
                            </a>
                        </li>
                        <li class="nav-item mb-3">
                            <a class="nav-link text-black" href="{{route('departments.index')}}">
                                <span  class="me-2" data-feather="file"></span>
                                Departments
                            </a>
                        </li>
                        <li class="nav-item mb-3">
                            <a class="nav-link text-black" href="{{route('leavestype.index')}}">
                                <span class="me-2" data-feather="book-open"></span>
                                Leaves Type
                            </a>
                        </li>
                        <li class="nav-item mb-3">
                            <a class="nav-link text-black" href="{{route('employees.index')}}">
                                <span class="me-2" data-feather="users"></span>
                                Employees
                            </a>
                        </li>
                        <li class="nav-item mb-3">
                            <a class="nav-link text-black" href="{{route('leaves.index')}}">
                                <span class="me-2" data-feather="list"></span>
                                Leaves
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link text-black" href="{{route('change_password')}}">
                                <span class="me-2" data-feather="lock"></span>
                                Change Password
                            </a>
                        </li>
                    </ul>
                </div>
            </nav>
            <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
                @yield('content')
            </main>
        </div>
    </div>




    <script src="{{asset('/assets/js/bootstrap.bundle.min.js')}}"></script>
    <script src="https://cdn.jsdelivr.net/npm/feather-icons@4.28.0/dist/feather.min.js" integrity="sha384-uO3SXW5IuS1ZpFPKugNNWqTZRRglnUJK6UAZ/gxOX80nxEkN9NcGZTftn6RzhGWE" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js@2.9.4/dist/Chart.min.js" integrity="sha384-zNy6FEbO50N+Cg5wap8IKA4M/ZnLJgzc6w2NqACZaK0u0FXfOWRRJOnQtpZun8ha" crossorigin="anonymous"></script>
    <script src="/assets/js/dashboard.js"></script>
</body>

</html>