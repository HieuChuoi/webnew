$(document).ready(function(){
    $("#categories").change(function(){
        var idcategories = $(this).val();
        $.get("admin/ajax/types/"+idcategories, function(data){
            $("#types").html(data); 
        });
    });
});