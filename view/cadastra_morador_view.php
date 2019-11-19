 <?php require_once "../cabecalho_aux.php"; ?>
 <title>cadastrar_morador</title>
 <!--
 <script>
$(document).ready(function(){
   $("#placa").inputmask({mask: 'AAA-9999'});
});
 </script>

  Bootstrap -->
 <link href="../bootstrap/css/bootstrap.min.css" rel="stylesheet">
 <link href="../css/estilo.css" rel="stylesheet">
 <div class="container">
   <div class="pager-header">
     <h1>Cadastro de Morador</h1>
   </div>
   <div class="row">
     <div class="col-sm-12">

       <form class="form-horizontal" enctype="multipart/form-data" action="../controller/cadastra_morador.php" method="post">

         <div class="panel panel-primary">

           <div class="panel-body">
             <div class="form-group">
               <div class="col-md-11 control-label">
                 <p class="help-block">
                   <h11>*</h11> Campo Obrigatório
                 </p>
               </div>
             </div>

             <!-- Text input-->
             <div class="form-group">
               <label class="col-md-2 control-label" for="nome">Nome <h11>*</h11></label>
               <div class="col-md-8">
                 <input id="nome" name="nome" placeholder="" class="form-control input-md" required="" type="text">
               </div>
             </div>

             <div class="form-group">
               <label class="col-md-2 control-label" for="nome_mae">Nome da Mãe</label>
               <div class="col-md-4">
                 <input id="nome_mae" name="nome_mae" placeholder="" class="form-control input-md" required="" type="text">
               </div>
               <label class="col-md-2 control-label" for="nome_pai">Nome da Pai</label>
               <div class="col-md-4">
                 <input id="nome_pai" name="nome_pai" placeholder="" class="form-control input-md" required="" type="text">
               </div>
             </div>


             <!-- Text input-->
             <div class="form-group">
               <label class="col-md-2 control-label" for="cpf">CPF <h11>*</h11></label>
               <div class="col-md-2">
                 <input id="cpf" name="cpf" placeholder="Apenas números" class="form-control input-md" required="" type="text" maxlength="11" pattern="[0-9]+$">
               </div>

               <label class="col-md-1 control-label" for="dt_nascimento">Nascimento<h11>*</h11></label>
               <div class="col-md-2">
                 <input id="dt_nascimento" name="dt_nascimento" placeholder="DD/MM/AAAA" class="form-control input-md" required="" type="date" onBlur="showhide()">
               </div>

               <!-- Multiple Radios (inline) -->

               <label class="col-md-1 control-label" for="radios">Sexo <h11>*</h11></label>
               <div class="col-md-4">
                 <label required="" class="radio-inline" for="radios-0">
                   <input name="sexo" id="sexo" value="feminino" type="radio" required>
                   Feminino
                 </label>
                 <label class="radio-inline" for="radios-1">
                   <input name="sexo" id="sexo" value="masculino" type="radio">
                   Masculino
                 </label>
               </div>
             </div>

             <!-- Prepended text-->
             <div class="form-group">
               <label class="col-md-2 control-label" for="rg">RG <h11>*</h11></label>
               <div class="col-md-2">
                 <input id="rg" name="rg" placeholder="Apenas números" class="form-control input-md" required="" type="text" maxlength="11" pattern="[0-9]+$">
               </div>

               <label class="col-md-1 control-label" for="telefone">Telefone</label>
               <div class="col-md-2">
                 <div class="input-group">
                   <span class="input-group-addon"><i class="glyphicon glyphicon-earphone"></i></span>
                   <input id="telefone" name="telefone" class="form-control" type="text" maxlength="13" pattern="\[0-9]{2}\ [0-9]{4,6}-[0-9]{3,4}$" OnKeyPress="formatar('## #####-####', this)">
                 </div>
               </div>
             </div>
           </div>

           <div class="form-group">
             <label class="col-md-2 control-label" for="id_tipo_morador">Tipo de Morador<h11>*</h11></label>
             <div class="col-md-2">
               <select required id="id_tipo_morador" name="id_tipo_morador" class="form-control">
                 <option value=""></option>
                 <option value="1" >PROPIETARIO</option>
            <option value="2">LOCATARIO</option>
               </select>
             </div>

             <label class="col-md-2 control-label" for="prependedtext">Apartamento</label>
             <div class="col-md-2">
               <div class="input-group">
                 <span class="input-group-addon">Bloco <h11>*</h11></span>
                 <select required id="id_bloco" name="id_bloco" class="form-control">
                   <option value=""></option>
                   <option value="1">Bloco-A</option>
                   <option value="2">Bloco-B</option>
                   <option value="3">Bloco-C</option>
                   <option value="4">Bloco-D</option>
                   <option value="5">Bloco-E</option>
                   <option value="6">Bloco-F</option>
                 </select>
               </div>
             </div>

             <div class="col-md-2">
               <div class="input-group">
                 <span class="input-group-addon">Numero<h11>*</h11></span>
                 <input id="nr_apartamento" name="nr_apartamento" class="form-control" placeholder="" required="" type="number">
               </div>

             </div>

           </div>

           <!-- Prepended text-->
           <div class="form-group">
           </div>

           <!-- Select Basic -->
           <div class="form-group">
             <label class="col-md-2 control-label" for="placa">Veiculo</label>
             <div class="col-md-2">
               <input id="descricao_veiculo" name="descricao_veiculo" class="form-control input-md">
             </div>

             <label class="col-md-2 control-label" for="placa">Placa</label>
             <div class="col-md-2">
               <input id="placa" name="placa" placeholder="AAA-0000" class="form-control input-md">
             </div>

           </div>

           <br>

           <div class="form-group">
             <label class="col-md-2 control-label">Inserir Foto</label>
             <div class="col-md-4">
               <input name="imagem" type="file" class=" form-control-file " />
             </div>

             <div class="col-md-2">
               <button type="submit" class="btn btn-primary" value="Voltar" onClick="JavaScript: window.history.back();">Voltar
               </button>
             </div>
             <div class="col-md-2">
               <button type="submit" class="btn btn-primary" value="salvar">Salvar</button>
             </div>
           </div>
       </form>
     </div>

   </div>


   <?php require_once "../rodape.php"; ?>