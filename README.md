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

![HTML5](https://img.shields.io/badge/HTML5-orange?style=for-the-badge&logo=html5&logoColor=white)
![CSS3](https://img.shields.io/badge/CSS3-blue?style=for-the-badge&logo=css3&logoColor=white)
![Bootstrap](https://img.shields.io/badge/Bootstrap-purple?style=for-the-badge&logo=bootstrap&logoColor=white)
![JavaScript](https://img.shields.io/badge/JavaScript-yellow?style=for-the-badge&logo=javascript&logoColor=white)
![JQuery](https://img.shields.io/badge/JQuery-blue?style=for-the-badge&logo=jquery&logoColor=white)
![Ajax](https://img.shields.io/badge/Ajax-blue?style=for-the-badge&logo=javascript&logoColor=white)
![PHP](https://img.shields.io/badge/PHP-purple?style=for-the-badge&logo=php&logoColor=white)
![MySQL](https://img.shields.io/badge/MySQL-blue?style=for-the-badge&logo=mysql&logoColor=white)
![XAMPP](https://img.shields.io/badge/XAMPP-orange?style=for-the-badge&logo=xampp&logoColor=white)


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

1. **Pré-requisitos:**
   - PHP 7.4 ou superior.
   - MySQL 5.7 ou superior.
   - Servidor web (Apache ou similar).
   - Composer (para gerenciamento de dependências PHP).

2. **Passos de instalação:**
   - Clone o repositório:
     ```bash
     git clone https://github.com/seuprojeto/health-connect.git
     ```
   - Configure as variáveis de ambiente no arquivo `.env` (credenciais do banco de dados, configurações do sistema).
   - Execute as migrações do banco de dados:
     ```bash
     php artisan migrate
     ```
   - Inicie o servidor local:
     ```bash
     php -S localhost:8000
     ```

## Testes

O sistema utiliza **PHPUnit** para validação de funcionalidades e integridade de dados.

- Para executar os testes:
  ```bash
  phpunit
