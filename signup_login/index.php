<?php require_once "controllerUserData.php"; ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign Up</title>
    <link rel="stylesheet" href="style1.css">
</head>
<body>
    <div class="cont">
      <div class="form sign-in">
        <h2>Welcome back,</h2>
        <form class="form" action="login_signup.php" method="POST" autocomplete="off">
        <?php
                    if(count($errors) > 0){
                        ?>
                        <div class="alert alert-danger text-center">
                            <?php
                            foreach($errors as $showerror){
                                echo $showerror;
                            }
                            ?>
                        </div>
                        <?php
                    }
                    ?>
        <label>
          <span>Email</span>
          <input class="form-control" type="email" name="email" placeholder="Email Address" required value="<?php echo $email ?>">
        </label>
        <label>
          <span>Password</span>
          <input class="form-control" type="password" name="password" placeholder="Password" required>
        </label>
        <p class="forgot-pass">Forgot password?</p>
        <button class="btnn" type="submit" name="login" value="Login" ><a href="#">Login</a></button>
        <button type="button" class="fb-btn">Connect with <span>facebook</span></button>
      </div>
      <div class="sub-cont">
        <div class="img">
          <div class="img__text m--up">
            <h2>New here?</h2>
            <p>Sign up and discover great amount of new opportunities!</p>
          </div>
          <div class="img__text m--in">
            <h2>One of us?</h2>
            <p>If you already has an account, just sign in. We've missed you!</p>
          </div>
          <div class="img__btn">
            <span class="m--up">Sign Up</span>
            <span class="m--in">Sign In</span>
          </div>
        </div>
        <div class="form sign-up">
          <h2>Time to feel like home,</h2>
          <label>
            <span>Name</span>
            <input type="text" />
          </label>
          <label>
            <span>Email</span>
            <input type="email" id="email" />
          </label>
          <label>
            <span>Password</span>
            <input type="password" id="password"/>
          </label>
          <label>
            <span>Confirm Password</span>
            <input type="password" id="password" />
          </label>
          <button type="button" class="submit">Sign Up</button>
          <button type="button" class="fb-btn">Join with <span>facebook</span></button>
        </div>
      </div>
    </div>

    <script src="script.js"></script>
</body>
</html>