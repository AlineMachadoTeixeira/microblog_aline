<?php 
require_once "../inc/cabecalho-admin.php";
use Microblog\Usuario;
use Microblog\Utilitarios;

$usuario = new Usuario;

$usuario->setId($_GET['id']);
$dados = $usuario->listarUm();

/* Script para atualização */
if(isset($_POST['atualizar'])){	
	$usuario->setNome($_POST['nome']);

	$usuario->setEmail($_POST['email']);

	$usuario->setTipo($_POST['tipo']);
	
	//$usuario->setSenha($usuario->codificaSenha($_POST["senha"]));
	/* Algoritmo geral para tratamento da senha */

	/* Se o campo senha no formulário estiver vazio sgnifica que o usuario NÃO MUDOU A SENHA */
	if(empty($_POST['senha'])){
		/* Portanto, simplesmente repassamos a senha já existente no banco ($dados['senha']) para o objeto através do setSenha, sem qualquer alteração. */
		$usuario->setSenha($dados['senha']);
	}else{
		/* Caso contrário, se o usuario digitou alguma coisa no campo, precisamos verificar o que foi digitado.  */
		$usuario->setSenha(
			$usuario->verificarSenha($_POST['senha'], $dados['senha'])
		);
	}

	$usuario->atualizar();
	header("location:usuarios.php");

	
}
?>


<div class="row">
	<article class="col-12 bg-white rounded shadow my-1 py-4">
		
		<h2 class="text-center">
		Atualizar dados do usuário
		</h2>
				
		<form class="mx-auto w-75" action="" method="post" id="form-atualizar" name="form-atualizar">

			<div class="mb-3">
				<label class="form-label" for="nome">Nome:</label>
				<input class="form-control" type="text" id="nome" name="nome"  value="<?=$dados['nome']?>" required>
			</div>

			<div class="mb-3">
				<label class="form-label" for="email">E-mail:</label>
				<input class="form-control" type="email" id="email" name="email" value="<?=$dados['email']?>"required>
			</div>

			<div class="mb-3">
				<label class="form-label" for="senha">Senha:</label>
				<input class="form-control" type="password" id="senha" name="senha" value=""placeholder="Preencha apenas se for alterar">
			</div>

			<div class="mb-3">				
				<label class="form-label" for="tipo">Tipo:</label>
				<select class="form-select" name="tipo" id="tipo" required>
					<option value=""></option >
					<option <?php if($dados["tipo"] === "editor" ) echo " selected ";?>  value="editor">Editor</option>
					<option <?php if($dados["tipo"] === "admin" ) echo " selected ";?>  value="admin">Administrador</option>
				</select>
			</div>
			
			<button class="btn btn-primary" name="atualizar"><i class="bi bi-arrow-clockwise"></i> Atualizar</button>
		</form>
		
	</article>
</div>


<?php 
require_once "../inc/rodape-admin.php";
?>

