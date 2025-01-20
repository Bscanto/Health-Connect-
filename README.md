# Health Connect - Sistema de Gestão de Prontuários para CAPSi

## Descrição do Projeto

O **Health Connect** é um sistema web desenvolvido para informatizar os prontuários físicos no Centro de Atenção Psicossocial Infantojuvenil (CAPSi). Ele tem como objetivo facilitar o gerenciamento de informações cruciais dos pacientes, promovendo um atendimento mais eficiente e organizado, além de garantir a segurança e confidencialidade dos dados.

## Funcionalidades Principais

- **Gerenciamento de Prontuários:**
  - Cadastro e atualização de informações pessoais, histórico médico e familiar dos pacientes.
- **Acesso Controlado:**
  - Níveis de permissão para profissionais de saúde, secretários e administradores.
- **Busca Avançada:**
  - Recuperação rápida e precisa de informações específicas nos prontuários.
- **Relatórios e Métricas:**
  - Geração de relatórios para acompanhamento clínico e estatísticas.
- **Segurança de Dados:**
  - Conformidade com a LGPD, incluindo criptografia e auditoria de acessos.

## Tecnologias Utilizadas

- **Frontend**:<br>
  [![](https://skillicons.dev/icons?i=html,css,bootstrap,javascript,jquery,ajax&perline=10)](https://skillicons.dev)

- **Backend**: <br>
  [![](https://skillicons.dev/icons?i=php&perline=3)](https://skillicons.dev)

- **Banco de Dados**:<br>
  [![](https://skillicons.dev/icons?i=mysql&perline=3)](https://skillicons.dev)

- **Controle de verssão**:<br>
  [![](https://skillicons.dev/icons?i=git,github&perline=3)](https://skillicons.dev)

 
## Estrutura do Sistema

### Usuários do Sistema

- **Administrador:**
  - Gerencia profissionais e gera relatórios.
- **Profissional de Saúde:**
  - Realiza atendimentos, acolhimentos e registra informações dos pacientes.
- **Secretária:**
  - Cadastra pacientes, agenda consultas e atualiza informações administrativas.
- **Paciente:**
  - Crianças e adolescentes atendidos no CAPSi, cujos dados são geridos no sistema.

### Casos de Uso

- **Cadastrar Pacientes:** Registro de informações iniciais e atualizações.
- **Gerar Relatórios:** Estatísticas de atendimentos e intervenções realizadas.
- **Consultar Prontuários:** Visualização de dados completos dos pacientes.
- **Acompanhamento Clínico:** Registro e histórico de consultas e atendimentos.

## Instalação e Configuração

 # 1. Download do XAMPP

Para rodar o **Health Connect**, é necessário instalar o XAMPP, que inclui o Apache e o MySQL. O XAMPP é uma solução completa para criar ambientes de desenvolvimento local.

### 🖥️ Como baixar o XAMPP

1.1. Acesse o site oficial do XAMPP:
   [Clique aqui para acessar o site do XAMPP](https://www.apachefriends.org/pt_br/index.html)
   
1.2. Escolha a versão adequada ao seu sistema operacional (Windows, macOS ou Linux).

1.3. Baixe e instale o XAMPP seguindo as instruções do site.

1.4. Após a instalação, inicie o Apache e o MySQL no painel de controle do XAMPP.

Agora você está pronto para configurar e rodar o sistema **Health Connect**!

# 2.  Download do Google Chrome

Para uma melhor experiência ao utilizar o **Health Connect**, recomendamos o uso do navegador **Google Chrome**, conhecido por seu desempenho e compatibilidade com aplicações web.

### 🖥️ Como baixar o Google Chrome

2.1. Acesse o site oficial do Google Chrome:
   [Clique aqui para acessar o site do Google Chrome](https://www.google.com/intl/pt-BR/chrome/)

2.2. Escolha a versão adequada ao seu sistema operacional (Windows, macOS ou Linux).

2.3. Baixe e instale o Google Chrome seguindo as instruções do site.

Com o Google Chrome instalado, você poderá acessar o **Health Connect** de maneira rápida e eficiente.

# 3. **Clone o repositório:**
   ```bash
   git clone https://github.com/Bscanto/Health-Connect-.git
   ```
3.1 Copie os arquivos do projeto para a pasta htdocs do XAMPP.


# 4. **Abra o phpMyAdmin:**

4.1 Acesse o phpMyAdmin no navegador através do endereço: http://localhost/phpmyadmin

 4.2 Crie um banco de dados chamado health.
 
 4.3 Importe o arquivo health.sql fornecido no repositório para configurar as tabelas e dados iniciais.
Configure o arquivo de conexão:

4.4  Abra o arquivo conexao.php, no editor de sua escolha.
 4.5 Atualize as credenciais do banco de dados, se necessário.

# 5. **Inicialize o Apache e o MySQL:**

5.1 No painel de controle do XAMPP, ative os serviços:

- Apache
- MySQL

  
5.2 Acesse o sistema:
No navegador, digite o endereço: http://localhost/health-conect-


##  Licença

Este projeto está sob a Licença Apache-2.0 Veja o arquivo [LICENÇA](LICENSE) para mais detalhes.
