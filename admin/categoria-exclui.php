<?php
use Microblog\Categoria;
require_once "../vendor/autoload.php";
// Para não autorizar acesso sem o login correto
use Microblog\ControleDeAcesso;
$sessao = new ControleDeAcesso;
$sessao->verificaAcesso();


/* Verificando se quem está acessando esta pagina pode acessar (se o if do método abaixo for TRUE, ENTÃO Significa que o usuario NÃO É um admin e portanto está página não será autorizada para uso) */
$sessao->verificarAcessoAdmin();

//Para excluir categoria 
$categoria = new Categoria;
$categoria->setId($_GET ['id']);
$categoria->excluirCategoria();
header("location:categorias.php");


