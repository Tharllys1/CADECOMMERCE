# Projetos Web

Aplicações web utilizando HTML, CSS, JavaScript e PHP.

## Estrutura

- **HTML**: Layout das páginas.
- **CSS**: Estilos das páginas.
- **JavaScript**: Funcionalidades interativas.
- **PHP**: Backend para manipulação de dados.

## Projetos

### 1. Carrinho de Compras

Gerencia um carrinho de compras.

#### Arquivos

- `index.php`: Página principal do carrinho.
- `css/style.css`: Estilos.
- `js/jquery-2.1.4.min.js`: jQuery.
- `js/script.js`: Scripts personalizados.
- `controller/carrinho-busca.php`: Busca de produtos.

#### Métodos PHP

- `index.php`: Gerencia a sessão do carrinho, adiciona e remove produtos.

    ```php
    <?php
    session_start();
    if (!isset($_SESSION['cart'])) {
        $_SESSION['cart'] = array();
    }

    if (isset($_POST['add_to_cart'])) {
        $product_id = $_POST['product_id'];
        if (!in_array($product_id, $_SESSION['cart'])) {
            $_SESSION['cart'][] = $product_id;
        }
    }

    if (isset($_POST['remove_from_cart'])) {
        $product_id = $_POST['product_id'];
        if (($key = array_search($product_id, $_SESSION['cart'])) !== false) {
            unset($_SESSION['cart'][$key]);
        }
    }
    ?>
    ```

- `controller/carrinho-busca.php`: Simula a busca de produtos.

    ```php
    <?php
    $products = array(
        array("id" => 1, "name" => "Produto 1", "price" => 10.0),
        array("id" => 2, "name" => "Produto 2", "price" => 20.0),
        array("id" => 3, "name" => "Produto 3", "price" => 30.0)
    );

    echo json_encode($products);
    ?>
    ```

#### Execução

1. Clone o repositório.
2. Use um servidor web com PHP.
3. Coloque os arquivos no servidor.
4. Acesse `index.php`.

---

### 2. Cadastro de Categorias

Permite cadastrar novas categorias.

#### Arquivos

- `index.php`: Formulário de cadastro.
- `css/style.css`: Estilos.
- `insere-categoria.php`: Cadastro de categoria.

#### Métodos PHP

- `insere-categoria.php`: Insere uma nova categoria no banco de dados.

    ```php
    <?php
    include('controller/conexao.php');

    $descricao = $_POST['descricao'];

    $cad_categoria = "INSERT INTO categoria(DESCRICAO) VALUES ('$descricao')";

    if(mysqli_query($mysqli, $cad_categoria)){
        echo "Nova categoria cadastrada com sucesso";
    } else {
        echo "Erro: " . $cad_categoria . "<br>" . mysqli_error($mysqli);
    }

    mysqli_close($mysqli);
    ?>
    ```

#### Execução

1. Clone o repositório.
2. Use um servidor web com PHP.
3. Coloque os arquivos no servidor.
4. Acesse `index.php`.

---

### 3. Pedido de Compra

Gerencia pedidos de compra.

#### Arquivos

- `index.php`: Página de produtos.
- `css/style.css`: Estilos.
- `js/jquery-2.1.4.min.js`: jQuery.
- `js/script.js`: Scripts personalizados.
- `controller/produtos-busca.php`: Busca de produtos.
- `carrinho.php`: Página do carrinho.

#### Métodos PHP

- `controller/produtos-busca.php`: Simula a busca de produtos.

    ```php
    <?php
    $products = array(
        array("id" => 1, "name" => "Produto 1", "price" => 10.0),
        array("id" => 2, "name" => "Produto 2", "price" => 20.0),
        array("id" => 3, "name" => "Produto 3", "price" => 30.0)
    );

    echo json_encode($products);
    ?>
    ```

- `carrinho.php`: Exibe os produtos no carrinho.

    ```php
    <?php
    session_start();
    if (!isset($_SESSION['cart'])) {
        $_SESSION['cart'] = array();
    }
    ?>

    <!DOCTYPE html>
    <html lang="en">
    <head>
    <meta charset="UTF-8">
    <title>Carrinho de Compras</title>
    <link rel="stylesheet" href="css/style.css">
    </head>
    <body>
    <h1>Carrinho de Compras</h1>
    <ul>
    <?php
    foreach ($_SESSION['cart'] as $product_id) {
        echo "<li>Produto ID: $product_id</li>";
    }
    ?>
    </ul>
    </body>
    </html>
    ```

#### Execução

