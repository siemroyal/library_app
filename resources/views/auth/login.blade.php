<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Login</title>
</head>
<body>
    @include("auth.message")
    <form method="POST" action="{{ route("login_action") }}">
        @csrf
        <label for="email">Email</label>
        <input type="email" name="email" id="email" placeholder="Enter your email"><br/>
        @error("email")
            <span style="color:red;">{{ $message }}</span>  
        @enderror
        <label for="password">Password</label>
        <input type="password" name="password" id="password" placeholder="Enter your password"><br/>
        @error("password")
            <span style="color:red;">{{ $message }}</span>  
        @enderror
        
        <input type="submit" name="submit" id="submit" value="Login" />
    </form>
</body>
</html>