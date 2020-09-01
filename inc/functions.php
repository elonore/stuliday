<?php

function random_images($h, $w)
{
    echo "https://loremflickr.com/$h/$w/houses,cottage";
}

function shorten_text($text, $max = 120, $append = '&hellip;')
{
    if (strlen($text) <= $max) return $text;
    $return = substr($text, 0, $max);
    if (strpos($text, ' ') === false) return $return . $append;
    return preg_replace('/\w+$/', '', $return) . $append;
}

function displayAllUsers()
{
    global $db;
    $sql = $db->query("SELECT * FROM users");
    $sql->setFetchMode(PDO::FETCH_ASSOC);

    while ($row = $sql->fetch()) {
?>
        <div class="col-4">
            <div class="card p-3" 4>
                <h2>User n° <?= $row['id']; ?></h2>
                <p><?= $row['email']; ?></p>
            </div>
        </div>
    <?php
    }
}

function displayAllAnnonces()
{
    global $db;
    $id = $_SESSION['id'];
    $sql = $db->query("SELECT * FROM annonces WHERE author_article !=$id");
    $sql->setFetchMode(PDO::FETCH_ASSOC);

    while ($row = $sql->fetch()) {
    ?>
            <div class="col-4">
                <div class="card p-3">
                    <h2>Annonce <?= $row['title']; ?></h2>
                    <img class="img-fluid" src="./assets/uploads/<?= $row['image_url']; ?>" />
                    <p class="text-center">Prix estimé: <?= $row['price']; ?></p>
                    <div class="col-md-12 text-center pt-5 my-2">
                        <a class="btn btn-info back" href="display_annonce.php?id=<?= $row['id'] ?>">Voir l'annonce</a>
                    </div>
                </div>
            </div>

    <?php
    }
}


function displayAnnonce($id)
{
    
    global $db;
    if(isset($_GET['id'])){
        $id = $_GET['id'];
        $sql = $db->query("SELECT * FROM annonces WHERE id = $id");
        $sql->setFetchMode(PDO::FETCH_ASSOC);
    
        while ($row = $sql->fetch()) {
        ?>
            <div class="col-12">
                <div class="card p-3">
                    <h2 class="text-center">Annonce <?= $row['title']; ?></h2>
                    <img class="img-fluid" src="./assets/uploads/<?= $row['image_url']; ?>" />
                    <p class="text-center">Description: <?= $row['description']; ?></p>
                    <p class="text-center">Ville: <?= $row['city']; ?></p>
                    <p class="text-center">Prix estimé: <?= $row['price']; ?></p>
                    <p class="text-center">Date de début: <?= $row['start_date']; ?></p>
                    <p class="text-center">Date de fin: <?= $row['end_date']; ?></p>
                    <div class="col-md-12 text-center pt-5 my-2">
                        <a class="btn btn-info back" href="reservations-post.php?id=<?= $row['id'] ?>">Réserver</a>
                    </div>
                    <div class="col-md-12 text-center pt-5 my-2">
                        <a class="btn btn-info back" href="annonces.php">Revenir aux annonces</a>
                    </div>
    
                </div>
            </div>
    
        <?php
    }
  
    }
}


//     function shorten_text($text, $max = 120, $append = '&hellip;')
//     { 
//         if(strlen($text) <= $max) {
//             return $text;
//         }
//         $return = substr($text, 0, $max);
//         if(strpos($text, '' ) ===false) {
//             return $return .$append;
//         }
//             return $return.$append;
//     }
//         return preg_replace('/\w+$/', '', $return) .$append;
// }



function displayAnnonces($id)
{
    if(isset($_SESSION['id'])){
        $id = $_SESSION['id'];
        global $db;
        $sql = $db->query("SELECT * FROM annonces WHERE author_article =$id");
        $sql->setFetchMode(PDO::FETCH_ASSOC);
    
        while ($row = $sql->fetch()) {
        ?>
            <div class="col-12">
                <div class="card p-3" 4>
                    <h2 class="text-center">Annonce <?= $row['title']; ?></h2>
                    <img class="img-fluid" src="./assets/uploads/<?= $row['image_url']; ?>" />
                    <p class="text-center">Catégorie: <?= $row['category']; ?></p>
                    <p class="text-center">Description: <?= $row['description']; ?></p>
                    <p class="text-center">Ville: <?= $row['city']; ?></p>
                    <p>Prix estimé: <?= $row['price']; ?></p>
                    <p class="text-center">Date de début: <?= $row['start_date']; ?></p>
                    <p class="text-center">Date de fin: <?= $row['end_date']; ?></p>
                    <div class="col-md-12 text-center pt-5 my-2">
                        <a class="btn btn-info back" href="display_annonce.php?id=<?= $row['id'] ?>">Voir l'annonce</a>
                        <a class="btn btn-info back" href="modify.php?id=<?= $row['id'] ?>">Modifier</a>
                        <a class="btn btn-info back" href="delete.php?id=<?= $row['id'] ?>">Supprimer</a>
                    </div>
                </div>
            </div>
    
        <?php
        }
    }
   
}


function delete($id)
{
    global $db;

    $sth = $db->prepare("DELETE FROM annonces  WHERE id = $id");
    $sth->execute();

    $message = "<div class ='alert alert-danger'>Votre annonce a bien été supprimée </div>";
}


function displayReservations($user_id)
{
    global $db;

    $sqlRes = $db->query("SELECT * FROM annonces AS a LEFT JOIN reservations AS r ON r.id_annonce = a.id WHERE id_user = $user_id");
    $sqlRes->setFetchMode(PDO::FETCH_ASSOC);

    while ($row = $sqlRes->fetch()) {
    ?>
        <div class="col-12">
            <div class="card p-3" 4>
                <h2 class="text-center">Réservation <?= $row['title']; ?></h2>
                <p class="text-center">Date de début: <?= $row['start_date']; ?></p>
                <p class="text-center">Date de fin: <?= $row['end_date']; ?></p>
                <p class="text-center">Ville: <?= $row['city']; ?></p>
                <p class="text-center">Catégorie: <?= $row['category']; ?></p>
                <p class="text-center">Prix estimé: <?= $row['price']; ?></p>
                <div class="col-md-12 text-center pt-5 my-2">
                    <a class="btn btn-info back" href="display_annonce.php?id=<?= $row['id']; ?>">Voir l'annonce</a>
                    <a class="btn btn-info back" href="reservations.php?id=<?= $row['id']; ?>">Réserver</a>
                    <a class="btn btn-info back" href="delete.php?id=<?= $row['id']; ?>">Supprimer</a>
                </div>
            </div>
        </div>

    <?php
        }
    }