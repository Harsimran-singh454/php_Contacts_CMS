<?php

include( 'includes/database.php' );
include( 'includes/config.php' );
include( 'includes/functions.php' );

// secure();

if( !isset( $_GET['id'] ) )
{
  
  header( 'Location: users.php' );
  die();
  
}

if( isset( $_POST['first'] ) )
{
  
  if( $_POST['first'] and $_POST['last'] and $_POST['email'] )
  {
    
    $query = 'UPDATE users SET
      name = "'.mysqli_real_escape_string( $connect, $_POST['name'] ).'",
      email = "'.mysqli_real_escape_string( $connect, $_POST['email'] ).'",
      contact = "'.mysqli_real_escape_string( $connect, $_POST['contact'] ).'"
      WHERE id = '.$_GET['id'].'
      LIMIT 1';
    mysqli_query( $connect, $query );
    
    if( $_POST['password'] )
    {
      
      $query = 'UPDATE users SET
        password = "'.md5( $_POST['password'] ).'"
        WHERE id = '.$_GET['id'].'
        LIMIT 1';
      mysqli_query( $connect, $query );
      
    }
    
    set_message( 'User has been updated' );
    
  }

  header( 'Location: users.php' );
  die();
  
}


if( isset( $_GET['id'] ) )
{
  
  $query = 'SELECT *
    FROM users
    WHERE id = '.$_GET['id'].'
    LIMIT 1';
  $result = mysqli_query( $connect, $query );
  
  if( !mysqli_num_rows( $result ) )
  {
    
    header( 'Location: users.php' );
    die();
    
  }
  
  $record = mysqli_fetch_assoc( $result );
  
}

include( 'includes/header.php' );

?>

<h2>Edit User</h2>


<form method="post">
  
  <label for="name">Name:</label>
  <input type="text" name="name" id="name" value="<?php echo htmlentities( $record['name'] ); ?>">
  
  <br>
  
  <label for="email">Email:</label>
  <input type="email" name="email" id="email" value="<?php echo htmlentities( $record['email'] ); ?>">
  
  <br>
  
  <label for="contact">Phone Number:</label>
  <input type="number" name="contact" id="contact" value="<?php echo htmlentities( $record['contact'] ); ?>">
  
  <br>
  
  <label for="password">Password:</label>
  <input type="password" name="password" id="password">
  
  <br>
    
  <input type="submit" value="Save Changes">
  
</form>

<p><a href="users.php"><i class="fas fa-arrow-circle-left"></i> Return to User List</a></p>


<?php

include( 'includes/footer.php' );

?>