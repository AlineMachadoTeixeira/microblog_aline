<?php
namespace Microblog;
use PDO, Exception;

class Usuario{
    private int $id;
    private string $nome;
    private string $email;
    private string $senha;
    private string $tipo;
    private PDO $conexao;

    public function __construct(){
        $this->conexao = Banco::conecta();        
    }

    //ID
    public function getId(): int
    {
        return $this->id;
    }    
    public function setId(int $id): self
    {
        $this->id = $id;

        return $this;
    }

    //Nome
    public function getNome(): string
    {
        return $this->nome;
    }    
    public function setNome(string $nome): self
    {
        $this->nome = $nome;

        return $this;
    }

    //E-mail
    public function getEmail(): string
    {
        return $this->email;
    }    
    public function setEmail(string $email): self
    {
        $this->email = $email;

        return $this;
    }

    //Senha
    public function getSenha(): string
    {
        return $this->senha;
    }    
    public function setSenha(string $senha): self
    {
        $this->senha = $senha;

        return $this;
    }

    //Tipo
    public function getTipo(): string
    {
        return $this->tipo;
    }
    public function setTipo(string $tipo): self
    {
        $this->tipo = $tipo;

        return $this;
    }

}