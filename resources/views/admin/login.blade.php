<!DOCTYPE html>
<html lang="en" >
<head>
  <meta charset="UTF-8">
  <title>Login</title>
  <link rel="stylesheet" href="{{asset('admin_assets/css/style.css')}}">

</head>
<body>
<!-- partial:index.partial.html -->
<body>
    <section class="container">
        <div class="login-container">
            <div class="circle circle-one"></div>
            <div class="form-container">
                
                
                <form action="{{route('admin.auth')}}" method="post">
                  @csrf
                    <h1 class="opacity" style="text-align: center; margin-top: 50px">LOGIN</h1> 
                    <input type="email" placeholder="EMAIL" name="email"/>
                    <input type="password" placeholder="PASSWORD"  name="password"/>
                    <button class="opacity">SUBMIT</button>
                    <span class="login_error">{{session('error')}}</span> 
                </form>
                
            </div>
            <div class="circle circle-two"></div>
        </div>
        <div class="theme-btn-container"></div>
    </section>
</body>
<!-- partial -->
  <script  src="{{asset('admin_assets/js/script.js')}}"></script>

</body>
</html>
