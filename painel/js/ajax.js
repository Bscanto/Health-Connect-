$(document).ready(function () {
  if(window.location.pathname.includes('/painel/consultas')){
    listarConsulta(); 
  }else{
    listar();
  }
  });

// Função para listar registros
function listar(p1, p2, p3, p4, p5, p6) {
  $.ajax({
    url: "paginas/" + pag + "/listar.php",
    method: "POST",
    data: {
      p1,
      p2,
      p3,
      p4,
      p5,
      p6
    },
    dataType: "html",

    success: function(result) {
      $("#listar").html(result);
      $("#mensagem-excluir").text("");
    },
  });
}

function listarConsulta(p1, p2, p3, p4, p5, p6) {
  $.ajax({
    url: "paginas/" + pag + "/listarConsulta.php",
    method: "POST",
    data: {
      p1,
      p2,
      p3,
      p4,
      p5,
      p6
    },
    dataType: "html",

    success: function(result) {
      $("#listarConsulta").html(result);
      $("#mensagem-excluir").text("");
    },
  });
}


  // Função para abrir modal de inserção
  function inserir() {
    $("#mensagem").text("");
    $("#titulo_inserir").text("Inserir Registro");
    $("#modalForm").modal("show");
    limparCampos();
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
          listarConsulta();

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
  