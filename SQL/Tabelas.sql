/*Criar tabela PRODUTO*/

CREATE TABLE produto (
	cod_prod BIGSERIAL NOT NULL,
	nome VARCHAR(60) NOT NULL,
	descricao TEXT NOT NULL,
	preco NUMERIC(15,2) NOT NULL,
	estoque INT NOT NULL,
	excluido BOOLEAN NOT NULL DEFAULT 0,
	data_exclusao timestamp DEFAULT NULL,
	custo NUMERIC(15,2) NOT NULL,
	cod_visual TEXT NOT NULL,
	margem_lucro NUMERIC(15,2) NOT NULL,
	icms INT2 NOT NULL,
	campo_imagem VARCHAR(128) NOT NULL,
	
	CONSTRAINT produto_pk PRIMARY KEY (cod_prod)
);

/*Criar tabela USUARIO*/

/*Criar tabela CARRINHO*/

CREATE TABLE carrinho (
	cod_cart BIGSERIAL NOT NULL,
	cod_prod INT8 NOT NULL,
	cod_user INT8 NOT NULL,
	quantidade INT NOT NULL,
	
	CONSTRAINT carrinho_pk PRIMARY KEY (cod_cart),
	CONSTRAINT carrinho_produto_fk FOREIGN KEY (cod_prod) REFERENCES produto(cod_prod),
	CONSTRAINT carrinho_usuario_fk FOREIGN KEY (cod_user) REFERENCES usuario(cod_user)
);

/*Criar tabela VENDA*/

CREATE TABLE venda(
	cod_venda BIGSERIAL NOT NULL,
	cod_user INT8 NOT NULL,
	total NUMERIC(15,2) NOT NULL,
	horario TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
	
	CONSTRAINT venda_pk PRIMARY KEY (cod_venda),
	CONSTRAINT venda_usuario_fk FOREIGN KEY (cod_user) REFERENCES usuario(cod_user)
);

/*Criar Tabela ITEMVENDA*/

CREATE TABLE itemVenda (
	cod_itemvenda BIGSERIAL NOT NULL,
	cod_venda INT8 NOT NULL,
	cod_prod INT8 NOT NULL,
	quantidade INT NOT NULL,
	preco NUMERIC(15,2) NOT NULL,
	
	CONSTRAINT itemvenda_pk PRIMARY KEY (cod_itemvenda),
	CONSTRAINT itemvenda_venda_fk FOREIGN KEY (cod_venda) REFERENCES venda(cod_venda),
	CONSTRAINT itemvenda_produto_fk FOREIGN KEY (cod_prod) REFERENCES produto(cod_prod)
);

/*Extras*/

INSERT INTO produto(nome, descricao, preco, estoque, custo, cod_visual, margem_lucro, icms, campo_imagem) VALUES 
	('Copo de vidro', 'Um copo simples feito de vidro vegano', 48.90, 14, 20, 'kaoriVeganices', 29, 10, 'link2');


SELECT c.*, p.nome, p.preco, c.quantidade * p.preco AS subtotal, p.descricao, p.cod_prod
    	FROM carrinho c
        INNER JOIN produto p
        ON c.cod_prod = p.cod_prod
        WHERE c.cod_user = 1
		ORDER BY p.nome;