




  // Função para abrir modal de inserção
  function inserir() {
    $("#mensagem").text("");
    $("#titulo_inserir").text("Inserir Registro");
    $("#modalForm").modal("show");
    limparCampos();
  }

  
  // Função inserir acao
  function inserirAcao() {
    $("#mensagem").text("");
    $("#titulo_inserir").text("Inserir Ação");
    $("#modalAcao").modal("show");
  }

  // Função listarAcao - Atualiza a lista de ações realizadas
function listarAcao(p1) {
    $.ajax({
        url: "paginas/" + pag + "/acao/listaracao.php", // Endereço do arquivo PHP
        method: "POST", // Método de envio dos dados
        data: { p1 }, 
        dataType: "html", // Tipo de resposta esperada
        success: function(result) {
            $("#listarAcao").html(result); // Atualiza o conteúdo do div com os dados recebidos
            $("#mensagem-excluir").text("");
        },
        error: function(xhr, status, error) {
            console.error("Erro ao listar ações:", error);
            alert("Erro ao carregar as ações.");
        }
    });
}
  

  // Função de submissão do formulário de edição
  $("#form").submit(function (event) {
    event.preventDefault(); // Previne o envio padrão do formulário
    var formData = new FormData(this);
  
    $.ajax({
      url: "paginas/" + pag + "/salvar.php",
      type: "POST",
      data: formData,
  
      success: function (mensagem) {
        $("#mensagem").text("");
        $("#mensagem").removeClass();
        if (mensagem.trim() == "Salvo com Sucesso") {
          $("#btn-fechar").click();
          listar(); 
        } else {
          $("#mensagem").addClass("text-danger");
          $("#mensagem").text(mensagem);
        }
      },
  
      cache: false,
      contentType: false,
      processData: false,
    });
  });

  $('#formEditarpaciente').on('submit', function(e) {
    e.preventDefault();

    var formData = {
        id: $('#id').val(),
        nome: $('#nome').val(),
        cns: $('#cns').val(),
        cpf: $('#cpf').val(),
        data_nasc: $('#data_nasc').val(),
        sexo: $('#sexo').val(),
        endereco: $('#endereco').val(),
        numero: $('#numero').val(),
        cep: $('#cep').val(),
        bairro: $('#bairro').val(),
        cidade: $('#cidade').val(),
        estado: $('#estado').val(),
        nome_responsavel: $('#nome_responsavel').val(),
        nome_mae: $('#nome_mae').val(),
        ocupacao_mae: $('#ocupacao_mae').val(),
        ocupacao_pai: $('#ocupacao_pai').val(),
        telefone: $('#telefone').val(),
        celular: $('#celular').val(),
        raca: $('#raca').val(),
        nacionalidade: $('#nacionalidade').val(),
        queixa: $('#queixa').val(),
    };

    console.log('Dados do formulário:', formData);

    $.ajax({
      url: "paginas/" + pag + "/identificacao/salvar.php",
      type: 'POST',
      data: formData,
      dataType: 'json',
      success: function(response) {
          console.log('Resposta do servidor:', response);
          if (response.success) {
              alert(response.success);
              $('#editarIdentificacao222').modal('hide');
          } else {
              alert(response.error);
          }
      },
      error: function(xhr, status, error) {
          console.error('Erro AJAX:', xhr.responseText);
          console.error('Status:', status);
          console.error('Erro:', error);
          alert('Erro ao atualizar os dados.');
      }
  });
  
});



// FUNCAO PARA EDITAR DADOS DO PRONTUARIO
  function salvaridentificacao() {
    var formData = $('#salvarIdentificacao').serialize();

    $.ajax({
        type: 'POST',
        url: "paginas/" + pag + "/identificacao/salvar.php",
        data: formData,
        success: function(response) {
            alert('Dados salvos com sucesso!');
        },
        error: function() {
            alert('Erro ao salvar dados.');
        }
    });
  }

// FUNÇÃO PARA SALVAR ESCOLARIDADE
$("#formEscolaridade").submit(function (event) {
  event.preventDefault(); // Previne o envio padrão do formulário
  var formData = new FormData(this);

  $.ajax({
    url: "paginas/" + pag + "/escolaridade/salvar_escolaridade.php",
    type: "POST",
    data: formData,

    success: function (mensagem) {
      $("#mensagem").text("");
      $("#mensagem").removeClass();
      if (mensagem.trim() == "Salvo com Sucesso") {
        $("#btn-fechar").click();

      } else {
        $("#mensagem").addClass("text-danger");
        $("#mensagem").text(mensagem);
      }
    },

    cache: false,
    contentType: false,
    processData: false,
  });
});


  // Função para excluir um registro
  function excluir(id) {
    $("#mensagem-excluir").text("Excluindo...");
  
    $.ajax({
      url: "paginas/" + pag + "/excluir.php",
      method: "POST",
      data: { id },
      dataType: "html",
  
      success: function (mensagem) {
        if (mensagem.trim() == "Excluído com Sucesso") {
          listar(); // Atualiza a lista após exclusão
        } else {
          $("#mensagem-excluir").addClass("text-danger");
          $("#mensagem-excluir").text(mensagem);
        }
      },
    });
  }
  
  // Função para ativar ou desativar um registro
  function ativar(id, acao) {
    $.ajax({
      url: "paginas/" + pag + "/mudar-status.php",
      method: "POST",
      data: { id, acao },
      dataType: "html",
  
      success: function (mensagem) {
        if (mensagem.trim() == "Alterado com Sucesso") {
          listar(); // Atualiza a lista após alteração de status
        } else {
          $("#mensagem-excluir").addClass("text-danger");
          $("#mensagem-excluir").text(mensagem);
        }
      },
    });
  }
  