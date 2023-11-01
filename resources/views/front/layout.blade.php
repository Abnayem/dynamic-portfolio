<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
 <title>@yield('page_title')</title>
  <link rel="stylesheet" href="{{asset('front_assets/css/style.css')}}">
  <script src="https://cdnjs.cloudflare.com/ajax/libs/aos/2.3.4/aos.js"></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/aos/2.3.4/aos.css">
  <!-- box icons -->
  <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
</head>
<body>
  <!-- Header design -->
  
  @section('container')
  @show  
 <!-- footer -->
 <footer class="footer">
<div class="footer-text">
  <p>Copyright &copy; 2023 by Ab Nayem | All Rights Reserved. </p>
</div>
<div class="footer-iconTop">
  <a href="#"><i class='bx bx-up-arrow-alt'></i></a>
</div>
 </footer>
  <script src="{{asset('front_assets/js/script.js')}}"></script>
  <script>
    AOS.init({
      duration:1000,
      delay:400
    });
  </script>
</body>
</html>