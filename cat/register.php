
<?php include 'server.php'?>
<?php include 'body/header.php'?>

    <div class="header">
        <h2>Registration</h2>
    </div>
    <form action="<?php echo $_SERVER['PHP_SELF'];?>" method="post">
    <?php include 'errors.php' ?>
        <div class="input-group">
            <label for="">Username</label>
            <input type="text" name="username" value="<?php echo $username; ?>">
        </div>
        <div class="input-group">
            <label for="">Email</label>
            <input type="email" name="email" value="<?php echo $email; ?>">
        </div>
        <div class="input-group">
            <label for="">Password</label>
            <input type="password" name="password_1" >
        </div>
        <div class="input-group">
            <label for="">Confirm Password</label>
            <input type="password" name="password_2" >
        </div>
        <div class="input-group">
          <button type="submit" name="register" class="btn">Register</button>
        </div>
        <p>Already a member? <a href="login.php">Sign In</p>
    </form>
    <?php include 'body/footer.php'?>