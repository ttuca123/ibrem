

    $(document).on('click', '.edit-modal', function() {
        
        var arr = [];
        
        /*$("input:checkbox[name=mySelect]:checked").each(function(){
            arr.push($(this).val());
        });
        
        arr.forEach(function(item) {
            console.log(item ? 'true' : 'false');
        });*/
        
        //$("input:checkbox[name=mySelect]:checked").val("2");
        $('#mySelect').val($(this).data('selectCargo'));

        $('#footer_action_button').text(" Update");
        $('#footer_action_button').addClass('glyphicon-check');
        $('#footer_action_button').removeClass('glyphicon-trash');
        $('.actionBtn').addClass('btn-success');
        $('.actionBtn').removeClass('btn-danger');
        $('.actionBtn').addClass('edit');
        $('.modal-title').text('Editar');
        $('.deleteContent').hide();
        $('.form-vertical').show();
        $('#fid').val($(this).data('id'));
        $('#nome').val($(this).data('nome'));        
        $('#email').val($(this).data('email'));        
        $('#myModal').modal('show');
    });
    $('.modal-footer').on('click', '.edit', function() {
        $.ajax({
            type: 'post',
            url: '/editItem',
            data: {
                '_token': $('input[name=_token]').val(),
                'id': $("#fid").val(),
                'title': $('#t').val(),
                'description': $('#d').val()
            },
            success: function(data) {
                $('.item' + data.id).replaceWith("<tr class='item" + data.id + "'><td>" + data.id + "</td><td>" + data.title + "</td><td>" + data.description + "</td><td><button class='edit-modal btn btn-info' data-id='" + data.id + "' data-title='" + data.title + "' data-description='" + data.description + "'><span class='glyphicon glyphicon-edit'></span> Edit</button> <button class='delete-modal btn btn-danger' data-id='" + data.id + "' data-title='" + data.title + "' data-description='" + data.description + "'><span class='glyphicon glyphicon-trash'></span> Delete</button></td></tr>");
            }
        });
      });


    
//delete function
$(document).on('click', '.delete-modal', function() {
    $('#footer_action_button').text("Remover");
    $('#footer_action_button').removeClass('glyphicon-check');
    $('#footer_action_button').addClass('glyphicon-trash');
    $('.actionBtn').removeClass('btn-success');
    $('.actionBtn').addClass('btn-danger');
    $('.actionBtn').addClass('delete');
    $('.modal-title').text('Remover');
    $('.id').text($(this).data('id'));
    $('.deleteContent').show();
    $('.form-vertical').hide();
    $('.title').html($(this).data('title'));
    $('#myModal').modal('show');
  });