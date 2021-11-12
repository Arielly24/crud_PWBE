<?php

    session_start();

    require('../atividade_crud/database/conexao.php');

    if(isset($_GET["acoes"])) {
        $acao = $_GET["acoes"];
    } else {
        $acao = $_POST["acoes"];
    }

    switch ($acao) {
        case 'inserir':

            $nome = $_POST['nome'];
            $sobrenome = $_POST['sobrenome'];
            $email = $_POST['email'];
            $celular = $_POST['celular'];

            $sql = "INSERT INTO tbl_pessoa (nome, sobrenome, email, celular)
            VALUES ('$nome', '$sobrenome', '$email', '$celular')";

            $resultado = mysqli_query($conexao, $sql);

            header("location: listagem/index.php");

            break;

            case 'deletar':

                echo 

                $cod_pessoa = $_POST['cod_pessoa'];
    
                $sql = "DELETE FROM tbl_pessoa WHERE cod_pessoa = $cod_pessoa";
    
                $resultado = mysqli_query($conexao, $sql);
    
                header('location: listagem/index.php');
    
                break;
    
            case 'editar':
    
                $cod_pessoa = $_POST["cod_pessoa"];
                $nome = $_POST["nome"];
                $sobrenome = $_POST["sobrenome"];
                $email = $_POST["email"];
                $celular = $_POST["celular"];
    
                $sql = "UPDATE tbl_pessoa SET '$nome', '$sobrenome', '$email', '$celular' WHERE cod_pessoa = $cod_pessoa";
                // echo $sql; exit;
                
                $resultado = mysqli_query($conexao, $sql);
    
                header('location: cadastro/editar.php');
    
                break;
        
        default:
            # code...
            break;
    }

?>