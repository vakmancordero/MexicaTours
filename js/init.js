
$(document).ready(function() {
    
    initialize();
    
});

function initialize() {
    
    $('.button-collapse').sideNav();
    
    $('.dropdown-button').dropdown({
        inDuration: 100,
        outDuration: 100,
        constrain_width: false, 
        hover: false, 
        gutter: 0, 
        belowOrigin: false 
    });
    
    $('.modal').modal();
    
    $('#modal-product-form').modal('close');
    
}