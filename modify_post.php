<?php

    require('inc/connect.php');
    require('inc/functions.php');
    // require('inc/create-annonce.php');

   if(isset($_GET['id'])){

       if(isset($_POST['modify_annonce'])){
        echo "5";
       
           $title = htmlspecialchars($_POST['title']);
           $description = htmlspecialchars($_POST['description']);
           $city = htmlspecialchars($_POST['city']);
           $category = htmlspecialchars($_POST['category']);
           $file= $_FILES['image_url'];
           $address = htmlspecialchars($_POST['address']);
           $price = htmlspecialchars($_POST['price']);
           $userid = ($_SESSION['id']);
           $start_date = ($_POST['start_date']);
           $end_date = ($_POST['end_date']);
           $id = $_GET['id'];
           echo "3";
   
           if($file['size'] <= 1000000){ 
               echo "1";
               $valid_ext=array('jpg','jpeg','gif','png');
               $check_ext= strtolower(substr(strrchr($file['name'], '.'),1));
               if(in_array($check_ext, $valid_ext)){
                echo "2"; 
   
                   $imgname    = uniqid() . '_' . $file['name'];
                   $upload_dir = "./assets/uploads/";
                   $upload_name    = $upload_dir . $imgname;
                   $move_result = move_uploaded_file($file['tmp_name'], $upload_name);           
            
   
                   if($move_result){
                    echo "4";
   
                       $sth = $db->prepare("UPDATE annonces SET title=:title,description=:description,city=:city,category=:category,image_url=:image_url,address_article=:address_article,price=:price,author_article=:author_article,start_date=:start_date,end_date=:end_date WHERE id=:id");
                   
   
                       $sth->bindValue(':title',$title);
                       $sth->bindValue(':description',$description);
                       $sth->bindValue(':city',$city);
                       $sth->bindValue(':category',$category); 
                       $sth->bindValue(':image_url',$imgname);
                       $sth->bindValue(':address_article',$address);
                       $sth->bindValue(':price',$price);
                       $sth->bindValue(':start_date',$start_date);
                       $sth->bindValue(':end_date',$end_date); 
                       $sth->bindValue(':author_article',$_SESSION['id']);
                       $sth->bindValue(':id',$id);
   
                       $sth->execute();
                        echo "Votre annonce a bien été modifiée";
                        $message = "<div class ='alert alert-danger'>Votre annonce a bien été modifiée </div>";
                       
                    //    header("Location:profile.php");
                   }
   
               
        
               }
           }    
       }
   }
 
?>