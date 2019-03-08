$(document).ready(function() {
    $('#province').on('change', function(){
        var province_id = $(this).val();
        $.ajax({
            method: 'get',
            url: 'ajax/province/' + province_id,
        }).done(function (res) {
            $('#district').html(res);
        });
    });
    $('#property_category').on('change', function(){
        var property_category_id = $(this).val();
        $.ajax({
            method: 'get',
            url: 'ajax/province/' + property_category_id,
        }).done(function (res) {
            $('#property_type').html(res);
        });
    });
})
