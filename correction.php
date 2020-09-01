<?php

    require('inc/connect.php');
    require('inc/functions.php');

    if(isset($_POST['submit_annonce'])){
        var_dump($_POST);
        var_dump($_FILES);
       
        $title= htmlspecialchars($_POST['title']);
        $description = htmlspecialchars($_POST['description']);
        $city = htmlspecialchars($_POST['city']);
        $category = htmlspecialchars($_POST['category']);
        $files=$_FILES['img_url'];
        $address = htmlspecialchars($_POST['address']);
        $price = htmlspecialchars($_POST['price']);
        $user_id = $_SESSION['id;']
        $start_date= $_POST['start_date'];
        $end_date= $_POST['end_date'];

    }

    $sth = $db->prepare(" INSERT INTO users(:title,:description,:city,:category,:image_url:,:address_article,:price,:author_article,:start_date,:end_date) ");  

    $sth->bindValue(':title',$title);
    $sth->bindValue(':desxription',$description);
    $sth->bindValue(':city',$city);
    $sth->bindValue(':category',$category); 
    $sth->bindValue(':image_url',$image_url);
    $sth->bindValue(':address_article',$address_article);
    $sth->bindValue(':price',$price);
    $sth->bindValue(':start_date',$start_date);
    $sth->bindValue(':end_date',$end_date);
                       

        
 


?>