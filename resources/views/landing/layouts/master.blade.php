<!DOCTYPE html>
<html lang="en">

<head>
  @include('landing/partials/head')
</head>

<body>

  @include('landing/partials/header')
  @yield('hero')

  <main id="main">
    @yield('content')
  </main>

  @include('landing/partials/footer')

  <div id="preloader"></div>
  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  @include('landing/partials/script')

</body>

</html>