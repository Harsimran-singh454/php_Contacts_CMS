<!doctype html>
<html>
<head>
  <meta charset="UTF-8">
  <meta http-equiv="Content-type" content="text/html; charset=UTF-8">
  <title>Website Admin</title>
  <style>
    /* styles.css */

    body {
      font-family: Arial, sans-serif;
      margin: 0;
      padding: 10px;
      background-color: #f2f2f2;
    }

    header {
      background-color: #333;
      color: #fff;
      padding: 10px;
      display: flex;
      justify-content: space-between;
      align-items: center;
    }

    .logo {
      font-size: 24px;
      padding: 10px;
    }

    nav {
      display: flex;
      align-items: center;
      padding: 10px;
    }

    a {
      color: #fff;
      text-decoration: none;
      padding: 10px 15px;
      margin: 0 5px;
      border-radius: 5px;
      background-color: #007bff;
      transition: background-color 0.3s ease;
      display: inline-block;
    }

    a:hover {
      background-color: #777;
    }

    .main-content {
      max-width: 800px;
      margin: 0 auto;
      padding: 20px;
    }

    h1 {
      font-size: 36px;
      margin-bottom: 20px;
    }

    p {
      font-size: 18px;
      margin-bottom: 30px;
    }

    /* Contact Card Styles */

    .contact-card {
      background-color: #fff;
      border-radius: 5px;
      box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
      padding: 20px;
      margin-bottom: 20px;
    }

    .contact-card h2 {
      font-size: 24px;
      margin-bottom: 10px;
    }

    .contact-card p {
      font-size: 16px;
      margin-bottom: 15px;
    }

    .contact-card img {
      max-width: 100%;
      height: auto;
      border-radius: 5px;
      margin-bottom: 10px;
      box-shadow: 0 2px 5px rgba(0, 0, 0, 0.2);
    }

    /* Buttons Styles */

    .btn {
      display: inline-block;
      padding: 10px 20px;
      margin: 5px;
      font-size: 16px;
      border: none;
      border-radius: 5px;
      background-color: #007BFF;
      color: #fff;
      cursor: pointer;
      transition: background-color 0.3s ease;
    }

    .btn:hover {
      background-color: #0056b3;
    }

    /* Responsive Styles for Smaller Screens (Phones) */

    @media screen and (max-width: 600px) {
      header {
        flex-direction: column;
        align-items: center;
      }

      .logo {
        margin-bottom: 10px;
      }

      nav {
        flex-direction: column;
        text-align: center;
      }

      nav a {
        margin: 5px 0;
        width: 100%; /* Full width for buttons */
        display: block; /* Ensure buttons stack on top of each other */
        text-align: center; /* Center the text in buttons */
      }

      h1 {
        font-size: 28px;
        text-align: center; /* Center the heading text */
      }

      p {
        font-size: 14px;
        margin-bottom: 20px;
        text-align: center; /* Center the paragraph text */
      }

      .main-content {
        padding: 10px;
      }

      .contact-card {
        padding: 10px;
        margin-bottom: 10px;
      }

      .contact-card h2 {
        font-size: 20px;
        margin-bottom: 5px;
      }

      .contact-card p {
        font-size: 14px;
        margin-bottom: 10px;
      }

      .btn {
        font-size: 14px;
        padding: 8px 15px;
        width: 100%; /* Full width for buttons */
      }
    }

    /* Responsive Styles for Bigger Screens (Desktops and Tablets) */

    @media screen and (min-width: 601px) {
      nav {
        flex-wrap: wrap;
      }

      nav a {
        margin: 5px;
        width: auto; /* Reset width to auto */
        display: inline-block; /* Reset display to inline-block */
      }

      h1 {
        font-size: 36px;
        margin-bottom: 20px;
      }

      p {
        font-size: 18px;
        margin-bottom: 30px;
      }

      .main-content {
        padding: 20px;
      }

      .contact-card h2 {
        font-size: 24px;
        margin-bottom: 10px;
      }

      .contact-card p {
        font-size: 16px;
        margin-bottom: 15px;
      }

      .btn {
        font-size: 16px;
        padding: 10px 20px;
      }
    }
  </style>
</head>
<body>

  <h1>Welcome to My Website!</h1>
  <p>This is the website frontend!</p>

  <?php

  $query = 'SELECT *
    FROM contacts
    ORDER BY name DESC';
  $result = mysqli_query( $connect, $query );

  ?>

  <p>There are <?php echo mysqli_num_rows($result); ?> projects in the database!</p>

  <!-- Button container for phone screens -->
  <div class="btn-container">
    <a href="/cmsassign/admin/contact_add.php" class="btn">Add Contact</a>
    <a href="/cmsassign/admin/contact_edit.php" class="btn">Edit Contact</a>
    <a href="/cmsassign/admin/users_add.php" class="btn">Add User</a>
    <a href="/cmsassign/admin/users_edit.php" class="btn">Edit User</a>
    <a href="/cmsassign/admin/dashboard.php" class="btn">Dashboard</a>
  </div>

  <?php while($record = mysqli_fetch_assoc($result)): ?>

    <div>

      <h2><?php echo $record['name']; ?></h2>
      <?php echo $record['contact']; ?>

      <?php if($record['image']): ?>

        <p>The image can be inserted using a base64 image:</p>

        <img src="<?php echo $record['image']; ?>">

        <p>Or by streaming the image through the image.php file:</p>

        <!-- <img src="admin/image.php?type=project&id=<?php echo $record['id']; ?>&width=100&height=100"> -->

      <?php else: ?>

        <p>This record does not have an image!</p>

      <?php endif; ?>

    </div>

    <hr>

  <?php endwhile; ?>

</body>
</html>
