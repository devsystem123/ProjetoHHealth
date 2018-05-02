<?php
  require_once("../../../variaveis.php");

  $action2 = "";
  $action = "modo=novocabecalho";
 ?>

<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>CMS | Cadastrar Medico</title>
    <link rel="stylesheet" type="text/css" href="<?php echo($voltaTres); ?>css/Frajola.css">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<script src="<?php echo($voltaTres); ?>js/modernizr.min.js"></script>
  </head>
  <body>
    <?php include($voltaUm."header.php"); ?>


      <div class="container">
			<!-- Top Navigation -->

      <?php include("../menuLateral_view.php"); ?>

  		</div><!-- /container -->
  		<script src="js/classie.js"></script>
  		<script src="js/photostack.js"></script>
  		<script>

  		</script>
      <div  id="opcao" class="button shrink">
          <span style="font-size:30px;cursor:pointer" onclick="openNav()">&#9776;Menu
		  </span>
      </div>
    <main>

        <?php include("../menuLateral_view.php"); ?>



        <script>
            function openNav() {
                document.getElementById("mySidenav").style.width = "270px";
            }

            function closeNav() {
                document.getElementById("mySidenav").style.width = "0";
            }
        </script>


        <!-- FORM CABEÇALHO -->

         <form  action="<?php echo ($voltaTres); ?>router.php?controller=Medico&modo=novomedico" method="post" enctype="multipart/form-data">
            <div class="segura_form_tbc" >
               <div class="tit">
                 <p>Cadastro: Medico</p>
               </div>

               <div class="text">
                 <input id="Nome" required placeholder="Nome:" type="text" name="txtNome" value=""  maxlength="100">
               </div>
               <div class="text">
                 <input id="Telefone" required placeholder="Telefone:" type="text" name="numTelefone" value=""  maxlength="20">
               </div>
               <div class="text">
                 <input id="Celular" required placeholder="Celular:" type="text" name="numCelular" value=""  maxlength="20">
               </div>
               <div class="text">
                 <input id="Email" required placeholder="Email:" type="text" name="txtEmail" value=""  maxlength="150">
               </div>

                 <div class="text">
                   <input id="dtAdimicao" required placeholder="Data adimição:" type="text" name="dtAdimicao" value=""  maxlength="11">
                 </div>
                 <div class="text">
                   <input id="rg" required placeholder="Numero Rg:" type="text" name="numRg" value=""  maxlength="12">
                 </div>
                 <div class="text">
                   <input id="cpf"required placeholder="Numero Cpf:" type="text" name="numCpf" value=""  maxlength="12">
                 </div>
                 <div class="text">
                   <input id="crm" required placeholder="Numero CRM:" type="text" name="numCrm" value=""  maxlength="13">
                 </div>
                 <div class="text">
                   <input id="dtnasc"required placeholder="Data de nacimento:" type="text" name="numDtnasc" value=""  maxlength="11">
                 </div>
                 <div class="text">
                   <input type="file" required placeholder="fotoCRM" name="fotoCRM" value="" maxlength="255" class="">
                 </div>
                 <div class="text">
                   <input type="file" required placeholder="fotoMedico" name="fotoMedico" value="" maxlength="255" class="">
                 </div>

                  <div class="text">Endereço</div>


                 <div class="text">
                     <input type="text"required  placeholder="CEP" name="txtCep" value="" maxlength="255" class="inputMax">
                 </div>


                 <div class="text">
                     <input type="text" required placeholder="Rua" name="txtLogradouro" value="" maxlength="255" class="inputMax">
                 </div>

                 <div class="text">
                   <input id="numero" required placeholder="Numero" type="text" name="txtNum" value=""  maxlength="9">
                 </div>
                 <div class="text">
                   <input id="bairro" required placeholder="Bairro:" type="text" name="txtBairro" value=""  maxlength="12">
                 </div>

                 <div class="text">
                     <div class="text">
                         <select name="sltCidade" required >
                             <option value="*">Cidade</option>
                             <option value="1">Barueri</option>
                             <option value="2">Itapevi</option>
                         </select>
                     </div>
                     <div class="text" required>
                         <select name="sltEstado" >
                             <option value="*">Estado</option>
                             <option value="1">SP</option>
                             <option value="2">RJ</option>
                         </select>
                     </div>
                 </div>

                 


                 <div id="centralizarBtnHome">
                     <button type="submit" name="entrar" value="ENTRAR">SALVAR</button>
                 </div>
             </div>
         </form>







	  </main>
  </body>
</html>
