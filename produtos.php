<?php
include_once('controller/conexao.php')
?>
<!DOCTYPE html>
 <html lang="pt-br">
 <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastrar Produto</title>
    <link rel="stylesheet" href="css/style.css">
 </head>
 <body>
    <header>
        <div class="center">
            <h1>Cadastro de Produtoss</h1>
            <a href="index.php" target="_self">Voltar</a>
        </div>
    </header>
    <section id="produtos">
        <form action="insere-produto.php" method="post">
            Nome: <input type="text" name="nome"><br>
            Descrição: <input type="text" name="descricao"><br>
            Estoque: <input type="number" name="estoque"><br>
            Preço: <input type="number" name="preco" min="0.00"max="100000.00" step="0.01"><br>
            Categoria:
            <select name="categoria" id="">
                <option value="">Selecione</option>
                <?php
                    $resultado_categoria = "SELECT * FROM categoria";
                    $resultcategoria = mysqli_query($mysqli, $resultado_categoria);
                    while($row_categorias = mysqli_fetch_assoc($resultcategoria)){?>
                    <option value="<?php echo $row_categorias['IDCATEGORIA'];?>">
                    <?php echo $row_categorias['DESCRICAO']; ?>
                </option>

                    <?php
                    }
                ?>
            </select><br>
            Marca:
            <select name="marca" id="">
                <option value="">Selecione</option>
                <?php
                    $resultado_marca = "SELECT * FROM marca";
                    $resultado_marca = mysqli_query($mysqli, $resultado_marca);
                    while($row_marca = mysqli_fetch_assoc($resultado_marca)){?>
                    <option value="<?php echo $row_marca['IDMARCA'];?>">
                    <?php echo $row_marca['DESCRICAO']; ?>
                </option>
                
                    <?php
                    }
                ?>
            </select>
            <br><br>
            <input type="submit" value="Cadastrar">
        </form>
    </section>    
 </body>
 </html>