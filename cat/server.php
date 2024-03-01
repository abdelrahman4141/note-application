<?php include 'config.php'?>
<?php //connect to the data
session_start();
$db =mysqli_connect( DB_HOST,DB_USER,DB_PASS,DB_NAME);
$username="";
$email="";
$errors =array();
if(isset($_POST['register'])){

    $username= mysqli_real_escape_string($db,$_POST['username']);
    $email=mysqli_real_escape_string($db,$_POST['email']);
    //hash the password
    $password_1=mysqli_real_escape_string($db,$_POST['password_1']); 
    $password_2=mysqli_real_escape_string($db,$_POST['password_2']);

    if(empty($username)) {
        array_push($errors , 'Username is required');
    }
    if(empty($email)) {
        array_push($errors , 'Email is required');
    }
    if(!filter_var($email,FILTER_VALIDATE_EMAIL)) {
        array_push($errors , 'Email is Not Valid');
    }
    if(empty($password_1) || empty($password_2)) {
        array_push($errors , 'Password is required');
    }
    if ($password_1 !== $password_2) {
       array_push($errors, 'The two passwords do not match');
    }
    // Check if user already exists
    $user_check_query = "SELECT * FROM users WHERE username='$username' OR email='$email' LIMIT 1";
    $result = mysqli_query($db, $user_check_query);
    $user = mysqli_fetch_assoc($result);

    if ($user) { // If user exists
        if ($user['username'] === $username) {
            array_push($errors, 'Username already exists');
        }

        if ($user['email'] === $email) {
            array_push($errors, 'Email already exists');
        }
    }
    // if there are no errors, save user to database

    if(count($errors) == 0) {
        $password=md5($password_1);//hashing
        $query ="INSERT INTO users (username,email,password)
         VALUES ('$username','$email','$password')";
       
         mysqli_query($db, $query);
         //select query
         $query ="SELECT * FROM users WHERE password='$password' AND username='$username' ";
         $result =mysqli_query($db,$query);
         $user = mysqli_fetch_assoc($result);

         $_SESSION['user_id']=$user['id'];
         $_SESSION['username']=$username;
    
        //  $_SESSION['success']= "You are now logged in";
         header('location: home.php');
    }
}
//login 
if (isset($_POST['login'])) {
    $username=mysqli_real_escape_string($db,$_POST['username']);
    //hash the password
    $password=mysqli_real_escape_string($db,$_POST['password']); 

    if(empty($password)) {
        array_push($errors , 'Password is required');
    }
   
    if(empty($username)) {
        array_push($errors , 'username is required');
    }
   

    if(count($errors) == 0) {
        $password=md5($password);
        
        $query ="SELECT * FROM users WHERE password='$password' AND username='$username' ";
         $result =mysqli_query($db,$query);
         $user = mysqli_fetch_assoc($result);
        //  $user = mysqli_num_rows($result);
         
         if($user){ 
            //log user in
            $_SESSION['user_id']=$user['id'];
            $_SESSION['username']=$username;
            // $_SESSION['user_id']=mysqli_fetch_assoc($result)['ID'];
            //  $_SESSION['success']= "You are now logged in";
             header('location: home.php');

         }else {
            array_push($errors,'The username/password combination does not exist!');
         }
       
    }

}

    //logout
if(isset($_GET['logout'])) {
    session_destroy();
    unset($_SESSION['username']);
    // unset($_SESSION['success']);
    
    header("location: login.php");
   }

   ?>