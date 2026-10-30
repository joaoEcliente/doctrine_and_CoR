# Sistema de Pagamento PIX 'Fictício'

## Sobre o Projeto

Este projeto consiste no desenvolvimento de um sistema de realização de pagamentos via **PIX**, utilizando PHP e Doctrine ORM para gerenciar as operações e a persistência dos dados.

O principal objetivo é desenvolver uma aplicação com código organizado, de fácil manutenção e seguindo boas práticas de desenvolvimento de software, aplicando conceitos de **Clean Code** e padrões de projeto.

## Tecnologias Utilizadas

- **PHP** — Linguagem principal utilizada no desenvolvimento.
- **Doctrine ORM** — Mapeamento objeto-relacional e gerenciamento das entidades.
- **MySQL** — Banco de dados relacional para armazenamento das informações.
- **Chain of Responsibility (CoR)** — Padrão de projeto utilizado para organizar e estruturar o fluxo de processamento dos pagamentos.
- **XML Mapping** — Mapeamento das entidades e seus relacionamentos com o banco de dados.

## Como executar:
### 1. Instalação do Banco De Dados
Entrar no MySql e executar a sequência de comandos abaixo:
```
    CREATE DATABASE 67bank;

    USE 67bank;

    CREATE TABLE contas(
        id BIGINT PRIMARY KEY AUTO_INCREMENT,
        titular VARCHAR(255) NOT NULL,
        chave_pix VARCHAR(100) UNIQUE NOT NULL,
        saldo INT NOT NULL
    );

    CREATE TABLE transacao_pix(
        id BIGINT PRIMARY KEY AUTO_INCREMENT,
        conta_origem_id BIGINT,
        conta_destino_id BIGINT,
        valor INT NOT NULL,
        status ENUM('T', 'F') NOT NULL,
        data_Pix DATETIME DEFAULT CURRENT_TIMESTAMP
    );

    ALTER TABLE transacao_pix ADD CONSTRAINT fk_conta_origem FOREIGN KEY (conta_origem_id) REFERENCES contas(id);
    ALTER TABLE transacao_pix ADD CONSTRAINT fk_conta_destino FOREIGN KEY (conta_destino_id) REFERENCES contas(id);

    INSERT INTO contas (id, titular, chave_pix, saldo) VALUES
    (1, 'Ana Silva', 'ana.silva@email.com', 50000),
    (2, 'Bruno Souza', 'bruno.souza@email.com', 0),
    (3, 'Carla Dias', 'carla.dias@email.com', 10000);

    valor INT NOT NULL,
    status ENUM('T', 'F') NOT NULL,
``` 

## 2. Clonar o repositório:
```
    $ git clone git@github.com:joaodamasio22/doctrine_and_CoR.git 
```

## 3. Instalar as bibliotecas:
```
    $ composer install
```

## 4. Declarar valor:
 Entrar dentro de ```src/Services/KeyChain.php```, e declarar os valores que você deseja em  ```$dados = [...]```, ```$dados['valor']```está em formato de centavos, portanto, digite  o valor e os centavos para não ter conflito de valores.

## 5. Agora é so executar, lembre-se de estar na raíz do projeto, para poder executar:
```
    $ php index.php
```

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
