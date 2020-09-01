<?php
$page = 'display_annonce';
require 'inc/connect.php';
require 'inc/functions.php';
require 'assets/head.php';
include('assets/nav.php');
?>

        <section>
                <div class="row">
                    <div class="col">
                        <h1 class="text-center">Mon annonce: </h1>
                    </div>
                </div>
                <div class="row col-12">
                    <?php
                        $id =$_GET["id"];
                        displayAnnonce($id);
                    ?>
                </div>
        </section>


<?php require('assets/footer.php'); ?>