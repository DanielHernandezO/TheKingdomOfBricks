<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" crossorigin="anonymous" />
    <link href="{{ asset('/css/app.css') }}" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.2/font/bootstrap-icons.css" />
    <title>@yield('title', __('commons.brand'))</title>
</head>
<body>
    <!-- header -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-secondary py-4">
        <div class="container">
            <a class="navbar-brand" href="{{ route('admin.index') }}">{{__('commons.brand')}}</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup"
                aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
                <div class="navbar-nav ms-auto">
                    <a class="nav-link active" href="{{ route('admin.index') }}">{{__('commons.home')}}</a>
                    <a class="nav-link active" href="{{ route('admin.item.create') }}">{{__('admin.createItem')}}</a>
                    <a class="nav-link active" href="{{ route('admin.item.index') }}">{{__('admin.listItems')}}</a>
                    <a class="nav-link active" href="{{ route('admin.review.index') }}">{{__('admin.listReviews')}}</a>
                    <div class="vr bg-white mx-2 d-none d-lg-block"></div>
                    @guest
                    @else
                    <form id="logout" action="{{ route('logout') }}" method="POST">
                        <a role="button" class="nav-link active"
                        onclick="document.getElementById('logout').submit();">Logout</a>
                        @csrf
                    </form>
                    @endguest
                </div>
            </div>   
        </div>
    </nav>

    <!-- content -->
    <div class="container my-4">
        @yield('content')
    </div>

    <!-- footer -->
    <footer    class="footer">
        <div class="copyright py-4 text-center text-white">
                <div class="container">
                <small>
                        Copyright - <a class="text-reset fw-bold text-decoration-none" target="_blank"
                        href="https://github.com/DanielHernandezO/TheKingdomOfBricks">
                        {{__('commons.devs')}}
                        </a>
                </small>
                </div>
        </div>
    </footer>
    <!-- footer -->

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous">
    </script>
</body>
</html>
