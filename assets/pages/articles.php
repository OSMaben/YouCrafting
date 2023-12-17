
<?php
  include "assets/config/database.php";

  $result = $test->show("articles",array("ID_Articles","title","contenu","date_de_creation","image"));

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
</head>
<body>
    <?php include "assets/pages/header.php"?>
    <div>
        <div class="image">
            <img class="img-fluid" src="assets/img/hero1.jpg" alt="">
        </div>
    </div>
    <div class="container">
        <div class="title my-5 d-flex justify-content-between">
            <h3 class="articles">Articles</h3>
            <a href="assets/pages/addArticle.php" class="btn btn-primary">Add Article</a>    
        </div>
    <div class="row row-cols-1 row-cols-md-3 g-4">
      <?php  
      foreach($result as $row)
      {
        echo "
        <div class='col'>
          <div class='card h-100'>
            <img src='assets/pages/images/$row[image]' class='card-img-top' alt='...'>
            <div class='card-body'>
              <h5 class='card-title'>$row[title]</h5>
              <p class='card-text'>$row[contenu]</p>
            </div>
            <div class='card-footer d-flex justify-content-between align-items-center'>
              <small class='text-body-secondary'>$row[date_de_creation]</small>
              <div>
                <a href='assets/pages/updateArticle.php?id=$row[ID_Articles]' class='btn btn-primary'>Update</a>
                <a href='assets/pages/deleteArticles.php?id=$row[ID_Articles]' class='btn btn-success'>Delete</a>
              </div>
            </div>
          </div>
        </div>
        ";
      }
      ?>
    </div>
        
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>
</html>