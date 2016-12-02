
/* global mexicaApp */

mexicaApp.controller('ToursController', function($scope, $http) {
    
    $scope.showCreateForm = function() {
        
        $("#modal-product-title").text("Crear un nuevo Tour!");
        
        $scope.clearForm();

        $('#modal-product-title').text("Crear nuevo tour");

        $('#btn-update-product').hide();

        $('#btn-create-product').show();
     
    };
    
    $scope.clearForm = function(){
        $scope.id = "";
        $scope.name = "";
        $scope.about = "";
        $scope.arriveTime = "";
        $scope.departureTime = "";
        $scope.price = "";
    };
    
    $scope.createProduct = function(){
        
        $http.post('crud/create_tour.php', {
            
            'name' : $scope.name, 
            'about' : $scope.about, 
            'departureTime' : $scope.departureTime,
            'arriveTime' : $scope.arriveTime,
            'price' : $scope.price
                
        }).success(function (data, status, headers, config) {
            
            console.log(data);
            
            Materialize.toast(data, 4000);
            
            $('#modal-product-form').modal('close');
            
            $scope.clearForm();
            
            $scope.getAll();
            
        });
    };
    
    $scope.getAll = function(){
        
        $http.get("crud/read_tour.php").success(function(response){
            
            $scope.tours = response.tours;
            
        });
        
    };
    
});