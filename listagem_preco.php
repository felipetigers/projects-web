<?php

// Conecta com o banco de dados
$link = new PDO ("mysql:localhost;dbname=mybdados","root","");

// Obtém o ID do estabelecimento selecionado
$estabelecimento_id = $_POST['estabelecimento_id'];

// Seleciona os produtos mais baratos do estabelecimento
$sql = "SELECT p.nome, p.marca, p.tamanho, e.nome_fantasia, e.endereco, e.cidade, preco.preco
        FROM produtos p
        INNER JOIN (
            SELECT produto_id, MIN(preco) AS preco
            FROM precos_produtos_estabelecimentos
            WHERE estabelecimento_id = $estabelecimento_id
            GROUP BY produto_id
        ) preco ON p.id = preco.produto_id
        INNER JOIN (
            SELECT id, nome_fantasia, endereco, cidade
            FROM estabelecimentos
        ) e ON e.id = $estabelecimento_id
        WHERE p.id IN (
            SELECT produto_id
            FROM precos_produtos_estabelecimentos
            WHERE estabelecimento_id = $estabelecimento_id
        )";

$result = $conn->query($sql);

// Imprime a tabela de produtos mais baratos do estabelecimento
if ($result->num_rows > 0) {
    echo "<table>
            <tr>
                <th>Produto</th>
                <th>Marca</th>
                <th>Tamanho/Quantidade</th>
                <th>Estabelecimento</th>
                <th>Endereço</th>
                <th>Cidade</th>
                <th>Preço</th>
            </tr>";
    while($row = $result->fetch_assoc()) {
        echo "<tr>
                <td>" . $row['nome'] . "</td>
                <td>" . $row['marca'] . "</td>
                <td>" . $row['tamanho'] . "</td>
                <td>" . $row['nome_fantasia'] . "</td>
                <td>" . $row['endereco'] . "</td>
                <td>" . $row['cidade'] . "</td>
                <td>" . $row['preco'] . "</td>
            </tr>";
    }
    echo "</table>";
} else {
    echo "Nenhum produto encontrado para o estabelecimento selecionado.";
}


?>
