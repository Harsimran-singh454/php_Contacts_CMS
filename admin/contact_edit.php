<?php

include( 'includes/database.php' );
include( 'includes/config.php' );
include( 'includes/functions.php' );

// secure();

if( !isset( $_GET['id'] ) )
{
  
  header( 'Location: contact.php' );
  die();
  
}

if( isset( $_POST['name'] ) )
{
  
  if( $_POST['name'] and $_POST['contact'] )
  {
    
    $query = 'UPDATE contacts SET
      name = "'.mysqli_real_escape_string( $connect, $_POST['name'] ).'",
      email = "'.mysqli_real_escape_string( $connect, $_POST['email'] ).'",
      contact = "'.mysqli_real_escape_string( $connect, $_POST['contact'] ).'",
      DOB = "'.mysqli_real_escape_string( $connect, $_POST['DOB'] ).'",
      address = "'.mysqli_real_escape_string( $connect, $_POST['address'] ).'"
      WHERE id = '.$_GET['id'].'
      LIMIT 1';
    mysqli_query( $connect, $query );
    
    set_message( 'Contact has been updated' );
    
  }

  header( 'Location: contact.php' );
  die();
  
}


if( isset( $_GET['id'] ) )
{
  
  $query = 'SELECT *
    FROM contacts
    WHERE id = '.$_GET['id'].'
    LIMIT 1';
  $result = mysqli_query( $connect, $query );
  
  if( !mysqli_num_rows( $result ) )
  {
    header( 'Location: contact.php' );
    die();
  }
  $record = mysqli_fetch_assoc( $result );
}
include( 'includes/header.php' );
?>

<h2>Edit Project</h2>

<form method="post">
  
  <label for="name">Name:</label>
  <input type="text" name="name" id="name" value="<?php echo htmlentities( $record['name'] ); ?>">
    
  <br>
  
  <label for="contact">Contact:</label>
  <input type="number" name="url" id="url" value="<?php echo htmlentities( $record['contact'] ); ?>">
  
  <br>
  
  <label for="email">Email:</label>
  <input type="email" name="email" id="email" value="<?php echo htmlentities( $record['email'] ); ?>">
    
  <br>
  
  <label for="DOB">Date of Birth:</label>
  <input type="date" name="DOB" id="DOB" value="<?php echo htmlentities( $record['DOB'] ); ?>">
    
  <br>
  
  <label for="address">Address:</label>
  <textarea type="text" name="address" id="address" rows="5"><?php echo htmlentities( $record['address'] ); ?></textarea>
    
  <br>
  
  <input type="submit" value="Edit Project">
  
</form>

<p><a href="contact.php"><i class="fas fa-arrow-circle-left"></i> Return to Project List</a></p>


<?php

include( 'includes/footer.php' );

?>