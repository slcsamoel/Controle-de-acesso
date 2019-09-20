<?php require_once "../cabecalho_aux.php"; ?>

<title>formulario_morado</title>

<!-- Bootstrap -->
<link href="../bootstrap/css/bootstrap.min.css" rel="stylesheet">
<link href="../css/estilo.css" rel="stylesheet">

<div class="container">
  <div class="pager-header">
    <h1>Funcionário</h1>
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
              <label class="col-md-2 control-label" for="nome">Nome <h11>*</h11></label>
              <div class="col-md-8">
                <input id="nome" name="nome"  class="form-control input-md" required="" type="text">
              </div>
            </div>

            <!-- Text input-->
            <div class="form-group">
              <label class="col-md-2 control-label" for="cpf">CPF <h11>*</h11></label>
              <div class="col-md-2">
                <input id="cpf" name="cpf" class="form-control input-md" required="" type="text" maxlength="11" pattern="[0-9]+$">
              </div>

              <label class="col-md-1 control-label" for="dt_nascimento">Nascimento<h11>*</h11></label>
              <div class="col-md-2">
                <input id="dt_nascimento" name="dt_nascimento"  class="form-control input-md" required="" type="text" maxlength="10" OnKeyPress="formatar('##/##/####', this)" onBlur="showhide()">
              </div>
              <label class="col-md-1 control-label" for="radios">Sexo <h11>*</h11></label>
              <div class="col-md-4">
                <label required="" class="radio-inline" for="radios-0">
                  <input name="sexo" id="sexo" value="feminino" type="radio">
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
                <input id="rg" name="rg"  class="form-control input-md" required="" type="text" maxlength="11" pattern="[0-9]+$">
              </div>

              <label class="col-md-1 control-label" for="telefone">Telefone</label>
              <div class="col-md-2">
                <div class="input-group">
                  <span class="input-group-addon"><i class="glyphicon glyphicon-earphone"></i></span>
                  <input id="telefone" name="telefone" class="form-control" placeholder="XX XXXXX-XXXX" type="text" maxlength="13" pattern="\[0-9]{2}\ [0-9]{4,6}-[0-9]{3,4}$" OnKeyPress="formatar('## #####-####', this)">
                </div>
              </div>
            </div>
          </div>
          <div class="form-group">
            <label class="col-md-2 control-label" for="Nome">Data<h11></h11></label>
            <div class="col-md-2">
              <input id="dtnasc" name="dtnasc" placeholder="DD/MM/AAAA" class="form-control input-md" required="" type="text" maxlength="10" OnKeyPress="formatar('##/##/####', this)" onBlur="showhide()">
            </div>

          </div>

          <div class="form-group">
            <label class="col-md-2 control-label" for="Estado Civil">Turno<h11>*</h11></label>
            <div class="col-md-2">
              <select required id="Estado Civil" name="Estado Civil" class="form-control">
                <option value=""></option>
                <option value="Solteiro(a)">Diurno</option>
                <option value="Casado(a)">Noturno</option>
              </select>
            </div>

            <div class="col-md-2">

            </div>

            <div class="col-md-3">

            </div>
            <div class="col-sm-2">
              <img src="../imagens/img_morador.png" class="img-responsive img-thumbnail">
            </div>
          </div>
          <div class="form-group">
            <div class="col-md-1">
            </div>
            <div class="col-md-2">
              <button type="button" class="btn btn-primary">Altera senha de usuario</button>
            </div>
            <div class="col-md-5">
            </div>
            <div class="col-md-1">
              <button type="button" class="btn btn-primary">Altera</button>
            </div>

            <div class="col-md-1">
              <button type="button" class="btn btn-primary">Inativa</button>
            </div>

            <div class="col-md-1">
              <button type="button" class="btn btn-primary">Salvar</button>
            </div>
          </div>


        </div>

        <!-- Text input-->
    </div>

  </div>
  <?php require_once "../rodape.php"; ?>