CREATE TABLE produtos (
    produto_id SERIAL PRIMARY KEY,
    nome VARCHAR(255) NOT NULL,
    preco DECIMAL(10,2) NOT NULL,
    data_cadastro DATE,
    disponivel BOOLEAN DEFAULT TRUE
);