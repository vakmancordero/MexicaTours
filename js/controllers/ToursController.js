
app.controller('ToursController', function($scope, $http) {
    
    $scope.showCreateForm = function() {
        
        $scope.clearForm();

        $('#modal-product-title').text("Crear nuevo tour");

        $('#btn-update-product').hide();

        $('#btn-create-product').show();
     
    };
    
    $scope.clearForm = function(){
        $scope.id = "";
        $scope.name = "";
        $scope.description = "";
        $scope.price = "";
    };
    
    $scope.createProduct = function(){
        
        $http.post('create_product.php', {
            
                'name' : $scope.name, 
                'description' : $scope.description, 
                'price' : $scope.price
                
        }).success(function (data, status, headers, config) {
            
            console.log(data);
            
            Materialize.toast(data, 4000);
            
            $('#modal-product-form').modal('close');
            
            $scope.clearForm();
            
            $scope.getAll();
        });
    };
    
});