<?php
    require('assets/head.php');
    include('assets/nav.php');
    require('inc/connect.php');
    require('inc/functions.php');
    // require('inc/create-annonce.php');



                $id_user = $_SESSION['id'];
                $id_annonce = $_GET['id'];
            

                $sth = $db->prepare("INSERT INTO reservations(id_user,id_annonce) VALUES (:id_user,:id_annonce) ");  

                $sth->bindValue(':id_user',$id_user);
                $sth->bindValue(':id_annonce',$id_annonce); 
                // $sth->bindValue(':price',$price);
                // $sth->bindValue(':start_date',$start_date);
                // $sth->bindValue(':end_date',$end_date);
                // $sth->bindValue(':author_article',$userid);

                $sth->execute();
                header("Location:profile.php");
                
 

