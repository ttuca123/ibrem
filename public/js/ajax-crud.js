

    $(document).on('click', '.edit-modal', function() {      
        
        
        /*$("input:checkbox[name=permissao]:checked").each(function(){
            arr.push($(this).val());            
            $('#permissao').val($(this).checked('true'));
        }); */
        
       /* arr.forEach(function(item) {
            console.log(item ? 'true' : 'false');
                });*/       
        
        
        var id = $(this).data("id");
        var nome = $(this).data("nome");
        var email = $(this).data("email");
        var permissoes = JSON.parse("[" + $(this).data("permissao") + "]");

        permissoes.forEach(function(permissao) {
            
            switch(permissao)
            {
                case 1:
                    $('#pLider').prop('checked', 'true');  

                break;

                case 2:
                 
                    $('#pSupervisor').prop('checked', 'true');

                break;

                case 3:
                    
                    $('#pCoordenador').prop('checked', 'true');       

                break;

                case 4:
                    
                    $('#pPastor').prop('checked', 'true');     

                break;
                default:
                break;
            }         
        
            
        });

        $('#selectCargo').val($(this).data('cargo'));       

        $('#footer_action_button').text("Salvar");
        $('#footer_action_button').addClass('glyphicon-check');
        $('#footer_action_button').removeClass('glyphicon-trash');
        $('.actionBtn').addClass('btn-success');
        $('.actionBtn').removeClass('btn-danger');
        $('.actionBtn').addClass('edit');
        $('.modal-title').text('Editar');
        $('.deleteContent').hide();
        $('.form-vertical').show();
        $('#fid').val(id);
        $('#nome').val(nome);        
        $('#email').val(email);        
        $('#myModal').modal('show');
    });
    $('.modal-footer').on('click', '.edit', function() {
        $.ajax({
            type: 'post',
            url: '/edit-usuario',
            data: {
                '_token': $('input[name=_token]').val(),
                'id': $("#fid").val(),
                'nome': $('#nome').val(),
                'email': $('#email').val()
            },

            //Função para reorganizar a tabela em caso de sucesso na edição
            success: function(data) {
                $('.item' + data.id).replaceWith("<tr class='item" + data.id + "'><td>" + data.id
                 + "</td><td>" + data.nome + "</td><td>" + data.email
                 + "</td><td><button class='edit-modal btn btn-info' data-id='" + data.id + 
                "' data-nome='" + data.nome + "' data-email='" + data.email + 
                "'><span class='glyphicon glyphicon-edit'></span> Edit</button> "+
                "<button class='delete-modal btn btn-danger' data-id='" + data.id 
                + "' data-nome='" + data.nome + 
                "><span class='glyphicon glyphicon-trash'></span> Delete</button></td></tr>");
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
    
$('.modal-footer').on('click', '.delete', function() {
    $.ajax({
      type: 'post',
      url: '/remove-usuario',
      data: {
        '_token': $('input[name=_token]').val(),
        'id': $('.id').text()
      },
      success: function(data) {
        $('.item' + $('.id').text()).remove();
      }
    });
  });