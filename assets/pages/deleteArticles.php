<?php


    include "../config/database.php";


    if(isset($_GET["id"]))
    {
       $result = $test->delete("articles","ID_Articles",$_GET["id"]);
       if($result)
       {
            header("location: articles.php");
       }

    }
?>