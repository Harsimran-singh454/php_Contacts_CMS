<?php

include( 'includes/database.php' );
include( 'includes/config.php' );
include( 'includes/functions.php' );

// secure();

if( isset( $_GET['delete'] ) )
{
  
  $query = 'DELETE FROM contacts
    WHERE id = '.$_GET['delete'].'
    LIMIT 1';
  mysqli_query( $connect, $query );
    
  set_message( 'Contact has been deleted' );
  
  header( 'Location: contact.php' );
  die();
  
}

include( 'includes/header.php' );

$query = 'SELECT *
  FROM contacts
  ORDER BY id DESC';
$result = mysqli_query( $connect, $query );

?>

<style>
   
 .card-container{
        position: absolute;
        display: flex;
        flex-direction: row;
        flex-wrap: wrap;
        justify-content:center;
        margin:10px auto;
        gap:30px;
    }

    .card{
        display:flex;
        flex-direction:column;
        padding: 20px;
        /* border:1px solid gray; */
        border-radius:15px;
        justify-content:center;
        width: 250px;
        background-color:#ebebeb;
    }

    .card *{
        margin:0px auto;

    }

    .card img{
        width: 150px;
    }

    .card-action{
        display:flex;
        flex-direction: row;
        width:100%;
    }

    .card-actions .delete{
        color: red;
    }
</style>

<h2>All Cantacts</h2>
<div class="card-container">
  <?php while( $record = mysqli_fetch_assoc( $result ) ): ?>

    <div class="card">
        <img src="image.php?type=project&id=<?php echo $record['id']; ?>&width=300&height=300&format=inside">
        <strong><?php echo htmlentities( $record['name'] ); ?></strong>
        <small><?php echo $record['address']; ?></small>
        <br>
        <p><?php echo $record['email']; ?></p>
        <p>ph: <?php echo htmlentities( $record['contact'] ); ?></p>
        <div class="card-actions"> 
           <a href="contact_edit.php?id=<?php echo $record['id']; ?>">Edit</i></a></td>
        <a class="delete" href="contact.php?delete=<?php echo $record['id']; ?>" onclick="javascript:confirm('Are you sure you want to delete this project?');">Delete</i></a>
        <a href="contact_photo.php?id=<?php echo $record['id']; ?>">Photo</i></a></td>
        </div>
    </div>
      
  <?php endwhile; ?>


    <div class="card">
    <p><a href="contact_add.php" style="">Add Project</a></p>
    </div>
</div>

<?php

include( 'includes/footer.php' );

?>