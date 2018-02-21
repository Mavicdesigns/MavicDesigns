<?php
/**
 * Created by PhpStorm.
 * User: PC
 * Date: 2/20/2018
 * Time: 12:13 AM
 */

$servername = 'localhost';
$username = 'root';
$password = '' ;
$dbname = "realife";


$value = $_REQUEST['value'];
$type  = $_REQUEST['type'];
    $conn = new mysqli( $servername,$username , $password,$dbname);

if($conn -> connect_error){
   die("Could not connect to sever".$conn->connect_error);
}else{
    if(empty($value) || empty($type)){
        $sql = "SELECT * FROM blog";
        $result = $conn->query($sql);
        echo "<h3>Recents Post</h3>";
    }else {


        $sql = "SELECT * FROM blog WHERE $type = '$value'";
        $result = $conn->query($sql);
        echo "<h3>Posts by ".$type." ".$value." -></h3>";
    }
    if($result ->num_rows >0){

        while($row = $result ->fetch_array()){


            echo " <div class=\"blog-post \">";
            echo "<a href=\"#\"><img src=\"images/blog/1.jpg\" alt=\"1.jpg, 361kB\" title=\"1\" width=\"100%\"></a>";
            echo " <div class=\"blog-content\">
        <h2 align=\"left\" class=\"blog-h\">
            ".$row['blog_title']."
        </h2>";
            echo "<p align=\"left\" class=\"blog-p\">".$row['excerpts']."</p>";
            echo " <i>Posted ". $row['posted_time']."</i>";
            echo "        <div><a href=\"blog.php?blog_title=".$row['blog_title']."&blog_idd=".$row['blog_idd']."\" class=\"btn-change btn f-right\">Read more</a> </div>";
            echo "</div>";
            echo "</div>";
        }
    }else{
        echo "<h1>Oops No Results Found</h1>";
        echo "<p>Could not Find any post by ".$type."  ".$value."</p>";
    }
}


?>
