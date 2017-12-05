@extends('layouts.app')

<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">

<title>Listagem de Usuários</title>
@section('content')

<div class="panel-group" >
<div class="panel panel-primary">
      <div class="panel-heading"><h2 align="center">Usuários do Sistema</h2></div>
      <div class="panel-body" style="overflow-x:auto;">
    
    <table class="table table-striped"  >
    <tr>
        <td>#</td>
        <td>Cargo</td>
        <td>Nome</td>
        <td>Telefone</td>
        <td>Email</td>
        <td>Permissões</td>
        <td>Editar</td>
        <td>Excluir</td>

    </tr>

    <?php

        $contador=1;
    ?>
          @foreach($usuarios as $usuario)
                  <tr>                
                      <td><?php echo $contador++; ?></td>
                      <td>Coordenador</td>
                      <td><?php echo $usuario->name; ?></td>
                      <td><?php echo $usuario->telefone; ?></td>
                      <td><?php echo $usuario->email; ?></td>
                      <td>Coordenador</td>
                      
                        <td><button type="submit" class="edit-modal btn btn-info btn-small " data-id="<?php echo $usuario->id ?>"                  
                          data-cargo="<?php echo '4' ?>" data-nome="<?php echo $usuario->name ?>"  
                          data-email="<?php echo $usuario->email ?>"  data-permissao="<?php echo '1, 2 , 3 , 4' ?>" 
                          ><span class="glyphicon glyphicon-edit"></span> Editar</button></td> 

                          <td><button type="submit" class="delete-modal btn btn-small btn-danger " data-id="<?php echo $usuario->id ?>"                  
                            data-title="<?php echo $usuario->name ?>"  
                          ><span class="glyphicon glyphicon-trash"></span> Apagar</button></td>                                     
                  </tr>        
          @endforeach
          </table>
        <div align="center"> {{ $usuarios->links() }} </div>
        <a class="btn btn-small btn-success" href="{{route('register')}}" >Novo</a>
        <div align="right"><strong><h4>Total Geral: {{$usuarios->total()}}</h4></strong></div>  
  
      </div>
    </div>
  </div>
</div>

    <!--Modal !-->

  <div id="myModal" class="modal fade" role="dialog">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
            <h4 class="modal-title" align="center">Editar Usuário</h4>
        </div>
        <div class="modal-body">
          <form class="form-vertical" role="form">
            <div class="form-group">
                <label for="cargo">Cargo:</label>
                <select id="selectCargo" name="selectCargo" class="form-controll">
                  <option value="1">Líder da Célula</option>
                  <option value="2" >Supervisor de Setor</option>
                  <option value="3">Coordenador de Área</option>
                  <option value="4">Pastor de Rede</option>
                </select>
              </div>

            <div class="form-group">
              <label for="nome">Nome:</label>
              <input type="nome" class="form-control" id="nome" required autofocus />
            </div>
            <div class="form-group">
              <label for="email">Email:</label>
              <input type="email" class="form-control" id="email">
            </div>
            <div class="form-group">
              <label for="pLider" >Permissões:</label>
              <div id="selectPermissao"   class="checkbox">                
                <label><input type="checkbox" id="pLider"  name="pLider" value="1" />Líder</label>
                <label><input type="checkbox" id="pSupervisor" name="pSupervisor"  value="2" />Supervisor</label>
                <label><input type="checkbox" id="pCoordenador" name="pCoordenador"  value="3"/>Coordenador</label>
                <label><input type="checkbox" id="pPastor" name="pPastor"  value="4"/>Pastor</label>              
              </div>                       
             </div>                                     
           </form>
            <div class="deleteContent">
             Você tem certeza que quer deletar <strong><span class="title"></span></strong>?
              <span class="hidden id"></span>
             </div>
          <div class="modal-footer">
            <button type="button" class="btn actionBtn" data-dismiss="modal">
              <span id="footer_action_button" class='glyphicon'> </span>
            </button>
            <button type="button" class="btn btn-warning" data-dismiss="modal">
              <span class='glyphicon glyphicon-remove'></span> Fechar
            </button>
          </div>
        </div>
      </div>
    </div>

    <meta name="_token" content="{!! csrf_token() !!}" />
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
    <script src="{{asset('js/ajax-crud.js')}}"></script>
  

@stop