1. Clone o repositório.
2. Use um servidor web com PHP.
3. Coloque os arquivos no servidor.
4. Acesse `index.php`.

---

### 4. Cadastro de Marcas

Permite cadastrar novas marcas.

#### Arquivos

- `index.php`: Formulário de cadastro.
- `css/style.css`: Estilos.
- `insere-marca.php`: Cadastro de marca.

#### Métodos PHP

- `insere-marca.php`: Insere uma nova marca no banco de dados.

    ```php
    <?php
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "meu_banco";

    $conn = new mysqli($servername, $username, $password, $dbname);

    if ($conn->connect_error) {
        die("Conexão falhou: " . $conn->connect_error);
    }

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $marca = $_POST['marca'];

        $sql = "INSERT INTO marcas (nome) VALUES ('$marca')";
        if ($conn->query($sql) === TRUE) {
            echo "Marca cadastrada com sucesso!";
        } else {
            echo "Erro: " . $sql . "<br>" . $conn->error;
        }
    }

    $conn->close();
    ?>
    ```

#### Execução

1. Clone o repositório.
2. Use um servidor web com PHP.
3. Coloque os arquivos no servidor.
4. Acesse `index.php`.

---

### 5. Resumo de Pedido

Mostra o resumo do pedido.

#### Arquivos

- `index.php`: Página do resumo.
- `css/style.css`: Estilos.
- `js/jquery-2.1.4.min.js`: jQuery.
- `js/script.js`: Scripts personalizados.
- `controller/produtos-resumo.php`: Resumo do pedido.

#### Métodos PHP

- `controller/produtos-resumo.php`: Gera o resumo do pedido baseado nos itens do carrinho.

    ```php
    <?php
    session_start();
    $order_summary = array();

    if (isset($_SESSION['cart'])) {
        foreach ($_SESSION['cart'] as $product_id) {
            $product = array("id" => $product_id, "name" => "Produto $product_id", "price" => $product_id * 10);
            $order_summary[] = $product;
        }
    }

    echo json_encode($order_summary);
    ?>
    ```

#### Execução

1. Clone o repositório.
2. Use um servidor web com PHP.
3. Coloque os arquivos no servidor.
4. Acesse `index.php`.

---

### 6. Cadastro de Produtos

Permite cadastrar produtos com seleção de categoria e marca.

#### Arquivos

- `index.php`: Formulário de cadastro.
- `css/style.css`: Estilos.
- `insere-produto.php`: Inserção de produto.
- `controller/conexao.php`: Conexão com o banco de dados.

#### Métodos PHP

- `controller/conexao.php`: Estabelece a conexão com o banco de dados.

    ```php
    <?php
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "meu_banco";

    $conn = new mysqli($servername, $username, $password, $dbname);

    if ($conn->connect_error) {
        die("Conexão falhou: " . $conn->connect_error);
    }
    ?>
    ```

- `insere-produto.php`: Insere um novo produto no banco de dados.

    ```php
    <?php
    include 'controller/conexao.php';

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $produto = $_POST['produto'];
        $categoria = $_POST['categoria'];
        $marca = $_POST['marca'];

        $sql = "INSERT INTO produtos (nome, categoria_id, marca_id) VALUES ('$produto', '$categoria', '$marca')";
        if ($conn->query($sql) === TRUE) {
            echo "Produto cadastrado com sucesso!";
        } else {
            echo "Erro: " . $sql . "<br>" . $conn->error;
        }
    }

    $conn->close();
    ?>
    ```

#### Execução

1. Clone o repositório.
2. Use um servidor web com PHP e MySQL.
3. Coloque os arquivos no servidor e configure o banco de dados.
4. Acesse `index.php`.

---

## Imagens

### Pedido de Compra

![Pedido de Compra](https://github.com/user-attachments/assets/10a7e641-430e-43cb-91ce-42118876a903)

### Estrutura da Página

![Estrutura da Página](https://github.com/user-attachments/assets/94718ad2-2b8c-4ee6-98a4-cc09b38a88eb)

### Cadastro de Marcas

![Cadastro de Marcas 1](https://github.com/user-attachments/assets/b1525c30-0a70-4a2f-88f3-263a3fa576a3)
![Cadastro de Marcas 2](https://github.com/user-attachments/assets/233e9404-1462-4173-9af4-a59fc04a2336)

### Cadastro de Categorias

![Cadastro de Categorias 1](https://github.com/user-attachments/assets/0a68a919-392e-4948-bc4c-1773f1a07c88)
![Cadastro de Categorias 2](https://github.com/user-attachments/assets/df8370a3-0598-4a8c-9464-182fc437e595)
