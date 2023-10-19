<?php 
require_once "../inc/cabecalho-admin.php";
//require_once "../vendor/autoload.php"; Não colocamos, pois já esta no cabeçalho 
use Microblog\Categoria;
$categoria = new Categoria; 

$listarDeCategorias = $categoria->listarCategoria();



?>


<div class="row">
	<article class="col-12 bg-white rounded shadow my-1 py-4">
		
		<h2 class="text-center">
		Categorias <span class="badge bg-dark">X</span>
		</h2>

		<p class="text-center mt-5">
			<a class="btn btn-primary" href="categoria-insere.php">
			<i class="bi bi-plus-circle"></i>	
			Inserir nova categoria</a>
		</p>
				
		<div class="table-responsive">
		
			<table class="table table-hover">
				<thead class="table-light">
					<tr>
						<th>Nome</th>
						<th class="text-center">Operações</th>
					</tr>
				</thead>

				<tbody>
				    <?php foreach($listarDeCategorias as $itemCategoria){?>

					<tr>
						<td> <?=$itemCategoria["nome"]?></td>
						<td class="text-center">

						
							<a class="btn btn-warning" 
							href="categoria-atualiza.php">
							<i class="bi bi-pencil"></i> Atualizar
							</a>
						
							<a class="btn btn-danger excluir" 
							href="categoria-exclui.php">
							<i class="bi bi-trash"></i> Excluir
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

