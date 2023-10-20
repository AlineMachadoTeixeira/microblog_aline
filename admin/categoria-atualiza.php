<?php 
require_once "../inc/cabecalho-admin.php";
use Microblog\Categoria;

/* Verificando se quem está acessando esta pagina pode acessar (se o if do método abaixo for TRUE, ENTÃO Significa que o usuario NÃO É um admin e portanto está página não será autorizada para uso) */
$sessao->verificarAcessoAdmin();

$categoria = new Categoria;

// ListaUm/LerUm Categoria
$categoria->setId($_GET['id']);
$dados = $categoria->listarUmaCategoria();

if(isset($_POST['atualizar'])){
	$categoria->setNome($_POST['nome']);

	$categoria->atualizarCategorias(); 
    header("location:categorias.php");

}


?>


<div class="row">
	<article class="col-12 bg-white rounded shadow my-1 py-4">
		
		<h2 class="text-center">
		Atualizar dados da categoria
		</h2>
				
		<form class="mx-auto w-75" action="" method="post" id="form-atualizar" name="form-atualizar">

			<div class="mb-3">
				<label class="form-label" for="nome">Nome:</label>
				<input class="form-control" type="text" id="nome" name="nome" value="<?=$dados['nome']?>" required>
			</div>
			
			<button class="btn btn-primary" name="atualizar"><i class="bi bi-arrow-clockwise"></i> Atualizar</button>
		</form>
		
	</article>
</div>


<?php 
require_once "../inc/rodape-admin.php";
?>

