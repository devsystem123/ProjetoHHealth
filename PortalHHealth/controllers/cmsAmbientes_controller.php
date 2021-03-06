<?php
  /* Autor: Vinicius
     Data de modificação: 17/04/18
     Controller: Ambientes
     Obs: Controller para realizar CRUD da pagina Informacoes e verifica login
   */

class controllerCmsAmbientes{

    function Logar(){
      $Login = new Login();

      $Login->cpf = $_POST['cpf'];
      $Login->senha = $_POST['senha'];

      Login::Logar($Login);
    }

    // FUNÇÕES REFENTE AO CABEÇALHO
    public function NovoCabecalho(){
      // require da funcao modulo para envio das imagens
      require_once('modulo.php');

      // novo objeto
      $informacaoCabecalho = new AmbienteCabecalho();

      // pega o conteudo
      $informacaoCabecalho->tituloFoto = $_POST['txt1'];
      $informacaoCabecalho->tituloPagina = "";

      //inicia variaveis
      $diretorio_completo = null;
      $movUpload = false;
      $imagem_file = null;

      //pega a foto
      if (!empty($_FILES['imagem_cabecalho']['name'])){
        $imagem_file = true;
        $diretorio_completo = salvaImagem($_FILES['imagem_cabecalho'], 'arquivos');
        if ($diretorio_completo == 'Erro'){
          echo "<script>
                  alert('arquivo nao movido');
                  window.history.go(-1);
                </script>";
                $movUpload = false;
        } else {
          $movUpload = true;
        }
      } else {
        $imagem_file = false;
      }

      $informacaoCabecalho->foto = $diretorio_completo;
      $informacaoCabecalho::Insert($informacaoCabecalho);
    }

    public function ListarCabecalho(){
      $cabecalho = new AmbienteCabecalho();
      return $cabecalho::SelectCabecalho();
    }

    public function ExcluirCabecalho() {
      $idCabecalho = $_GET['id'];

      $excluirCabecalho = new AmbienteCabecalho();

      $excluirCabecalho->id = $idCabecalho;
      $excluirCabecalho::DeleteCabecalho($excluirCabecalho);
    }

    public function BuscarCabecalho(){
      $idCabecalho = $_GET['id'];

      $cabecalho= new AmbienteCabecalho();

      $cabecalho->id = $idCabecalho;

      $cabecalhoResultado = $cabecalho::SelectCabecalhoById($cabecalho);

      require_once('views/cms/ambientes/editarAmbientes_view.php');
    }

    public function EditarCabecalho(){
      // require da funcao modulo para envio das imagens
      require_once('modulo.php');
      $idConteudoCabecalho = $_GET['id'];

      $informacaoCabecalho = new AmbienteCabecalho();

      // pega o conteudo
      $informacaoCabecalho->idAmbienteCabecalho = $idConteudoCabecalho;
      // pega o conteudo

      $informacaoCabecalho->tituloFoto = $_POST['txt1'];

      //$informacaoCabecalho->tituloFoto = $_POST['txt1'];
      //$informacaoCabecalho->tituloPagina = $_POST['txtTitulo_conteudo'];

      //inicia variaveis
      $diretorio_completo = null;
      $movUpload = false;
      $imagem_file = null;
      $foto = "a";

      //Pega foto
      if (!empty($_FILES['imagem_cabecalho']['name'])){
       $imagem_file = true;
       $diretorio_completo = salvaImagem($_FILES['imagem_cabecalho'],'arquivos');

        if ($diretorio_completo == "Erro"){
           echo "<script>
               alert('arquivo nao movido');
               window.history.go(-1);
               </script>";
             $MovUpload=false;
        } else {
          $MovUpload=true;
        }
      } else {
       $imagem_file = false;
      }

      if ($imagem_file == true && $MovUpload == true) {
        $foto = $diretorio_completo;
      } else {
        $foto = "vazio";
      }

      $informacaoCabecalho->foto = $foto;
      AmbienteCabecalho::UpdateCabecalho($informacaoCabecalho);
    }

    public function AtivarCabecalho(){
      $idCabecalho = $_GET['id'];

      $ativarCabecalho = new AmbienteCabecalho();

      $ativarCabecalho->id = $idCabecalho;
      return $ativarCabecalho::ActivateCabecalho($ativarCabecalho);
    }

