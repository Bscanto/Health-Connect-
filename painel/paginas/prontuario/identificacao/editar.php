 <!-- Modal de Edição -->
 <div
    class="modal fade"
    id="ModalEditar"
    tabindex="-1"
    role="dialog"
    aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header border-0">
                <h5 class="modal-title">
                    <span class="fw-mediumbold"> Editar Assistente</span>
                </h5>
                <button
                    type="button"
                    class="close"
                    data-bs-dismiss="modal"
                    aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="editar.php" method="POST" enctype="multipart/form-data" id="formEditarAssistente">
                    <div class="row">
                    <input type="hidden" id="editId" name="id">
                        <div class="col-md-6 pe-0">
                            <div class="form-group form-group-default">
                                <label>Nome</label>
                                <input
                                    id="editName"
                                    name="nome"
                                    type="text"
                                    class="form-control"
                                    placeholder="Preencha o nome" required />
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group form-group-default">
                                <label>Local</label>
                                <select id="editOffice" name="local" class="form-control" required>
                                    <option value="" selected disabled>Selecione o local</option>
                                    <option value="CRAS Sul">CRAS Sul</option>
                                    <option value="CRAS Norte">CRAS Norte</option>
                                    <option value="CRAS Leste">CRAS Leste</option>
                                    <option value="CRAS Extremo Leste">CRAS Extremo Leste</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-6 pe-0">
                            <div class="form-group form-group-default">
                                <label>Função</label>
                                <select id="editFuncao" name="funcao" class="form-control" required>
                                    <option value="" selected disabled>Selecione a função</option>
                                    <option value="Assistente social">Assistente Social</option>
                                    <option value="Coordenador">Coordenador</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group form-group-default">
                                <label>Email</label>
                                <input
                                    id="editEmail"
                                    name="email"
                                    type="email"
                                    class="form-control"
                                    placeholder="Preencha o email" required />
                            </div>
                        </div>
                        <div class="col-md-6 pe-0">
                            <div class="form-group form-group-default">
                                <label>Senha</label>
                                <input
                                    id="editPassword"
                                    name="senha"
                                    type="password"
                                    class="form-control"
                                    placeholder="Preencha a senha" required />
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group form-group-default">
                                <label>Confirme a senha</label>
                                <input
                                    id="confirmEditPassword"
                                    name="confirma_senha"
                                    type="password"
                                    class="form-control"
                                    placeholder="Confirme a senha" required />
                            </div>
                        </div>
                        <div class="col-md-6 pe-0">
                            <div class="form-group form-group-default">
                                <label>CPF</label>
                                <input
                                    id="editCpf"
                                    name="cpf"
                                    type="text"
                                    class="form-control"
                                    placeholder="Preencha o CPF" required />
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group form-group-default">
                                <label>CRESS</label>
                                <input
                                    id="editCress"
                                    name="cress"
                                    type="text"
                                    class="form-control"
                                    placeholder="Preencha o CRESS" required />
                            </div>
                        </div>
                        <div class="col-md-6 pe-0">
                            <div class="form-group form-group-default">
                                <label>Matrícula</label>
                                <input
                                    id="editMatricula"
                                    name="matricula"
                                    type="text"
                                    class="form-control"
                                    placeholder="Preencha a matrícula" required />
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group form-group-default">
                                <label>Foto</label>
                                <input disabled
                                    id="editFoto"
                                    name="foto"
                                    type="file"
                                    class="form-control" />
                            </div>
                        </div>
                    </div>

            </div>
            <div class="modal-footer border-0">
                <button
                    type="submit"
                    id="editenviar"
                    class="btn btn-primary">
                    Salvar Alterações
                </button>
                <button
                    type="button"
                    class="btn btn-danger"
                    data-bs-dismiss="modal">
                    Fechar
                </button>
            </div>
            </form>
        </div>
    </div>
</div>

<button type="button" data-bs-toggle="tooltip" title="Editar" class="btn btn-link btn-primary btn-lg btn-edit" data-id="${row.id}">
                                <i class="fa fa-edit"></i>
                            </button>

$('#formEditarAssistente').on('submit', function(e) {
    e.preventDefault();

    var formData = {
        id: $('#editId').val(),
        nome: $('#editName').val(),
        local: $('#editOffice').val(),
        funcao: $('#editFuncao').val(),
        email: $('#editEmail').val(),
        cpf: $('#editCpf').val(),
        cress: $('#editCress').val(),
        matricula: $('#editMatricula').val(),
    };

    $.ajax({
        url: 'editar.php',
        type: 'POST',
        data: formData,
        dataType: 'json',
        success: function(response) {
            if (response.success) {
                alert(response.success);
                $('#ModalEditar').modal('hide');
                $('#add-row').DataTable().ajax.reload();
            } else {
                alert(response.error); 
            }
        },
        error: function(xhr, status, error) {
            console.error(xhr.responseText);
            alert('Erro ao atualizar os dados.');
        }
    });


-----------------------------------------------------------------------------------------------------------------
editar.php


<?php
require_once 'conexao.php';

header('Content-Type: application/json');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id = $_POST['id'];
    $nome = $_POST['nome'];
    $local = $_POST['local'];
    $funcao = $_POST['funcao'];
    $email = $_POST['email'];
    $cpf = $_POST['cpf'];
    $cress = $_POST['cress'];
    $matricula = $_POST['matricula'];

    $query = "UPDATE assistentes SET 
                nome = :nome, 
                local = :local, 
                funcao = :funcao, 
                email = :email, 
                cpf = :cpf, 
                cress = :cress, 
                matricula = :matricula 
              WHERE id = :id";

    try {
        $stmt = $db->prepare($query);
        $stmt->bindParam(':id', $id);
        $stmt->bindParam(':nome', $nome);
        $stmt->bindParam(':local', $local);
        $stmt->bindParam(':funcao', $funcao);
        $stmt->bindParam(':email', $email);
        $stmt->bindParam(':cpf', $cpf);
        $stmt->bindParam(':cress', $cress);
        $stmt->bindParam(':matricula', $matricula);

        if ($stmt->execute()) {
            echo json_encode(['success' => 'Dados atualizados com sucesso!']);
        } else {
            echo json_encode(['error' => 'Erro ao atualizar os dados.']);
        }
    } catch (PDOException $e) {
        echo json_encode(['error' => 'Erro na consulta: ' . $e->getMessage()]);
    }
} else {
    echo json_encode(['error' => 'Método de requisição inválido.']);
}
?>

