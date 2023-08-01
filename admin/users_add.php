<?php

include( 'includes/database.php' );
include( 'includes/config.php' );
include( 'includes/functions.php' );

// secure();

if( isset( $_POST['name'] ) )
{
  
  if( $_POST['name'] and $_POST['email'] and $_POST['contact'] and $_POST['password'] )
  {
    
    $query = 'INSERT INTO users (
        name,
        email,
        contact,
        password
      ) VALUES (
        "'.mysqli_real_escape_string( $connect, $_POST['name'] ).'",
        "'.mysqli_real_escape_string( $connect, $_POST['email'] ).'",
        "'.mysqli_real_escape_string( $connect, $_POST['contact'] ).'",
        "'.md5( $_POST['password'] ).'"
      )';
    mysqli_query( $connect, $query );
    
    set_message( 'User has been added' );
    
  }

  /*
  // Example of debugging a query
  print_r($_POST);
  print_r($query);
  die();
  */

  header( 'Location: users.php' );
  die();
  
}

include( 'includes/header.php' );

?>

<h2>Add User</h2>

<form method="post">
  
  <label for="name">Name:</label>
  <input type="text" name="name" id="name">
  
  <br>
  
  <label for="email">Email:</label>
  <input type="email" name="email" id="email">
  
  <br>
  
  <label for="contact">Phone Number:</label>
  <input type="number" name="contact" id="contact">
  
  <br>
  
  <label for="password">Password:</label>
  <input type="password" name="password" id="password">
  
  <br>
  
  
  <input type="submit" value="Register User">
  
</form>

<p><a href="users.php"><i class="fas fa-arrow-circle-left"></i> Return to User List</a></p>


<?php

include( 'includes/footer.php' );

?>