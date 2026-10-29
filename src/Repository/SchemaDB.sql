CREATE DATABASE 67bank;

USE 67bank;

CREATE TABLE contas(
    id BIGINT PRIMARY KEY,
    titular VARCHAR(255) NOT NULL,
    chave_pix VARCHAR(100) UNIQUE NOT NULL,
    saldo INT NOT NULL
);

CREATE TABLE transacao_pix(
    id BIGINT PRIMARY KEY,
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
(2, 'Bruno Souza', 'bruno.souza@email.com', 20000),
(3, 'Carla Dias', 'carla.dias@email.com', 150050);
