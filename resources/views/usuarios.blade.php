@extends('layouts.app')


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
                <td><button type="button" class="btn btn-small btn-info" data-toggle="modal" data-target="#editModal">Editar</button></td>
                <td><a class="btn btn-small btn-danger" href="#" >Apagar</a></td>
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

<!-- Modal -->
<div id="editModal" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title" align="center">Editar Usuário</h4>
      </div>
      <div class="modal-body">
      <form>
          <div class="form-group">
            <label for="cargo">Cargo:</label>
            <select class="form-controll">
              <option value="1">Líder da Célula</option>
              <option value="2">Supervisor de Setor</option>
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
            <div class="checkbox">
            <label><input type="checkbox"  id="pLider" value="1" />Líder</label>
            <label><input type="checkbox"  id="pSupervisor" value="2" />Supervisor</label>
            <label><input type="checkbox"  id="pCoordenador" value="3"/>Coordenador</label>
            <label><input type="checkbox"  id="pPastor" value="4"/>Pastor</label>
            
          </div>          
          <button type="submit" class="btn btn-success btn-block">Salvar</button>
        </form> 
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Fechar</button>
      </div>
    </div>

  </div>



@stop

