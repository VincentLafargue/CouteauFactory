$(function() {
    $('#selectMarques').change(function(){
        $('.hidden').hide();
        $('#' + $(this).val()).show();
    });
});

$(function() {
    $('#row_dim').hide(); 
    $('#marque').change(function(){
        if($('#marque').val() == 'new') {
            $('#row_dim').show(); 
        } else {
            $('#row_dim').hide(); 
        } 
    });
});