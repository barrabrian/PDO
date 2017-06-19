

CREATE TABLE nota (
  idVendedor int(11) NOT NULL,
  idVenda int(11) NOT NULL,
  idProduto int(11) NOT NULL,
  Quantidade int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

 


CREATE TABLE produtos (
  idProduto int(11) NOT NULL,
  descricaoProduto varchar(50) NOT NULL,
  valorProduto float NOT NULL,
  validade date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;




CREATE TABLE venda (
  idVenda int(11) NOT NULL,
  dataVenda date NOT NULL,
  valor float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;


CREATE TABLE vendedor (
  idVendedor int(11) NOT NULL,
  nomeVendedor varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;



ALTER TABLE nota
  ADD KEY vendedor (idVendedor),
  ADD KEY idVenda (idVenda),
  ADD KEY idProduto (idProduto);



ALTER TABLE produtos
  ADD PRIMARY KEY (idProduto);

ALTER TABLE venda
  ADD PRIMARY KEY (idVenda);



ALTER TABLE vendedor
  ADD PRIMARY KEY (idVendedor);
ALTER TABLE produtos
  MODIFY idProduto int(11) NOT NULL AUTO_INCREMENT;

ALTER TABLE venda
  MODIFY idVenda int(11) NOT NULL AUTO_INCREMENT;

ALTER TABLE vendedor
  MODIFY idVendedor int(11) NOT NULL AUTO_INCREMENT;


ALTER TABLE nota
  
ADD CONSTRAINT nota_ibfk_1 FOREIGN KEY (idVenda) REFERENCES venda (idVenda),
  
ADD CONSTRAINT nota_ibfk_2 FOREIGN KEY (idProduto) REFERENCES produtos (idProduto),
  
ADD CONSTRAINT vendedor FOREIGN KEY (idVendedor) REFERENCES vendedor (idVendedor);


