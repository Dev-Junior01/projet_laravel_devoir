<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{asset('css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{asset('css/all.min.css') }}">
    <title> @yield('titre') | Admin </title>
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container-fluid">
          <a class="navbar-brand" href="#">Admin</a>
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
              <li class="nav-item">
                <a class="nav-link active" aria-current="page" href="{{route('admin.index')}}">Home</a>
              </li>
              <li class="mx-3">
                <a class="btn btn-primary" href="{{route('immobilier.index')}} ">List immobilier</a>
              </li>
              <li class="ml-3">
                <a class="btn btn-primary" href="{{route('client.index')}}">List Client</a>
              </li>
            </ul>

          </div>
        </div>
      </nav>
      
<div class="my-5 text-center">
    @if (session('status'))
        <div class="alert alert-info">
        {{ session('status') }}
        </div>
    @endif
</div>

    <div class="container">
        @yield('content')
    </div>

    <script src="{{asset('js/bootstrap.bundle.min.js') }}">
    </script>
    <script src="{{asset('js/all.min.js') }}">
    </script>
</body>
</html>