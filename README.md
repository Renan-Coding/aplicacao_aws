# Aplicação Web com AWS - Renan Reis

&nbsp;&nbsp;Este repositório contém uma aplicação web integrada a um banco de dados Amazon RDS, desenvolvida seguindo o tutorial da AWS e expandida com funcionalidades adicionais.

## Descrição do Projeto

&nbsp;&nbsp;A aplicação consiste em um servidor web Apache com PHP conectado a um banco de dados PostgreSQL hospedado no Amazon RDS. O projeto demonstra a integração entre serviços AWS e operações básicas de banco de dados.

## Estrutura do Repositório

- `/php`:  Pasta com os scripts PHP da aplicação
  - `SamplePage.php`: Página inicial da aplicação
  - `listar_produtos.php`: Página para visualizar todos os produtos cadastrados
  - `cadastrar_produto.php`: Página para adicionar novos produtos
- `create_table_produto.sql`: Script para criar a tabela de produtos
- `README.md`: Arquivo com a explicação da aplicação (esse que você está lendo!)

## Tecnologias Utilizadas

- **HTML/CSS**: Interface do usuário
- **PHP**: Utilizada para a lógica do backend
- **PostgreSQL**: Sistema de gerenciamento do Banco de Dados
- **Apache**: Servidor Web
- **Infraestrutura**: Amazon Web Services (EC2, RDS, VPC)

## Funcionalidades

- Listagem de produtos cadastrados
- Cadastro de novos produtos com os seguintes dados:
  - Nome do produto
  - Preço
  - Data de cadastro
  - Status de disponibilidade

## Configuração e Instalação

2. Configure as credenciais do banco de dados
3. Importe os scripts SQL para criar as tabelas necessárias
4. Acesse a aplicação através do endereço do servidor web (EC2 -> Public IPv4 DNS)

## Arquitetura AWS

A aplicação utiliza a arquitetura na AWS:
- Instância EC2 para o servidor web
- Instância RDS para o banco de dados
- Configuração de VPC para comunicação segura entre os serviços

## Link para o vídeo explicativo

[Clique Aqui](https://youtu.be/n-b73WCPa2E)