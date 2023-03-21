<!doctype html>
<html lang="en">
   <head>
      <meta charset="utf-8" />
      <meta name="viewport" content="width=device-width, initial-scale=1" />
      <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css"
         rel="stylesheet" crossorigin="anonymous" />
      <link href="{{ asset('/css/app.css') }}" rel="stylesheet" />
      <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
      <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
      <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
      <title>@yield('title', __('commons.brand'))</title>
   </head>
   <body>
      <!-- header -->
      <nav class="navbar navbar-expand-lg navbar-dark bg-secondary py-4">
         <div class="container">
            <a class="navbar-brand" href="{{route('home.index')}}">{{__('commons.brand')}}</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-
               target="#navbarNavAltMarkup"
               aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
            </button>
         </div>
      </nav>
      <!-- header -->
        @yield('content')
      <!-- footer -->
      <footer  class="footer">
        <div class="copyright py-4 text-center text-white">
            <div class="container">
            <small>
               {{__('commons.copyright')}} - <a class="text-reset fw-bold text-decoration-none" target="_blank"
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
    