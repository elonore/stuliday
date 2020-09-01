<?php 
    $page='annonces';
    require('inc/connect.php');
    require('inc/functions.php');
    require('assets/head.php');
    include('assets/nav.php');
?>

            <section>
                <div class="container">
                    <div class="row">
                        <div class="col md-4">    
                            <h1 class="text-center">Liste des annonces :</h1>
                        </div>
                    </div>
                        <div class="row">
                            <div class="col md-4">
                        <?php
                            displayAllAnnonces();
                        ?>
                        </div>
                    </div>
                </div>
            </section>


<?php require('assets/footer.php'); ?>