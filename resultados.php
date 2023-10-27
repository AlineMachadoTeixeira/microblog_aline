<?php

use Microblog\Noticia;
use Microblog\Utilitarios;

require_once "vendor/autoload.php";
$noticia = new Noticia;
$noticia->setTermo($_POST["busca"]);
$resultado = $noticia->busca();
$quantidade = count($resultado);
//Utilitarios::dump($resultado)


if($quantidade > 0){
?>
   <h2 class="fs-5">Resultados: <span><?=$quantidade?></span></h2>
   <div class="list-group">
      <?php foreach($resultado as $itemNoticias){?>
        <a class="list-group-item list-group-item-action" href="noticia.php?id=<?= $itemNoticias['id']?>">
           <?= $itemNoticias['titulo']?>
        </a>

      <?php }?>
   </div>

<?php } else {?>
    <h2 class="fs-5 text-danger"> Sem Notícias</h2>
<?php
}
?>





