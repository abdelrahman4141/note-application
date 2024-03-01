
<?php include 'server.php'?>
<?php include 'body/header.php'?>
    <div class="header">
        <h2>Login</h2>
    </div>
    <form action="<?php echo $_SERVER['PHP_SELF']?>" method="post">
    <?php include 'errors.php' ?>
        <div class="input-group">
            <label for="">Username</label>
            <input type="text" name="username" value="<?php echo $username; ?>"> 
        </div>
        <div class="input-group">
            <label for="">Password</label>
            <input type="password" name="password">
        </div>
        <div class="input-group">
          <button type="submit" name="login" class="btn">Login</button>
        </div>
        <p>Not yet a member? <a href="register.php">Sign Up</p>
    </form>
    <?php include 'body/footer.php'?>