<?php

include "../config/database.php";


if($_SERVER['REQUEST_METHOD'] == "GET") {
    $id = $_GET['id'];

    $articles = $test->showArticles("articles",array("title","contenu") , $id);

    $title = $articles['title'];
    $content = $articles['contenu'];
} else {
   $id = $_GET['id'];
   $title = $_POST['title'];
   $content = $_POST['content'];
   $test->update("articles", ['title', 'contenu'], [$title, $content], "ID_Articles = $id");

   header("location: ../../index.php");
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
        <h2 class="my-5">UPDATE DATA</h2>
        <form method="post" class="form">
            <div class="my-5">
                <label class="form-label">Title Of Article</label>
                <input type="text" class="form-control" name="title" value="<?= $title?>">
            </div>
            <div class="my-5">
                <label class="form-label ">Content</label>
                <input class="form-control" style="height: 200px" name="content" value="<?= $content?>"></input>
            </div>
            <div>

                <input class="btn btn-success" type="submit" name="submit">
            </div>
        </form>
    </div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>

</body>
</html>