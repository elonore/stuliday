<?php
require('inc/connect.php');
require('assets/head.php');
include('assets/nav.php');
require('inc/functions.php');

$userid = $_SESSION['id'];
$id = $_GET['id'];

$sql2 = $db->query("SELECT * FROM `annonces` WHERE id = $id LIMIT 1");
$row = $sql2->fetch();


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Stuliday</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
</head>
<body>

<section class="container">

    <form action="modify_post.php?id=<?= $id; ?>" method="post" enctype="multipart/form-data">
        <h1>Modifier votre annonce</h1>
        <div class="form-group">
            <label for="exampleFormControlInput1">Titre</label>
            <input type="text" class="form-control" id="exampleFormControlInput1" name="title" placeholder="Joli appartement situé en plein centre-ville" value="<?= $row[1]?>">
        </div>
        <div class="form-row">
            <div class="form-group col-md-6">
                <label for="inputDate4">Date de début de l'annonce</label>
                <input type="date" class="form-control" id="date" name="start_date" value="<?= $row[10]?>" placeholder="MM/DD/YYYY" required>
            </div>
            <div class="form-group col-md-6">
                <label for="inputDate4">Date de fin de l'annonce</label>
                <input type="date" class="form-control" id="date" name="end_date" placeholder="MM/DD/YYYY" required value="<?= $row[11]?>">
            </div>
        </div>
        <div class="form-row">
            <div class="form-group col-md-6">
                <label for="inputAddress">Addresse complète</label>
                <input type="text" class="form-control" id="inputAddress" name="address" placeholder="Adresse complère avec code postal inclus" value="<?= $row[6]?>">
            </div>
            <div class="form-group col-md-12">
                <label for="exampleFormControlTextarea1">Description</label>
                <textarea class="form-control" id="exampleFormControlTextarea1" name="description" rows="3"><?php echo $row[2]?></textarea>
            </div>
        </div>
        <div class="form-group">
            <label for="exampleFormControlSelect1">Ville</label>
            <select class="form-control" id="exampleFormControlSelect1" name="city" placeholder="Choisissez une ville" required value="<?= $row[3]?>">
                <option>Choisissez une ville</option>
                <option>Bordeaux</option>
                <option>Talence</option>
                <option>Bègles</option>
                <option>Mérignac</option>
                <option>Pessac</option>
                <option>Gradignan</option>
                <option>Vilenave d'Ornon</option>
                <option>Bouliac</option>
            </select>
        </div>
        <div class="form-group">
            <label for="exampleFormControlSelect1">Type de logement</label>
            <select class="form-control" id="exampleFormControlSelect1" name="category" required id="" value="<?= $row[4]?>">
                <option>Chambre</option>
                <option>Studio</option>
                <option>T1</option>
                <option>T2</option>
                <option>T3</option>
                <option>T4</option>
                <option>Maison</option>
                <option>Villa</option>
                <option>Penthouse</option>
            </select>
        </div>
        <div class="form-row">
            <div class="form-group col-md-6">
                <label for="inputPrice">Prix par personne et par nuit(en euros)</label>
                <input type="text" class="form-control" id="inputPrice" name="price" value="<?= $row[8]?>">
            </div>
        </div>
        <div class="form-inline">
            <div class="form-group col-md-6">
                <label for="exampleFormControlFile1">Choisissez une photo de présentation</label>
                <input type="file" class="form-control-file img-fluid" id="exampleFormControlFile1" name="image_url"  value="<?= $row[5]?> ">
            </div>
            <div class="form-group col-md-6">
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" id="gridCheck" name="check">
                    <label class="form-check-label" for="gridCheck">
                        J'accepte les CGU
                    </label>
                </div>
            </div>
        </div>
        </div>
        <div class="form-group my-2">
            <button type="submit" name="modify_annonce" class="btn btn-primary btn-lg">Modifier votre annonce!</button>
        </div>
    </form>
</section>

</body>


<?php require('assets/footer.php'); ?>