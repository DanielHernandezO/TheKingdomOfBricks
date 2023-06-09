<!doctype html>
<html lang="en">
   <head>
      <meta charset="utf-8" />
      <meta name="viewport" content="width=device-width, initial-scale=1" />
      <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" crossorigin="anonymous" />
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
            <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
               @guest
               <div class="navbar-nav ms-auto">
                  <a class="nav-link active" href="{{ route('user.item.index') }}">{{__('user.items')}}</a>
                  <div class="vr bg-white mx-2 d-none d-lg-block"></div>
                  <a class="nav-link active" href="{{ route('login') }}">{{__('user.login')}}</a>
                  <a class="nav-link active" href="{{ route('register') }}">{{__('user.register')}}</a>
               </div>
               @else
               <div class="navbar-nav ms-auto">
                  <a class="nav-link active" href="{{ route('user.item.index') }}">{{__('user.items')}}</a>
                  <a class="nav-link active" href="{{ route('user.cart.index') }}">{{__('user.cart')}}</a>
                  <a class="nav-link active" href="{{ route('user.purchase.index') }}">{{__('user.myPurchases')}}</a>
                  <a class="nav-link active" href="{{ route('user.nuke.index') }}">{{__('user.nuke')}}</a>
                  <div class="vr bg-white mx-2 d-none d-lg-block"></div>
                  <a class="nav-link active" href="{{ route('user.profile') }}">{{__('user.myProfile')}}</a>
                  <form id="logout" action="{{ route('logout') }}" method="POST">
                     <a role="button" class="nav-link active"
                     onclick="document.getElementById('logout').submit();">{{__('user.logout')}}</a>
                  @csrf
                  </form>
               </div>
               @endguest
             </div>
         </div>
      </nav>
      <!-- header -->
      <div class="container my-4">
         @yield('content')
      </div>
      <!-- footer -->
      <footer class="footer">
         <div class="p-3 w-80 d-flex justify-content-between align-items-center md:flex md:items-center md:justify-between md:p-6">
        
            <span class = "text-sm text-gray-500 text-center">
               {{__('commons.copyright')}} - <a class="text-reset fw-bold text-decoration-none" target="_blank"
                  href="https://github.com/DanielHernandezO/TheKingdomOfBricks">
                  {{__('commons.devs')}}
               </a>
            </span>

            <div>
               <ul class="d-flex flex-wrap text-sm text-gray-500 dark:text-gray-400">
                  @foreach (LangEnum::getValues() as $value)
                     <li class = "list-group-item">
                        <a href="{{ route('lang.locale', ['locale' => $value]) }}" class="me-4 nav-link active md:me-6">
                              {{ __('commons.' . $value) }}
                        </a>
                     </li>
                  @endforeach
               </ul>
            </div>
         </div>
      </footer>
      <!-- footer -->
    
      <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous">
    </script>
</body>
</html>
    