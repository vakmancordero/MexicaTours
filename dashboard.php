<?php 
    
    require __DIR__. '/includes/header.php'; 
    
    include_once('/classes/session.php');
    
    !isset($_SESSION['user_session']) ? header("location:index.php") : null;
    
?>

<div class="row">
    
    <div class="col s12 offset-s1 m12 l12" ng-app="mexicaApp" ng-controller="ToursController">
        <?php $user = explode("@", $_SESSION['user_session']) ?>
        Welcome, <b><?= isset($user[0]) ? $user[0] : '' ?></b>
        
        <div class="divider"></div>
        
        <div class="row">
            <div class="col s12">
                <h4>Tours...</h4>
                
                <input type="text" ng-model="search" class="form-control" placeholder="Search product..." />
                
                <table class="hoverable bordered">

                    <thead>
                        <tr>
                            <th class="text-align-center">ID</th>
                            <th class="width-30-pct">Nombre</th>
                            <th class="width-30-pct">Hora de salida</th>
                            <th class="text-align-center">Hora de regreso</th>
                            <th class="text-align-center">Precio</th>
                        </tr>
                    </thead>

                    <tbody ng-init="getAll()">
                        <tr ng-repeat="tour in names | filter:search">
                            <td class="text-align-center">{{ tour.id }}</td>
                            <td>{{ tour.name }}</td>
                            <td>{{ tour.description }}</td>
                            <td class="text-align-center">{{ tour.price }}</td>
                            <td>
                                <a ng-click="readOne(tour.id)" class="waves-effect waves-light btn margin-bottom-1em"><i class="material-icons left">edit</i>Edit</a>
                                <a ng-click="deleteProduct(tour.id)" class="waves-effect waves-light btn margin-bottom-1em"><i class="material-icons left">delete</i>Delete</a>
                            </td>
                        </tr>
                    </tbody>
                </table>

                <div id="modal-product-form" class="modal">
                    <div class="modal-content">
                        <h4 id="modal-product-title"></h4>
                        <div class="row">

                            <div class="input-field col s12">
                                <input ng-model="name" type="text" class="validate" id="form-name" placeholder="Nombre" />
                                <label for="name">Nombre</label>
                            </div>

                            <div class="input-field col s12">
                                <textarea ng-model="about" type="text" class="validate materialize-textarea" placeholder="Información del tour"></textarea>
                                <label for="description">Acerca del tour</label>
                            </div>

                            <div class="input-field col s12">
                                <input ng-model="departureTime" type="text" class="validate" id="form-departureTime" placeholder="Salida" />
                                <label for="form-departureTime">Hora de salida</label>
                            </div>
                            
                            <div class="input-field col s12">
                                <input ng-model="arriveTime" type="text" class="validate" id="form-arriveTime" placeholder="Regreso" />
                                <label for="arriveTime">Hora de regreso</label>
                            </div>
                            
                            <div class="input-field col s12">
                                <input ng-model="price" type="text" class="validate" id="form-price" placeholder="Precio" />
                                <label for="form-price">Precio del tour</label>
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
            <a class="waves-effect waves-light btn modal-trigger btn-floating btn-large red" data-target="modal-product-form" ng-click="showCreateForm()"><i class="large material-icons">add</i></a>
        </div>
    </div>
</div>

<?php require __DIR__. '../includes/footer.php'; ?>