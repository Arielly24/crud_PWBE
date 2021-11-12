<?php
    include('../componentes/header.php');

    require('../database/conexao.php');
   
    $sql = "SELECT * FROM tbl_pessoa";

    $resultado = mysqli_query($conexao, $sql);
    
?>

<div class="container">

    <br/>
    
    <table class="table table-bordered">

    <thead>
        <tr>
            <th>ID</th>
            <th>Nome</th>
            <th>Sobrenome</th>
            <th>E-mail</th>
            <th>Celular</th>
            <th>Ações</th>
        </tr>
    </thead>

    <tbody>

    <?php

        while($usuario = mysqli_fetch_array($resultado)){
            $cod_pessoa = $usuario["cod_pessoa"];
            $nome = $usuario["nome"];
            $sobrenome = $usuario["sobrenome"];
            $email = $usuario["email"];
            $celular = $usuario["celular"];

    ?>    

            <tr>
                <th><?php echo $cod_pessoa?></th>
                <th><?php echo $nome?></th>
                <th><?php echo $sobrenome?></th>
                <th><?php echo $email?></th>
                <th><?php echo $celular?></th>
                <th>   

                    <a class="btn btn-warning" href="editar.php?cod_pessoa=<?php echo $dados["cod_pessoa"]?>">Editar</a>
                    <a class="btn btn-danger" onclick="deletar(<?php echo $cod_pessoa?>)">Excluir</a>

                    <!-- <button class="btn btn-warning">Editar</button>
                    <form action="" method="post" style="display: inline;">
                        <input type="hidden" name="id" value="">
                        <button class="btn btn-danger">Excluir</button>
                    </form> -->
                    
                </th>
            </tr>
            
            <!-- FORM USADO PARA A EXCLUSÃO DE PRODUTOS -->
            <form id="formDeletar" method="POST" action="../acoes.php">
                        <input type="hidden" name="acoes" value="deletar" />
                        <input type="hidden" name="cod_pessoa" id="cod_pessoa" />
                    </form>
            <?php        

            }  
            
        ?> 


    </tbody>

    </table>

    <!-- SCRIPT QUE DISPARA O FORM DE EXCLUSÃO DE PRODUTOS -->
    <script lang="javascript">
        function deletar($cod_pessoa) {
            if (confirm("Tem certeza que deseja deletar este usuário?")) {
                document.querySelector("#cod_pessoa").value = cod_pessoa;
                document.querySelector("#formDeletar").submit();
            }
        }
    </script>

</div>

<?php
    include('../componentes/footer.php');
?>