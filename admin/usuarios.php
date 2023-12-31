<?php 
require_once "../inc/cabecalho-admin.php";
use Microblog\Usuario;

/* Verificando se quem está acessando esta pagina pode acessar (se o if do método abaixo for TRUE, ENTÃO Significa que o usuario NÃO É um admin e portanto está página não será autorizada para uso) */
$sessao->verificarAcessoAdmin();

//require_once "../vendor/autoload.php"; Não colocamos, pois já esta no cabeçalho 
$usuario = new Usuario;
$listaDeUsuarios = $usuario->listar(); 


?>


<div class="row">
	<article class="col-12 bg-white rounded shadow my-1 py-4">
		
		<h2 class="text-center">
		Usuários <span class="badge bg-dark"><?=count($listaDeUsuarios)?></span> <!-- Conta o usuario -->
		</h2>

		<p class="text-center mt-5">
			<a class="btn btn-primary" href="usuario-insere.php">
			<i class="bi bi-plus-circle"></i>	
			Inserir novo usuário</a>
		</p>
				
		<div class="table-responsive">
		
			<table class="table table-hover">
				<thead class="table-light">
					<tr>
						<th>Nome</th>
						<th>E-mail</th>
						<th>Tipo</th>
						<th class="text-center">Operações</th>
					</tr>
				</thead>

				<tbody>
					<?php foreach($listaDeUsuarios as $itemUsuario){?>

					<tr>
						<td> <?=$itemUsuario["nome"]?> </td>
						<td> <?=$itemUsuario["email"]?></td>
						<td> <?=$itemUsuario["tipo"]?> </td>
						<td class="text-center">
							<a class="btn btn-warning" 
							href="usuario-atualiza.php?id=<?=$itemUsuario["id"]?>">
							<i class="bi bi-pencil"></i> Atualizar
							</a>
						
							<a class="btn btn-danger excluir" 
							href="usuario-exclui.php?id=<?=$itemUsuario["id"]?>">
							<i class="bi bi-trash  "></i> Excluir
							</a>
						</td>
					</tr>

				<?php } ?> 
				
				</tbody>                
			</table>
	</div>
		
	</article>
</div>


<?php 
require_once "../inc/rodape-admin.php";
?>

