<?php

use Microblog\Utilitarios;

require_once "inc/cabecalho.php";
$noticia->categoria->setId($_GET["id"]);
$dados = $noticia->listarPorCategoria();
//Utilitarios::dump($dados);
?>


<div class="row my-1 mx-md-n1">

    <article class="col-12">
        <h2 class=" ">Notícias sobre <span class="badge bg-primary">categoria</span> </h2>
        
        <div class="row my-1">
            <div class="col-12 px-md-1">
                <div class="list-group">
                    <?php foreach($dados as $itemNoticia){?>
                        <a href="noticia.php?id=<?=$itemNoticia?>" class="list-group-item list-group-item-action">
                            <h3 class="fs-6"><?=$itemNoticia['titulo']?></h3>
                            <p><time><?=$itemNoticia['data']?></time> - <?=$itemNoticia['autor']?></p>
                            <p><?=$itemNoticia['resumo']?></p>
                        </a>
                    <?php }?>
                    
                    
                </div>
            </div>
        </div>


    </article>
    

</div>        
        

<?php 
require_once "inc/todas.php";
require_once "inc/rodape.php";
?>

