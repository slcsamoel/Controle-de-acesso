<?php 
require_once "../cabecalho_aux.php";?>
 
    <title>visitante</title>
  <!-- Bootstrap -->
  <link href="../bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="../css/estilo.css" rel="stylesheet">
  
<div class="container">
  <div class="pager-header">
    <h1>Visitantes</h1>
  </div>
  <div class="row">
    <div class="col-sm-12">

      <form class="form-horizontal">

        <div class="panel panel-primary">


          <div class="panel-body">
            <div class="form-group">
              
            </div>

            <!-- Text input-->
            <div class="form-group">
              <label class="col-md-2 control-label" for="Nome">Nome <h11>*</h11></label>  
              <div class="col-md-8">
                <input id="Nome" name="Nome" placeholder="" class="form-control input-md" required="" type="text">
              </div>
            </div>

            <!-- Text input-->
            <div class="form-group">
              <label class="col-md-2 control-label" for="Nome">CPF <h11>*</h11></label>  
              <div class="col-md-2">
                <input id="cpf" name="cpf" placeholder="Apenas números" class="form-control input-md" required="" type="text" maxlength="11" pattern="[0-9]+$">
              </div>

              <label class="col-md-1 control-label" for="Nome">Nascimento<h11>*</h11></label>  
              <div class="col-md-2">
                <input id="dtnasc" name="dtnasc" placeholder="DD/MM/AAAA" class="form-control input-md" required="" type="text" maxlength="10" OnKeyPress="formatar('##/##/####', this)" onBlur="showhide()">
              </div>

              <!-- Multiple Radios (inline) -->

              <label class="col-md-1 control-label" for="radios">Sexo <h11>*</h11></label>
              <div class="col-md-4"> 
                <label required="" class="radio-inline" for="radios-0" >
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
              <label class="col-md-2 control-label" for="Nome">RG <h11>*</h11></label>  
              <div class="col-md-2">
                <input id="cpf" name="cpf" placeholder="Apenas números" class="form-control input-md" required="" type="text" maxlength="11" pattern="[0-9]+$">
              </div>

              <label class="col-md-1 control-label" for="prependedtext">Telefone</label>
              <div class="col-md-2">
                <div class="input-group">
                  <span class="input-group-addon"><i class="glyphicon glyphicon-earphone"></i></span>
                  <input id="prependedtext" name="prependedtext" class="form-control" placeholder="XX XXXXX-XXXX" type="text" maxlength="13"  pattern="\[0-9]{2}\ [0-9]{4,6}-[0-9]{3,4}$"
                  OnKeyPress="formatar('## #####-####', this)">
                </div>
              </div>
            </div> 

            <!-- Prepended text-->
          </div>
          <div class="form-group">   
            <label class="col-md-2 control-label" for="Nome">Data<h11></h11></label>  
            <div class="col-md-2">
              <input id="dtnasc" name="dtnasc" placeholder="DD/MM/AAAA" class="form-control input-md" required="" type="text" maxlength="10" OnKeyPress="formatar('##/##/####', this)" onBlur="showhide()">
            </div>


            <!-- Search input-->

            <!-- Prepended text-->

            <label class="col-md-2 control-label" for="prependedtext">Morador</label>
            <div class="col-md-2">
              <div class="input-group">
                <span class="input-group-addon">Torre <h11>*</h11></span>
                <input id="numero" name="numero" class="form-control" placeholder="" required=""  type="text">
              </div>

            </div>

            <div class="col-md-2">
             <div class="input-group">
              <span class="input-group-addon">Numero<h11>*</h11></span>
              <input id="numero" name="numero" class="form-control" placeholder="" required=""  type="text">
            </div>

          </div>
        </div>

        <!-- Select Basic -->
        <div class="form-group">
          <label class="col-md-2 control-label" for="Estado Civil">Tipo de visitante <h11>*</h11></label>
          <div class="col-md-2">
            <select required id="Estado Civil" name="Estado Civil" class="form-control">
              <option value=""></option>
              <option value="Solteiro(a)">Solteiro(a)</option>
              <option value="Casado(a)">Casado(a)</option>
              <option value="Divorciado(a)">Divorciado(a)</option>
              <option value="Viuvo(a)">Viuvo(a)</option>
            </select>
          </div>
          <label class="col-md-1 control-label" for="Nome">Entrada<h11>*</h11></label>  
          <div class="col-md-2">
            <input id="dtnasc" name="dtnasc" placeholder="DD/MM/AAAA 00:00" class="form-control input-md" required="" type="text" maxlength="10" OnKeyPress="formatar('##/##/####', this)" onBlur="showhide()">
          </div>
          <label class="col-md-1 control-label" for="Nome">Saida<h11>*</h11></label>  
          <div class="col-md-2">
            <input id="dtnasc" name="dtnasc" placeholder="DD/MM/AAAA 00:00" class="form-control input-md" required="" type="text" maxlength="10" OnKeyPress="formatar('##/##/####', this)" onBlur="showhide()">
          </div>

          <!-- Prepended checkbox -->
        </div>


        <!-- Select Basic -->
         <div class="form-group">

          <div class="col-md-8">

          </div>
          <div class="col-md-1">
            <button type="button" class="btn btn-primary" onclick="">Altera</button>
          </div>

          <div class="col-md-1">
            <button type="button" class="btn btn-primary" onclick="">Inativa</button>
          </div>

          <div class="col-md-1">
            <button type="button" class="btn btn-primary" onclick="">Entrada</button>
          </div>

          <div class="col-md-1">
            <button type="button" class="btn btn-primary" onclick="">Saida</button>
          </div>
        </div>


      </div>

      <!-- Text input-->
    </div>

</div>

      <?php require_once "../rodape.php";?>
