<!DOCTYPE html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title> @yield('title')</title>
  <!-- plugins:css -->
  @include('admin.layouts.inc-style')
  @yield('stylesheet')

</head>

<body>


  @yield('content')
  <!-- container-scroller -->

  <!-- plugins:js -->
  @include('admin.layouts.inc-script')
  @yield('scripts')
</body>

</html>
