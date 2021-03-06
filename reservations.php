<?php
require('inc/connect.php');
require('assets/head.php');
include('assets/nav.php');

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Réservations Stuliday</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
</head>
<body>

<section class="container">

    <form action="reservations-post.php" method="post" enctype="multipart/form-data">
        <h1>Faire une réservation Stuliday</h1>
        <div class="form-row">
            <div class="form-group col-md-6">
                <label for="inputDate4">Date de début de résa</label>
                <input type="date" class="form-control" id="date" name="start_date" placeholder="mm/dd/yyyy" required>
            </div>
            <div class="form-group col-md-6">
                <label for="inputDate4">Date de fin de la résa</label>
                <input type="date" class="form-control" id="date" name="end_date" placeholder="MM/DD/YYYY" required>
            </div>
        </div>
       
        <div class="form-group">
            <label for="exampleFormControlSelect1">Ville</label>
            <select class="form-control" id="exampleFormControlSelect1" name="city" placeholder="Choisissez une ville" required>
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
            <label for="exampleFormControlSelect1">Type du logement</label>
            <select class="form-control" id="exampleFormControlSelect1" name="category" required>
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
        <div class="form-group">
            <label for="exampleFormControlSelect1">Prix de la location par nuitée</label>
            <select class="form-control" id="exampleFormControlSelect1" name="category" required>
                <option>50 euros</option>
                <option>75 euros</option>
                <option>100 euros</option>
                <option>150 euros</option>
                <option>200 euros</option>
                <option>250 euros</option>
                <option>300 euros</option>
                <option>350 euros</option>
                <option>400 euros</option>
            </select>
        </div>
        <div class="form-group col-md-12">
                <label for="exampleFormControlTextarea1">Votre message</label>
                <textarea class="form-control" id="exampleFormControlTextarea1" name="description" rows="3"></textarea>
            </div>
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
            <button type="submit" name="submit_reservation" class="btn btn-primary btn-lg">Valider ma réservation</button>
        </div>
    </form>
</section>

</body>


<?php require('assets/footer.php'); ?>