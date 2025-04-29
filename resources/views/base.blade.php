<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <title>Document</title>
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container-fluid">
          <a class="navbar-brand" href="#">Navbar</a>
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
              <li class="nav-item">
                <a class="nav-link active" aria-current="page" href="{{ route('index') }}">Home</a>
              </li>
            

            </ul>
         
            <div class="d-flex">
                @auth

              <div>
                <form action="{{ route('logout') }}"  method='post'>
                    @method('delete');
                    @csrf
                   <button class='btn btn-danger btn-sm '>Se Deconnecter</button>
                </form>
              </div>

                  @endauth

            @guest

            <div class="d-flex">
                <li class="nav-item">
                    <a class="nav-link blues"  href="{{ route('register') }}">Connectez vous</a>
                  </li>
            </div>
            @endguest
          </div>
        </div>
      </nav>

    @yield('content')

   <style>
    .center{
        display: flex;
        justify-content: center;
    }
    .blues{
        color: green;
    }
    .reds{
        color:red;
    }
    .nones{
       list-style-type: none
    }
   </style>

</body>
</html>
