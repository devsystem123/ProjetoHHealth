<?php
  session_start();
  #require_once("cms/conexao.php");
  require_once("../../../variaveis.php");

  /*Chama a função para verificar se o usuario esta logado*/
  // logar($_SESSION['LogCod']);

 ?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Portal HHealth - Visualizar Convênios</title>
    <link rel="stylesheet" type="text/css" href="<?php echo $voltaTres; ?>css/Frajola.css">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<script src="<?php echo $voltaTres; ?>js/modernizr.min.js"></script>
  </head>
  <body>
    <?php include($voltaUm."header.php"); ?>

    <script src="<?php echo $voltaTres; ?>js/classie.js"></script>
		<script src="<?php echo $voltaTres; ?>js/photostack.js"></script>
		<script>
      [].slice.call( document.querySelectorAll( '.photostack' ) ).forEach( function( el ) { new Photostack( el ); } );

  		new Photostack( document.getElementById( 'photostack-1' ), {
  			callback : function( item ) {
  				console.log(item)
  			}
  		} );

      new Photostack( document.getElementById( 'photostack-2' ), {
				callback : function( item ) {
					console.log(item)
				}
			} );

			new Photostack( document.getElementById( 'photostack-3' ), {
				callback : function( item ) {
					console.log(item)
				}
			} );
		</script>

    <div  id="opcao" class="button shrink">
      <span style="font-size:30px;cursor:pointer" onclick="openNav()">&#9776;Menu
		</span>
    </div>

    <main>
      <?php include($voltaUm."menuLateral_view.php"); ?>

      <script>
        function openNav() {
          document.getElementById("mySidenav").style.width = "270px";
        }

        function closeNav() {
          document.getElementById("mySidenav").style.width = "0";
        }
      </script>

      <h1>Cabeçalhos</h1>
      <?php
        require_once($voltaTres.'router.php');
        require_once($voltaTres.'controllers/cmsConvenio_controller.php');
        require_once($voltaTres.'models/convenio_class.php');
        require_once($voltaTres.'models/convenio_cabecalho_class.php');


        $controller_informacoes = new controllerCmsConvenio();
        //chama metodo para listar os registros
        $list = $controller_informacoes::ListarCabecalho();

        $cont = 0;

        while ($cont < count($list)) {

       ?>
        <div id="segura">
         <div id="imagem_titulo">
           <h1></h1>
           <img src="<?php echo($voltaTres.$list[$cont]->fotoPrincipal); ?>" alt="Imagem">
         </div>
         <div id="texto_info">
           <h1><?php echo($list[$cont]->tituloPagina); ?></h1>
         </div>
         <div class="Crud_Opc">

             <div class="Deletar_crud">
               <a href="">DELETAR</a>

             </div>
             <div class="Editar_crud">
               <a href="">EDITAR</a>
             </div>

        </div>

               <div class="ativar_crud ">
                 <a href="">
                   <img src="<?php echo $voltaTres; ?>imagens/check.png" alt="Desativar" title="Desativar">
                 </a>
               </div>

               <div class="desativar_crud ">
                 <a href="">
                   <img src="<?php echo $voltaTres; ?>imagens/no.png" alt="Ativar" title="Ativar">
                 </a>
               </div>

         </div>
        <?php
            $cont += 1;
          }
        ?>

         <h1>Convênios</h1>

         <?php
           require_once($voltaTres.'router.php');
           require_once($voltaTres.'controllers/cmsConvenio_controller.php');
           require_once($voltaTres.'models/convenio_class.php');
           require_once($voltaTres.'models/convenio_cabecalho_class.php');


           $controller_informacoes = new controllerCmsConvenio();
           //chama metodo para listar os registros
           $list = $controller_informacoes::SelecionarConteudo();

           $cont = 0;

           while ($cont < count($list)) {

          ?>
         <div id="segura">
           <div class="segura_img_info">
             <div class="txtUniVisu">
                <div class="txtUnidade">Convênio:<?php echo($list[$cont]->nome); ?></div>
             </div>
           </div>
           <div class="Crud_Opc">

               <div class="Deletar_crud">
                 <a href="">DELETAR</a>

               </div>
               <div class="Editar_crud">
                 <a href="">EDITAR</a>
               </div>

           </div>
           <!-- ABRE O IF -->

             <div class="ativar_crud ">
               <a href="">
                 <img src="../../imagens/check.png" alt="Desativar" title="Desativar">
               </a>
             </div>

             <div class="desativar_crud ">
               <a href="">
                 <img src="../../imagens/no.png" alt="Ativar" title="Ativar">
               </a>
             </div>
         </div>
         <?php
            $cont += 1;
          }
         ?>

    </main>
  </body>
</html>