    public function DesativarCabecalho(){
      $idCabecalho = $_GET['id'];

      $desativarCabecalho = new AmbienteCabecalho();

      $desativarCabecalho->id = $idCabecalho;
      return $desativarCabecalho::DisableCabecalho($desativarCabecalho);
    }

    public function SelecionarCabecalhoAtivo(){
      $cabecalho = new AmbienteCabecalho();
      return $cabecalho::SelectCabecalhoAtivo();
    }

    //FUNÇÕES REFERENTE AO CONTEUDO AMBIENTES
    public function NovoConteudo(){
      require_once('modulo.php');
      $informacaoConteudo = new Ambientes();

      $informacaoConteudo->textoAssunto = $_POST['txtConteudo'];

      //inicia variaveis
      $diretorio_completo = null;
      $movUpload = false;
      $imagem_file = null;

      //pega a foto
      if (!empty($_FILES['imagem_conteudo']['name'])) {
        $imagem_file = true;
        $diretorio_completo = salvaImagem($_FILES['imagem_conteudo'], 'arquivos');

        if ($diretorio_completo == 'Erro') {
          echo "<script>
                  alert('arquivo nao movido');
                  window.history.go(-1);
                </script>";
          $movUpload = false;
        } else {
          $movUpload = true;
        }
      } else {
        $imagem_file = false;
      }

      $informacaoConteudo->fotoPrincipal = $diretorio_completo;
      $informacaoConteudo::InsertConteudo($informacaoConteudo);
    }

    public function ListarConteudo(){
      $conteudo = new Ambientes();
      return $conteudo::SelectConteudo();
    }

    public function ExcluirConteudo() {
      $idConteudo = $_GET['id'];

      $excluirConteudo = new Ambientes();

      $excluirConteudo->id = $idConteudo;
      $excluirConteudo::DeleteConteudo($excluirConteudo);
    }

    public function BuscarConteudo(){
      $idConteudo = $_GET['id'];

      $conteudo = new Ambientes();

      $conteudo->id = $idConteudo;

      $conteudoResultado = $conteudo::SelectConteudoById($conteudo);

      require_once('views/cms/ambientes/editarAmbientes_view.php');
    }

    public function EditarConteudo(){
      // require da funcao modulo para envio das imagens
      require_once('modulo.php');
      $idPaginaInfoUsuario = $_GET['id'];

      $informacaoConteudo = new Ambientes();

      // pega o conteudo
      $informacaoConteudo->id = $idPaginaInfoUsuario;
      $informacaoConteudo->textoAssunto = $_POST['txtConteudo'];

      //inicia variaveis
      $diretorio_completo = null;
      $movUpload = false;
      $imagem_file = null;
      $fotoPrincipal = "a";

      //Pega foto
      if (!empty($_FILES['imagem_conteudo']['name'])){
       $imagem_file = true;
       $diretorio_completo = salvaImagem($_FILES['imagem_conteudo'],'arquivos');

        if ($diretorio_completo == "Erro"){
           echo "<script>
               alert('arquivo nao movido');
               window.history.go(-1);
               </script>";
             $MovUpload = false;
        } else {
          $MovUpload = true;
        }
      } else {
       $imagem_file = false;
      }

      if ($imagem_file == true && $MovUpload == true) {
        $fotoPrincipal = $diretorio_completo;
      } else {
        $fotoPrincipal = "vazio";
      }

      $informacaoConteudo->fotoPrincipal = $fotoPrincipal;
      Ambientes::UpdateConteudo($informacaoConteudo);
    }

    public function AtivarConteudo(){
      $idConteudo = $_GET['id'];

      $ativarConteudo = new Ambientes();

      $ativarConteudo->id = $idConteudo;
      return $ativarConteudo::ActivateConteudo($ativarConteudo);
    }

    public function DesativarConteudo(){
      $idConteudo = $_GET['id'];

      $desativarConteudo = new Ambientes();

      $desativarConteudo->id = $idConteudo;
      return $desativarConteudo::DisableConteudo($desativarConteudo);
    }

    public function SelecionarConteudoAtivo(){
      $conteudo = new Ambientes();
      return $conteudo::SelectConteudoAtivo();
    }

}
?>
