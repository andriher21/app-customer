<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>APP Customer</title>
    <link href="{{asset('/')}}assets/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <link href="{{asset('/')}}assets/plugins/fontawesome/css/all.min.css" rel="stylesheet" >
</head>
  <body>
   {{-- navbar --}}
    <nav class="navbar navbar-expand-lg bg-primary navbar-dark">
        <div class="container">
          <h4 class="navbar-brand" href="#"></h4>
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav">
              <li class="nav-item">
                <a class="nav-link {{ (request()->segment('1')==''||request()->segment('1')=='home') ?
                 'active':'' }}" aria-current="page" href="{{ url('home') }}">Home</a>
              </li>
              <li class="nav-item">
                <a class="nav-link {{ (request()->segment('1')=='customer') ? 'active':'' }}" 
                    href="{{ url('customer') }}">Customer</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="{{ route('logout') }}">Logout</a>
              </li>
            </ul>
          </div>
        </div>
      </nav>
      {{-- end --}}
    <div class="mt-2">
        <div class="container">
            @yield('content')
        </div>
    </div>   
    <script src="{{asset('/')}}assets/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
  </body>
</html>