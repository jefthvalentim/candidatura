<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Stabilit</title>
    <link rel="stylesheet" href="{{asset('css/front/bootstrap.css')}}" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="{{asset('css/front/style.css')}}" rel="stylesheet" type="text/css">
    <link rel="shortcut icon" href="1.png" type="image/x-icon">
</head>
<body>
    <header class="page-header">
        <div class="container">
            <div class="d-flex pt-3 align-content-center justify-content-between">
                <div>
                    <img src="img/logo.png" alt="" width="100">
                </div>
                <div>
                     <h5>PT</h5>
                </div>
            </div>
        </div>
     </header>
     <main>
        @yield('content')
       
    </main>
      <!-- Bootstrap core JavaScript-->
  <script src="{{ asset('js/front/jquery-3.4.1-slim.min.js') }}"></script>
  <script src="{{ asset('js/front/bootstrap.bundle.min.js') }}"></script>
  <script src="{{ asset('js/front/popper.min.js') }}"></script>

</body>
</html>