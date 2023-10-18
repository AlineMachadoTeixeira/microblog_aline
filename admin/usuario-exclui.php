<?php
use Microblog\Usuario;
use Microblog\ControleDeAcesso;
require_once "../vendor/autoload.php";

$sessao = new ControleDeAcesso;
$sessao->verificaAcesso();

/* Verificando se quem está acessando esta pagina pode acessar (se o if do método abaixo for TRUE, ENTÃO Significa que o usuario NÃO É um admin e portanto está página não será autorizada para uso) */
$sessao->verificarAcessoAdmin();

$usuario = new Usuario;
$usuario->setId($_GET ['id']);
$usuario->excluir();
header("location:usuarios.php");