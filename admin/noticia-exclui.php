<?php
require_once "../vendor/autoload.php";
// Para não autorizar acesso sem o login correto
use Microblog\ControleDeAcesso;
$sessao = new ControleDeAcesso;
$sessao->verificaAcesso();