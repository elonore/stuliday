<?php
$page = 'annonces';
require('inc/connect.php');
require('inc/functions.php');
require('assets/head.php');
include('assets/nav.php');
?>

<section>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h1 class="text-center">Liste des annonces :</h1>
            </div>
        </div>
        <div class="row">
            <?php
            displayAllAnnonces();
            ?>
        </div>
    </div>
</section>





<?php require('assets/footer.php'); ?>


<!-- Button trigger modal -->
<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModalCenter">
    Launch demo modal
</button>

<!-- Modal -->
<section>
    <div class="container">
        <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLongTitle">Modal title</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="row">
                            <?php
                            displayAllAnnonces();
                            ?>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="button" class="btn btn-primary">Save changes</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>