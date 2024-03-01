<?php include 'server.php';


//if user is not logged in,they cannot access this page
if(empty($_SESSION['username'])) {
  header("location: login.php");
}

$user_id= $_SESSION['user_id'];
// var_dump($user_id);

if(isset($_POST["submit"])) {
  $text = mysqli_real_escape_string($db, $_POST['text']);
  $query = "INSERT INTO notes (user_id, text) VALUES ($user_id, '$text')";
  mysqli_query($db,$query);
  header("location: home.php");
  exit();
}
if(isset($_GET['delete'])) {
  $note_id = mysqli_real_escape_string($db, $_GET['delete']);
  $query = "DELETE FROM notes WHERE id = $note_id AND user_id = $user_id";
  mysqli_query($db, $query);
  header("location: home.php");
  exit();
}

$query ="SELECT * FROM notes WHERE user_id=$user_id";
$result =mysqli_query($db,$query);
$rows = mysqli_fetch_all($result,MYSQLI_ASSOC);

// print_r($rows);


?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Home</title>
    <!-- <link rel="stylesheet" href="main.css" /> -->
    <style>
      body {
        font-family: Arial, Helvetica, sans-serif;
      }
      .container {
        width: 500px;
        margin: 20px auto;
      }
      .form {
        background-color: #eee;
        border-radius: 6px;
        padding: 20px;
        display: flex;
        align-items: center;
        
      }
      h2 {
        width: 30%;
        margin: 0px auto;
        padding: 20px;
        color:white;
        text-align:center;
        border: 1px solid #b0c4de;
        background: #5f9ea0;
        border-radius: 0px 0 10px 10px;
      }
      .input {
        padding: 10px;
        border: 1px solid #ddd;
        border-radius: 6px;
        flex: 1;
      }
      .input:focus {
        outline: none;
      }
      .add,.welcome {
        border: none;
        background-color: #5f9ea0;
        color: white;
        padding: 10px;
        border-radius: 6px;
        margin-left: 10px;
        cursor: pointer;
        text-decoration: none;
       
      }
      .notelist {
        background-color: #eee;
        margin-top: 20px;
        border-radius: 6px;
        padding: 20px;
       
      }
      .notelist .note {
        background-color: white;
        padding: 10px;
        border-radius: 6px;
        display: flex;
        justify-content: space-between;
        align-items: center;
        transition: 0.3s;
        cursor: pointer;
        border: 1px solid #ccc;
      }
      .notelist .note:not(:last-child) {
        margin-bottom: 15px;
      }
      .notelist .note:hover {
        background-color: #f7f7f7;
      }
      .notelist .note.done {
        opacity: 0.5;
      }
      .notelist .note .delete {
        font-weight: bold;
        font-size: 10px;
        background-color: red;
        color: white;
        padding: 2px 6px;
        border-radius: 4px;
        cursor: pointer;
        display:block;
        text-decoration:none;
      }
      .notelist .note .edit {
        font-weight: bold;
        font-size: 10px;
        background-color: rgb(0, 76, 255);
        color: white;
        padding: 2px 6px;
        border-radius: 4px;
        cursor: pointer;
      }
    </style>
  </head>
  <body>
    <h2>Home Page</h2>
    <div class="container">
      <?php if (isset($_SESSION['username'])): ?>
        <div class="error success">
          
        </div>
    <?php endif; ?>

    <?php if (isset($_SESSION['username'])):?>
      <p >Welcome <strong><?php echo $_SESSION['username']?></strong></p>
      
      <?php endif; ?>

      <form class="form" method="POST">
        <input type="text" class="input" required name="text"/>
        <input type="submit" class="add" value="Add Note" name="submit"/>
        <input type="hidden" id="editInput" />
      </form>
      <div class="notelist">
      <?php foreach( $rows as $note ): ?>
          <div class="note">
            <p class=""><?php echo $note['text'];?></p>
            <a href="home.php?delete=<?php echo $note['id']; ?>" class="delete">Delete</a>
            
          </div>

        <?php endforeach;?>
      </div>
      <?php if (isset($_SESSION['username'])):?>
      
      <p ><a class="welcome" href="<?php echo $_SERVER['PHP_SELF'];?>?logout='1'">Logout</a></p>
      <?php endif; ?>
    </div>
  </body>
</html>
