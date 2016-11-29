<?php 
    
    require __DIR__. '/includes/header.php'; 
    
    include_once('/classes/session.php');
    
    !isset($_SESSION['user_session']) ? header("location:index.php") : null;
    
?>

<div class="row">
    
    <div class="col s12 offset-s1 m12 l12">
        <?php $user = explode("@", $_SESSION['user_session']) ?>
        Welcome, <b><?= isset($user[0]) ? $user[0] : '' ?></b>
        
        <div class="divider"></div>
        
        <div class="row" ng-app="mexicaApp" ng-controller="ToursController">
            <div class="col s12">
                <h4>Products</h4>

                <div id="modal-product-form" class="modal">
                    <div class="modal-content">
                        <h4 id="modal-product-title">Crear un nuevo Tour</h4>
                        <div class="row">

                            <div class="input-field col s12">
                                <input ng-model="name" type="text" class="validate" id="form-name" placeholder="Nombre" />
                                <label for="name">Nombre</label>
                            </div>

                            <div class="input-field col s12">
                                <textarea ng-model="description" type="text" class="validate materialize-textarea" placeholder="Descripción"></textarea>
                                <label for="description">Descripción</label>
                            </div>

                            <div class="input-field col s12">
                                <input ng-model="price" type="text" class="validate" id="form-price" placeholder="Precio" />
                                <label for="price">Precio</label>
                            </div>

                            <div class="input-field col s12">
                                <a id="btn-create-product" class="waves-effect waves-light btn margin-bottom-1em" ng-click="createProduct()"><i class="material-icons left">add</i>Create</a>

                                <a id="btn-update-product" class="waves-effect waves-light btn margin-bottom-1em" ng-click="updateProduct()"><i class="material-icons left">edit</i>Save Changes</a>

                                <a class="modal-action modal-close waves-effect waves-light btn margin-bottom-1em"><i class="material-icons left">close</i>Close</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <a href="logout.php" class="waves-effect waves-light btn">Log out</a>
        <div class="fixed-action-btn" style="bottom:45px; right:24px;">
            <a class="waves-effect waves-light btn modal-trigger btn-floating btn-large red" data-target="modal-product-form" ng-click="showCreateForm()"><i class="large material-icons">add</i></a
        </div>
    </div>
</div>

<?php require __DIR__. '../includes/footer.php'; ?>