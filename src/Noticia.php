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

    /* Metrodo CRUD  */
    public function inserir():void {
        $sql = "INSERT INTO  noticias(titulo, texto, resumo, imagem, destaque, usuario_id, categoria_id) 
                 VALUES (:titulo, :texto, :resumo, :imagem, :destaque, :usuario_id, :categoria_id)";

        try{
            $consulta = $this->conexao->prepare($sql);
            $consulta->bindValue(":titulo", $this->titulo, PDO::PARAM_STR);
            $consulta->bindValue(":texto", $this->texto, PDO::PARAM_STR);
            $consulta->bindValue(":resumo", $this->resumo, PDO::PARAM_STR);
            $consulta->bindValue(":imagem", $this->imagem, PDO::PARAM_STR);
            $consulta->bindValue(":destaque", $this->destaque, PDO::PARAM_STR);

            /* Aqui primeiro chamamos os getters de ID do Usuario e de Categoria, para só depois associar os valores aos parâmetros da consultas SQL. Isso é possivel devido à associação entre classes.  */
            $consulta->bindValue(":usuario_id", $this->usuario->getId(), PDO::PARAM_INT); //  
            $consulta->bindValue(":categoria_id", $this->categoria->getId(), PDO::PARAM_INT); //

            $consulta->execute();
            
        }catch (Exception $erro){
            die ("Erro ao inserir notícia:" . $erro->getMessage());
   }
                
   }

    /* Método para upload de foto */ 
    public function upload(array $arquivo):void{

        //Definindo os tipos válidos de foto o mesmo tipo que colocamos no formulario
        $tiposValidos = [
            "image/png",
            "image/jpeg",
            "image/gif",
            "image/svg+xml"
        ];

        // Verificando se o arquivo NÃO É um dos tipos válidos 
        if (!in_array($arquivo["type"], $tiposValidos)){
            //Alertamos o usuario e o fazemos voltar para o form.
            die("
                <script>
                alert('Formato inválido!');
                history.back();
                </script>
            ");
        }

        //Acessando APENAS o nome/extensão do arquivo 
        $nome = $arquivo["name"];

        //Acessando os dados de acesso/armazenamento temporários
        $temporario = $arquivo["tmp_name"];

        //Definindo a pasta de destino das imagens no site 
        $pastaFinal = "../imagens/".$nome;

        //Movemos/enviamos da área temporária para a final/destino
        move_uploaded_file($temporario, $pastaFinal);
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
    

