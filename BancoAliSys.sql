drop database if exists alisys;
create database alisys;
use alisys;
create table categoria(
	codigo    int auto_increment primary key,
    descricao varchar(50) not null
);
create table unidade(
	codigo    int auto_increment primary key,
    descricao varchar(50) not null
);
create table fornecedor(
	codigo    int auto_increment not null,
    nomefant  varchar(50) ,
    cnpj      varchar(20) not null,
    razsocial varchar(50) not null,
    vendedor  varchar(50),
    email     varchar(50),
    telefone  varchar(10) not null,
    uf        varchar(2),
    cidade    varchar(50),
    rua       varchar(50),
    numero    int,
    primary key (codigo)
);
create table compra(
	codigo            int not null,
    valortotal        double ,
    datapag           date,
    fornecedor_codigo int,
    nnota             varchar(50) not null ,
    foreign key (fornecedor_codigo) 
    references fornecedor(codigo),
    primary key (codigo)
);
create table produto(
	codigo          int not null,
    descricao       varchar(50) not null,
    precovenda      double not null,
    cod_unidade     int,
    fabricante      varchar(20),
    quantidade      int DEFAULT NULL,
    categoria_codigo int,
    primary key (codigo),
    foreign key (categoria_codigo) references categoria(codigo),
    foreign key (cod_unidade) references unidade(codigo)
);
create table itemCompra(
	codigoitem		  int not null,
	codigocompra      int not null,
    produto_codigo    int not null,
    quantidade        int not null,
    valor			  double not null,
    foreign key (codigocompra) references compra (codigo),
    foreign key (produto_codigo) references produto (codigo),
    primary key (codigoitem, codigocompra)
);  
create table despesa(
	codigo        int auto_increment,
    descricao     varchar(45) not null,
    valor         double not null,
    datapag       date not null,
    tipo_despesa  varchar(50),
    
    primary key (codigo)
);


create table usuario(
	codigo       int auto_increment primary key,
    nome         varchar(50) not null,
    cpf          varchar(20) not null,
    rg           varchar(20) not null,
    estcivil     varchar(20) not null,
    datanasc     date        not null,
    tipous       varchar(20) not null,
    uf           varchar(2)  not null,
    cidade       varchar(50),
    rua          varchar(50),
    numero       int ,
    email        varchar(60),
    telefone     varchar(20),
    senha        varchar(100) not null
);
create table venda(
	codigo                   int auto_increment primary key not null,
    usuario_codigo           int,
    datavenda                date not null,
    desconto			     double,
    valorpago                double,
    foreign key (usuario_codigo) references usuario(codigo)
);
create table itemVenda(
	codigoitem 		int not null,
	codigovenda 	int not null,
    quantidade 		int not null,
    produto_codigo  int not null,
    valor 			double not null,
    foreign key (codigovenda) references venda(codigo),
    foreign key (produto_codigo) references produto(codigo),
    primary key (codigoitem, codigovenda)
);

insert into categoria (descricao)
			value("Condimento"), ("Fit"), ("Bebidas"), ("Tempero");
                    
insert into unidade (descricao)
			value("unidade"), 
						 ("granel");

insert into produto (descricao, precovenda, cod_unidade, fabricante, codigo, quantidade, categoria_codigo)
			value("Molho de Pimenta", 10.0, 1, "Lucas condimentos", 1, 30, 1),
                         ("Mostarda em grãos", 5.50, 2, "Lucas condimentos", 2, 45, 1),
                         ("Óleo de coco", 25.0, 1, "Fit Brasil", 3, 10, 2),
                         ("Água mineral", 2.50, 1, "Bebidas e cia", 4, 25, 3),
                         ("Sal do Himalaia", 25.00, 2, "Lucas condimentos", 5, 15, 4),
                         ("SSuco de Laranja", 5.00, 1, "Coca-Cola", 6, 0, 3);
                         
insert into fornecedor (nomefant, cnpj, razsocial, vendedor, email, telefone, uf, cidade, rua, numero)
					value("Bebidas e Cia", "123654789", "Bebidas e Companhia", "Marcelo Tavares","bebidascia@gmail.com", "32815496", "SP", "Osasco", "Porto Belo", 923),
						 ("Fit Brasil", "753612489", "Fit Brasil", "Carla Oliveira","fitbra@gmail.com", "32811562", "SC", "Portolândia", "Almeida Campos", 878),
						 ("Lucas condimentos", "1452957832", "Lucas condimentos", "Lucas Ferreira","condimetoslucas@gmail.com", "32811598", "RJ", "Rio de Janeiro", "José Caldas", 156),
                         ("Fale Fornecedores", "145295445", "Fornecedores Fornecimentos", "Marcos Maria","condimetos@gmail.com", "32811598", "RJ", "Rio de Janeiro", "José Silva", 2000);
                         
insert into compra (codigo, valortotal, datapag, fornecedor_codigo, nnota)
					value(1, 125.00, '2016-10-25', 1, "156454"),
						 (2, 250.00, '2016-11-17', 2, "112314"),
                         (3, 25.00, '2010-11-25', 3, "1185758");
                         
insert into itemcompra (codigoitem, codigocompra, produto_codigo, quantidade, valor)
					value(1, 1, 1, 5, 50.00),
						 (2, 1, 3, 3, 75.00),
                         (3, 2, 5, 6, 150.00),
                         (4, 2, 3, 4, 100.00),
                         (5, 3, 4, 10, 25.00);
                         
insert into despesa (descricao, valor, tipo_despesa, datapag)
					value("conta de energia", 520.00, "Fixa",'2016-10-11'),
						 ("lâmpada", 20.00, "Adicional", '2016-09-08'),
                         ("conta de água", 420.00,"Fixa", '2015-12-08');

insert into usuario(nome, cpf, rg, estcivil, datanasc, tipous, uf, cidade, rua, numero, email, telefone, senha)
			value("Jorge Amado", 987654321, 12365478965412, "casado", '1995-05-25', "comum", "SP", "São Paulo","laranja da feira", 286, "jorginhotriste@gmail.com", 32518898, 12345);