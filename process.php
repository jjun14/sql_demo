<?php 
  session_start();
  require_once('new-connection.php');

  // var_dump($_POST);

  if(isset($_POST['action']) && $_POST['action'] == 'new_user'){
    $update_query = "INSERT INTO users (name, email) VALUES ('{$_POST['name']}', '{$_POST['email']}')";
    // echo($update_query);
    // add validation here
    if(run_mysql_query($update_query)){
      $_SESSION['success'] = "<p>Created User!";
    } else {
      $_SESSION['error'] = "<p>Failed to create user!";
    }
    header('Location: index.php');
    exit();
  }




 ?>