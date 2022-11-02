<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Login</title>
   <!-- font awesome cdn link  -->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.2/css/all.min.css">
   <!-- custom css file link  -->
   <link rel="stylesheet" href="./assets/css/style.css">
   <base href="/public">
  @include('css')
</head>
<body>
<section class="form-container">
<form action="{{ route('login') }}" method="post" enctype="multipart/form-data">
   @csrf
      <h3>signin now</h3>
      <p>your email <span>*</span></p>
      <input id="email" value=""  type="email" name="email" :value="old('email')" required autofocus placeholder="enter your email" required maxlength="50" class="box">
      <p>your password <span>*</span></p>
      <input id="password" type="password" name="password" required autocomplete="current-password" placeholder="enter your password" required maxlength="20" class="box">
      <input type="submit" value="{{ __('Sign in') }}" name="submit" class="btn">
	  <br/>
	  <a href="" style="font-size:15px;">Forget your password?</a>
   </form>
</section>
<script src="./assets/js/script.js"></script>
</body>
</html>