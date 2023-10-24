<?php
namespace Microblog; 
use PDO, Exception;

final class Noticia {
    private int $id;
    private string $data;
    private string $titulo;
    private string $texto;
    private string $resumo;
    private string $imagem;
    private string $destaque;
    private string $termo;    /// Será usado na busca
    private PDO $conexao;

    /* Propriedade cujo tipo são ASSOCIADOS  à classes já existentes. Isso permitirá usar recursos destas classes à partir de Noticias */
    public Usuario $usuario;
    public Categoria $categoria;

    public function __construct(){
        /* Ao criar um objeto Noticias, aproveitamos para instanciar objeto de usuario e categoria */
        $this->usuario = new Usuario;
        $this->categoria = new Categoria;

        $this->conexao = Banco::conecta();        
    }  
    


    //Id
    public function getId(): int
    {
        return $this->id;
    }    
    public function setId(int $id): self
    {
        $this->id = $this->id = filter_var($id, FILTER_SANITIZE_NUMBER_INT);

        return $this;
    }

    //Data
    public function getData(): string
    {
        return $this->data;
    }
    public function setData(string $data): self
    {
        $this->data = $this->data = filter_var($data, FILTER_SANITIZE_SPECIAL_CHARS);

        return $this;
    }

    //Titulo
    public function getTitulo(): string
    {
        return $this->titulo;
    }
    
    public function setTitulo(string $titulo): self
    {
        $this->titulo = $this->titulo = filter_var($titulo, FILTER_SANITIZE_SPECIAL_CHARS);

        return $this;
    }

    //Texto
    public function getTexto(): string
    {
        return $this->texto;
    }
    
    public function setTexto(string $texto): self
    {
        $this->texto = $this->texto = filter_var($texto, FILTER_SANITIZE_SPECIAL_CHARS);

        return $this;
    }

    //REsumo
    public function getResumo(): string
    {
        return $this->resumo;
    }
    public function setResumo(string $resumo): self
    {
        $this->resumo = $this->resumo = filter_var($resumo, FILTER_SANITIZE_SPECIAL_CHARS);

        return $this;
    }

    //Imagem 
    public function getImagem(): string
    {
        return $this->imagem;
    }
    public function setImagem(string $imagem): self
    {
        $this->imagem = $this->imagem = filter_var($imagem, FILTER_SANITIZE_SPECIAL_CHARS);

        return $this;
    }

    //Destaque
    public function getDestaque(): string
    {
        return $this->destaque;
    }
    public function setDestaque(string $destaque): self
    {
        $this->destaque = $this->destaque = filter_var($destaque, FILTER_SANITIZE_SPECIAL_CHARS);

        return $this;
    }

    //Termo
    public function getTermo(): string
    {
        return $this->termo;
    }
    public function setTermo(string $termo): self
    {
        $this->termo = $this->termo = filter_var($termo, FILTER_SANITIZE_SPECIAL_CHARS);

        return $this;
    }
}
    

