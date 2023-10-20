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
    public function listarCategoria():array {
        $sql = "SELECT * FROM categorias ";  //ORDER BY nome não coloquei

        try{
            $consulta = $this->conexao->prepare($sql);
            $consulta->execute();
            $resultado = $consulta->fetchAll(PDO::FETCH_ASSOC);

        }catch (Exception $erro){
         die ("Erro ao listar categoria:" . $erro->getMessage());
        }

        return $resultado;


    }// Fim Lista/Ler Categoria

   //ListaUm/LerUm Categoria  Select
   public function listarUmaCategoria():array {
    $sql = "SELECT * FROM categorias WHERE id = :id";

    try{
        $consulta = $this->conexao->prepare($sql);
        $consulta->bindValue(":id", $this->id, PDO::PARAM_INT);
        $consulta->execute();
        $resultado = $consulta->fetch(PDO::FETCH_ASSOC);

    }catch (Exception $erro){
     die ("Erro ao carregar dados da categoria" . $erro->getMessage());
    }

    return $resultado;
   } //Fim ListaUm/LerUm Categoria


   //UPDATE DE Atualizar Categoria 
   public function atualizarCategorias():void{
    $sql = "UPDATE categorias SET
            nome = :nome             
            WHERE id = :id";

        try{
            $consulta = $this->conexao->prepare($sql);
            $consulta->bindValue(":nome", $this->nome, PDO::PARAM_STR);
            $consulta->bindValue(":id", $this->id, PDO::PARAM_INT);    
            

            $consulta->execute();
           

        }catch (Exception $erro){
        die ("Erro ao atualizar categoria" . $erro->getMessage());
        }

        

   } //Fim do atualizar usuario

   //Excluir DELETE Categoria
   public function excluirCategoria():void {
    $sql = "DELETE FROM categorias WHERE id = :id";

    try{
        $consulta = $this->conexao->prepare($sql);
        $consulta->bindValue(":id", $this->id, PDO::PARAM_INT);

        $consulta->execute();

    }catch (Exception $erro){
     die ("Erro ao excluir usuário:" . $erro->getMessage());
    }

   } // Fim do excluir Categoria


  
















    

    //ID
    public function getId(): int
    {
        return $this->id;
    }    
    public function setId(int $id): self
    {
        $this->id = $this->id = filter_var($id, FILTER_SANITIZE_NUMBER_INT);

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