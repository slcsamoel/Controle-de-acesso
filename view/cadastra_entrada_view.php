<?php
require_once "../cabecalho_aux.php";?>
<title>buscar_produto</title>

<!-- Bootstrap -->
<link href="../bootstrap/css/bootstrap.min.css" rel="stylesheet">
<link href="../css/estilo.css" rel="stylesheet">


<div class="container">
  <div class="pager-header">
    <h1>Buscar Produtos</h1>
  </div>
  <div class="row">
    <div class="col-sm-12">

      <form class="form-horizontal" action="../controller/cadastra_entrada_produto.php" method="post">

        <div class="panel panel-primary">


          <div class="panel-body">
            <div class="form-group">

              <div class="form-group">
                <label class="col-md-2 control-label" for="nf_fical">Nota Fiscal<h11></h11></label>
                <div class="col-md-1">
                  <input id="nf_fical" name="nf_fical" placeholder="Apenas números" class="form-control input-md"  type="text" maxlength="11" pattern="[0-9]+$">
                </div>

                <label class="col-md-2 control-label" for="id_tp_entrada_produto">Tipo de Entrada<h11>*</h11></label>
             <div class="col-md-3">
               <select required id="id_tp_entrada_produto" name="id_tp_entrada_produto" class="form-control">
                 <option value=""></option>
                 <option value="1" >REPASSADO PELA EMPRESA</option>
            <option value="2">ADQUIRIDO PELO SINDICO</option>
               </select>
             </div>
             <div class="col-md-2">
              <button type="submit" class="btn btn-primary" value="Voltar" onClick="JavaScript: window.history.back();">Voltar
              </button>
               </div> 

             <div class="col-md-2">
            <button type="sumit" class="btn btn-primary">Cadastra
            </button>
            </div>
            </div>
            </div>
            <div class="col-md-8">

             

            </div>
          </div>

        </div>

      </form>
    </div>

  </div>


</div>
</div>

<?php require_once "../rodape.php";?>