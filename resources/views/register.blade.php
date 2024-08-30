
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset ('css/register.css')}}">
    <title>Register</title>
</head>
<body>
      <div class="container">
        <img src="img/register.jpg" alt="Register Image" class="Register-image">
        <div class="box form-box">
          <h2>Welcome To Groove Box</h2>
          <P>Register Your Account</P>
          <br>
          <br>
            <form action="" method="post">
                <div class="field input">
                    <label for="username">Name</label>
                    <input type="text" name="username" id="username" autocomplete="off" required>
                </div>
                <div class="field input">
                    <label for="password">Password</label>
                    <input type="password" name="password" id="password" autocomplete="off" required>
                </div>
                <div class="field input">
                    <label for="email">Email</label>
                    <input type="email" name="email" id="email" autocomplete="off" required>
                </div>

                <div class="buttons">
                    <button class="btn" onclick="location.href='login.php'">Login</button>
                    <button class="btn" onclick="location.href='login.php'">Sign IN</button
                </div>
               
            </form>
        </div>
      </div>
</body>
</html>
