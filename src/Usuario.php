<?php
namespace Microblog;
use PDO, Exception;

class Usuario{
    //Lembra de olhar o diagrama de classes.dia esse $ estão lá
 
    private int $id;
    private string $nome;
    private string $email;
    private string $senha;
    private string $tipo;
    private PDO $conexao;

    public function __construct(){
        $this->conexao = Banco::conecta();        
    }    

   /* Método para rotinas de CRUD no banco */

   //INSERT DE USUARIO
   public function inserir():void {
    $sql = "INSERT INTO usuarios(nome, email, senha, tipo)
           VALUES(:nome, :email, :senha, :tipo)";

           try{
            $consulta = $this->conexao->prepare($sql);
            $consulta->bindValue(":nome", $this->nome, PDO::PARAM_STR);
            $consulta->bindValue(":email", $this->email, PDO::PARAM_STR);
            $consulta->bindValue(":senha", $this->senha, PDO::PARAM_STR);
            $consulta->bindValue(":tipo", $this->tipo, PDO::PARAM_STR);
            $consulta->execute();
           }catch (Exception $erro){
            die ("Erro ao inserir usuário:" . $erro->getMessage());
           }

   } //Fim inserir

   /* Método para codificar e comparção da senha */
   public function codificaSenha(string $senha):string {
    return password_hash($senha, PASSWORD_DEFAULT);
   }

   //Select de usuários listar
   public function listar():array {
    $sql = "SELECT * FROM usuarios ORDER BY nome";

    try{
        $consulta = $this->conexao->prepare($sql);
        $consulta->execute();
        $resultado = $consulta->fetchAll(PDO::FETCH_ASSOC);
    }catch (Exception $erro){
     die ("Erro ao listar usuários:" . $erro->getMessage());
    }
    return $resultado;
   }//Fim do listar


   //Select de usuário listarUm
   public function listarUm():array {
    $sql = "SELECT * FROM usuarios WHERE id = :id";

    try{
        $consulta = $this->conexao->prepare($sql);
        $consulta->bindValue(":id", $this->id, PDO::PARAM_INT);
        $consulta->execute();
        $resultado = $consulta->fetch(PDO::FETCH_ASSOC);

    }catch (Exception $erro){
     die ("Erro ao carregar dados" . $erro->getMessage());
    }

    return $resultado;
   }

   //
   public function atualizarUsuiario():void {

   } //Fim usuário listarUm


   //UPDATE DE Usuario 
   public function atualizar():void{
    $sql = "UPDATE usuario SET
            nome = :nome, email = :email, senha = :senha, tipo = :tipo,  WHERE id = :id";

        try{
            $consulta = $this->conexao->prepare($sql);
            $consulta->bindValue(":id", $this->id, PDO::PARAM_INT);
            $consulta->bindValue(":nome", $this->nome, PDO::PARAM_STR);
            $consulta->bindValue(":email", $this->email, PDO::PARAM_STR);
            $consulta->bindValue(":senha", $this->senha, PDO::PARAM_STR);
            $consulta->bindValue(":tipo", $this->tipo, PDO::PARAM_STR);

            $consulta->execute();
            $resultado = $consulta->fetch(PDO::FETCH_ASSOC);

        }catch (Exception $erro){
        die ("Erro ao atualizar usuário" . $erro->getMessage());
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
        $this->id = $this->id = filter_var($id, FILTER_SANITIZE_NUMBER_INT);;

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

    //E-mail
    public function getEmail(): string
    {
        return $this->email;
    }    
    public function setEmail(string $email): self
    {
        $this->email = $this->email = filter_var($email, FILTER_SANITIZE_SPECIAL_CHARS);

        return $this;
    }

    //Senha
    public function getSenha(): string
    {
        return $this->senha;
    }    
    public function setSenha(string $senha): self
    {
        $this->senha = $this->senha = filter_var($senha, FILTER_SANITIZE_SPECIAL_CHARS);

        return $this;
    }

    //Tipo
    public function getTipo(): string
    {
        return $this->tipo;
    }
    public function setTipo(string $tipo): self
    {
        $this->tipo = $this->tipo = filter_var($tipo, FILTER_SANITIZE_SPECIAL_CHARS);

        return $this;
    }

}
