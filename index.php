<?php 
  session_start();
  require_once('new-connection.php');

  $user_query = "SELECT * FROM users";

  $users = fetch($user_query);

  var_dump($users);

 ?>

 <html>
   <head>
     <title>SQL demo</title>
     <style>
      table, td, th, tr{
        border: 1px solid silver;
      }
     </style>
   </head>
   <body>
     <h1>Users</h1>
      <?php 
      if(isset($_SESSION['success'])){
        echo($_SESSION['success']);
        unset($_SESSION['success']);
      }
     ?>
     <table>
      <thead>
        <tr>
          <th>id</th>
          <th>name</th>
          <th>email</th>
        </tr>
      </thead>
     <?php 
      foreach($users as $user){
        ?>
        <tr>
          <?php 
            foreach($user as $data){
              echo("<td>{$data}</td>");
            }
           ?>
        </tr>  
  <?php }
      ?>
      </table><br>
    <form action="process.php" method='post'>

      Name: <input type="text" name='name'><br>
      Email: <input type="text" name='email'>
      <input type="hidden" name='action' value='new_user'>
      <input type="submit" value='insert'>
    </form>
   </body>
 </html>