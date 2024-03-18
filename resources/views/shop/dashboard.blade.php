<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  @vite('resources/css/app.css')
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
  <script src="https://kit.fontawesome.com/0b2e6d4cf4.js" crossorigin="anonymous"></script>
</head>

<body>

  <div class="font-poppins" style="font-family: poppins;">
    @include('shop.header')

    @include('components.navbar')
    @yield('content')
  </div>
  @include('layouts.footer')
  </div>
  </div>
</body>

</html>