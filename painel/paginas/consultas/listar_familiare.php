<?php 

require_once("../../../conexao.php");



$query = "SELECT * FROM grupo_familiar";
$result = mysqli_query($conn, $query);

$output = '';

while ($row = mysqli_fetch_assoc($result)) {
    $output .= '
    <tr>
        <td>' . $row['nome'] . '</td>
        <td>' . $row['idade'] . '</td>
        <td>' . $row['parentesco'] . '</td>
        <td>' . $row['situacao_atual'] . '</td>
        <td>
            <button class="btn btn-primary btn-edit" data-id="' . $row['id_familiar'] . '">Editar</button>
            <button class="btn btn-danger btn-delete" data-id="' . $row['id_familiar'] . '">Excluir</button>
        </td>
    </tr>';
}

echo $output;
?>