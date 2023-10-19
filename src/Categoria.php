<?php
namespace Microblog;
use PDO, Exception;

class Categoria {
    private int $id;
    private string $nome;
    private PDO $conexao;

    public function __construct(){
        $this->conexao = Banco::conecta();        
    }  

    //Inserir Categoria 
    public function inserir():void{
        $sql = "INSERT INTO categorias(nome) VALUES (:nome)";

        try{
            $consulta = $this->conexao->prepare($sql);
            $consulta->bindValue(":nome", $this->nome, PDO::PARAM_STR);

            $consulta->execute();

        }catch (Exception $erro){
         die ("Erro ao inserir categorias:" . $erro->getMessage());
        }

    } //Fim do Inserir Categoria

    //Lista/Ler Categoria  Select 
    public function listarCategorias():array {
        $sql = "SELECT * FROM categorias ORDER BY nome";

        try{
            $consulta = $this->conexao->prepare($sql);
            $consulta->execute();
            $resultado = $consulta->fetchAll(PDO::FETCH_ASSOC);

        }catch (Exception $erro){
         die ("Erro ao listar categoria:" . $erro->getMessage());
        }

        return $resultado;


    }















    

    //ID
    public function getId(): int
    {
        return $this->id;
    }    
    public function setId(int $id): self
    {
        $this->id = $this->id = $this->id = filter_var($id, FILTER_SANITIZE_NUMBER_INT);

        return $this;
    }

    //Nome
    public function getNome(): string
    {
        return $this->nome;
    }    
    public function setNome(string $nome): self
    {
        $this->nome = $this->nome = filter_var($nome, FILTER_SANITIZE_SPECIAL_CHARS);

        return $this;
    }
}