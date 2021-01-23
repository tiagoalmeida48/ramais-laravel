$(function() {
    M.updateTextFields();
    $('.sidenav').sidenav();
    $('.modal').modal();
    $('select').formSelect();

    $('#empresa_id_select').on('change', function(e) {
        $.ajax({
            url: '/ajax-setor/' + e.target.value,
            type: 'GET',
            dataType: 'json',
            success: function(data) {
                var html = '';
                html += `<option value="" disabled selected>Selecione um setor</option>`
                for (var i = 0; i < data.length; i++){
                    html += `<option value='${data[i].id}'>${data[i].nome}</option>`;
                };
                $('#setor_id_select').html(html).formSelect();
            }
        });
    });
});
