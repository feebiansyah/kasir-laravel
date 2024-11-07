<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>LKS | PENGADUAN MASYARAKAT V2</title>

  <!-- Custom fonts for this template-->
  <link href="{{ asset('sb/vendor/fontawesome-free/css/all.min.css') }}" rel="stylesheet" type="text/css">

  <link
  href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
  rel="stylesheet">

  <!-- Custom styles for this template-->
  <link href="{{ asset('sb/css/sb-admin-2.min.css') }}" rel="stylesheet">

</head>

<body id="page-top">
  <nav class="navbar navbar-dark navbar-expand-lg bg-primary">
  <div class="container">
    <a class="navbar-brand" href="{{ route('home') }}">Pengaduan Masyarakat V2</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="{{ route('home') }}">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="{{ route('report.index') }}">Pengaduan</a>
        </li>
        @if(Auth::check())
          <li class="nav-item">
          <a class="nav-link" href="{{ route('logout') }}">Logout</a>
        </li>
        @endif
        
    </div>
  </div>
</nav>
  
  <div class="container">
    {{ $slot }}
  </div>
  
    <!-- Bootstrap core JavaScript-->
  <script src="{{ asset('sb/vendor/jquery/jquery.min.js') }}"></script>
  <script src="{{ asset('sb/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>

  <!-- Core plugin JavaScript-->
  <script src="{{ asset('sb/vendor/jquery-easing/jquery.easing.min.js') }}"></script>

  <!-- Custom scripts for all pages-->
  <script src="{{ asset('sb/js/sb-admin-2.min.js') }}"></script>
  <script src="{{ asset('sb/js/bootstrap.js') }}"></script>

  <!-- Page level plugins -->


</body>

</html>