<?php

include( 'includes/database.php' );
include( 'includes/config.php' );
include( 'includes/functions.php' );

// secure();

if( isset( $_POST['name'] ) )
{
  
  if( $_POST['name'] and $_POST['contact'] )
  {
    
    $query = 'INSERT INTO contacts (
        name,
        contact,
        email,
        image,
        DOB,
        address
      ) VALUES (
         "'.mysqli_real_escape_string( $connect, $_POST['name'] ).'",
         "'.mysqli_real_escape_string( $connect, $_POST['contact'] ).'",
         "'.mysqli_real_escape_string( $connect, $_POST['email'] ).'",
         "'.mysqli_real_escape_string( $connect, $_POST['image'] ).'",
         "'.mysqli_real_escape_string( $connect, $_POST['DOB'] ).'",
         "'.mysqli_real_escape_string( $connect, $_POST['address'] ).'"
      )';
    mysqli_query( $connect, $query );
    
    set_message( 'New Contact Created' );
    
  }
  
  header( 'Location: contact.php' );
  die();
  
}

include( 'includes/header.php' );

?>

<h2>Add Project</h2>

<form method="post" enctype="multipart/form-data">
  
  <label for="name">Name:</label>
  <input type="text" name="name" id="name">
    
  <br>  
  
  <label for="contact">Contact no.:</label>
  <input type="number" name="contact" id="contact">
    
  <br>  
  
  <label for="email">Email:</label>
  <input type="email" name="email" id="email">
    
  <br>  
    
  <label for="address">Address:</label>
  <textarea type="text" name="address" id="address" rows="10"></textarea>
  <div class="frame">
  <label for="image">Image:</label>
  <input type="file" name="image" id="image">
    
  <br>  
  
  <label for="DOB">Date of Birth:</label>
  <input type="date" name="DOB" id="DOB">
    
  <br>
  </div>
      
  <script>

  // ClassicEditor
  //   .create( document.querySelector( '#content' ) )
  //   .then( editor => {
  //       console.log( editor );
  //   } )
  //   .catch( error => {
  //       console.error( error );
  //   } );
    
  </script>
  
  <br>
  
  <input type="submit" value="Add Contact">
  
</form>

<p><a href="contact.php"><i class="fas fa-arrow-circle-left"></i> Return to Project List</a></p>


<?php

include( 'includes/footer.php' );

?>