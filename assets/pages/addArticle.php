<?php
include "../config/database.php";

if(isset($_POST['submit'])) {
    $title = $_POST["title"];   
    $content = $_POST["content"];
    $currentDate = date("Y-m-d");
    
    $filename = $_FILES["uploadfile"]["name"];
    $tempname = $_FILES["uploadfile"]["tmp_name"];
    echo $filename;
    $folder = "images/" . $filename;
    
   if(move_uploaded_file($tempname, $folder)){
    echo "File Move";
   }
   else
   {
        echo "there was an error";
   }
    $result = $test->insert("articles", array("title","contenu","date_de_creation","id_utilisateur","image"),
                            array($title, $content, $currentDate, "1", $filename)); 

    if($result) {  
        header("location: ../../index.php");
    } else {
        echo "Failed to insert into the database.";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <title>Add Articles</title>
</head>
<body>
    <?php include "header.php"?>
    <div class="container">
    <h2 class="my-5">Add Article</h2>
    <form method="post" class="form" enctype="multipart/form-data">
            <div class="input-group mb-3">
            <input type="file" class="form-control" id="inputGroupFile02" name="uploadfile">
                <label class="input-group-text" for="inputGroupFile02">Upload</label>
            </div>
            <div class="my-5">
                <label class="form-label">Title Of Article</label>
                <input type="text" class="form-control" name="title">
            </div>
            <div class="my-5">
                <label class="form-label ">Content</label>
                <textarea class="form-control" style="height: 200px" name="content"></textarea>
            </div>
            <div>
                <input class="btn btn-success" type="submit" name="submit">
            </div>
        </form>
    </div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>

</body>
</html>