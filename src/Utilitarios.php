<?php
namespace Microblog;
abstract class Utilitarios {
    //Lembra de olhar o diagrama de classes.dia esse $ estão lá

    /* Sobre o parêmetro $dados com o tipo array/bool Quando um parâmento pode receber tipos de dados diferentes de acordo com a chamada do método, usamos o operador | (ou) entre as opções de tipos. */
    public static function dump(array | bool | object $dados):void{
        echo "<pre>";
        var_dump($dados);
        echo"</pre>";

    }

}

// public static function dump( $dados):void  se não é o php 7.4 faz assim
