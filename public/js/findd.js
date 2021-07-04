// Find Res
$(document).ready(function () {
    $("#selRest").on('change', function(e){
    
        e.preventDefault();

        var id = $(this).val();
        window.location = "/restaurant/"+id;

    });
});