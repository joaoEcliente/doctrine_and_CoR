# Sistema de Pagamento PIX

## Sobre o Projeto

Este projeto consiste no desenvolvimento de um sistema de realização de pagamentos via **PIX**, utilizando PHP e Doctrine ORM para gerenciar as operações e a persistência dos dados.

O principal objetivo é desenvolver uma aplicação com código organizado, de fácil manutenção e seguindo boas práticas de desenvolvimento de software, aplicando conceitos de **Clean Code** e padrões de projeto.

## Tecnologias Utilizadas

- **PHP** — Linguagem principal utilizada no desenvolvimento.
- **Doctrine ORM** — Mapeamento objeto-relacional e gerenciamento das entidades.
- **MySQL** — Banco de dados relacional para armazenamento das informações.
- **Chain of Responsibility (CoR)** — Padrão de projeto utilizado para organizar e estruturar o fluxo de processamento dos pagamentos.
- **XML Mapping** — Mapeamento das entidades e seus relacionamentos com o banco de dados.

## Arquitetura e Desenvolvimento

A aplicação utiliza o padrão de projeto **Chain of Responsibility (CoR)** para estruturar o processamento das transações PIX em diferentes etapas.

Essa abordagem permite separar as responsabilidades de cada operação, tornando o fluxo de pagamento mais modular, organizado e fácil de manter.

O desenvolvimento também segue princípios de **Clean Code**, priorizando:

- Separação de responsabilidades.
- Código legível e organizado.
- Baixo acoplamento entre componentes.
- Reutilização de código.
- Facilidade de manutenção e evolução.

## Objetivos do Projeto

- Desenvolver um fluxo de processamento de pagamentos PIX.
- Aplicar conceitos de Programação Orientada a Objetos (POO).
- Trabalhar com persistência de dados utilizando Doctrine ORM.
- Aplicar o padrão de projeto Chain of Responsibility.
- Aprimorar conhecimentos em arquitetura de software e boas práticas de desenvolvimento.
