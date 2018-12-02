$(document).ready(function(){
    $('#dropdown-provinsi').change(function(){
        var id_prov = $(this).val();
        var url_destination = $('#dropdown-provinsi').data('url');
        $.ajax({
            type: 'post',
            url: url_destination,
            data: 'id_prov=' + id_prov,
            success: function(data){
                $.each($.parseJSON(data), function(key,value){
                    $('#dropdown-kab-kota').append("<option value=\""+value.id+"\">"+ value.name +"</option>");
                });
            }
        });
    });
    $('#dropdown-kab-kota').change(function(){
        var id_kab_kota = $(this).val();
        var url_destination = $('#dropdown-kab-kota').data('url');
        $.ajax({
            type: 'post',
            url: url_destination,
            data: 'id_kab_kota=' + id_kab_kota,
            success: function(data){
                $.each($.parseJSON(data), function(key,value){
                    $('#dropdown-kecamatan').append("<option value=\""+value.id+"\">"+ value.name +"</option>");
                });
            }
        });
    });
    $('#dropdown-kecamatan').change(function(){
        var id_kecamatan = $(this).val();
        var url_destination = $('#dropdown-kecamatan').data('url');
        $.ajax({
            type: 'post',
            url: url_destination,
            data: 'id_kecamatan=' + id_kecamatan,
            success: function(data){
                $.each($.parseJSON(data), function(key,value){
                    $('#dropdown-kelurahan').append("<option value=\""+value.id+"\">"+ value.name +"</option>");
                });
            }
        });
    });
});