<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Meta Tags -->
	<meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Minat Bakery - signup</title>
    <meta name="description" content="E-learning management system"/>
    
	<!-- Favicon -->
    <link rel="shortcut icon" href="favicon.ico">
    <link rel="icon" href="favicon.ico" type="image/x-icon">
    <base href="/public">
  @include('css')
</head>
<body>
 
<section class="form-container">

<form action="{{ route('register') }}" method="post" enctype="multipart/form-data">
@csrf
<h3>register now</h3>
<p>your name <span>*</span></p>
<input type="text" name="name" :value="old('name')" required autofocus autocomplete="name" placeholder="enter your name" required maxlength="50" class="box">
<p>your email <span>*</span></p>
<input type="email" name="email" :value="old('email')" required placeholder="enter your email" required maxlength="50" class="box">
<p>your password <span>*</span></p>
<input placeholder="6+ characters" type="password" name="password" required autocomplete="new-password" required maxlength="20" class="box">
<p>confirm password <span>*</span></p>
<input placeholder="6+ characters" type="password" name="password_confirmation" required autocomplete="new-password" required maxlength="20" class="box">
<input type="submit" value="register new" name="submit" class="btn">
</form>

</section>

	<!-- jQuery -->
	<script src="./assets/js/script.js"></script>
</body>
</html>