create database teste_php;
use teste_php;

create table user(
	id int primary key  not null auto_increment,
  age int(3) not null,
  Oname varchar(100) not null,
  Oemail varchar(100) not null,
  Odocument varchar(100) not null,
  Ophone varchar(100) not null,
  Obirth_day date not null
);


create table user_address(
	id_address int primary key  not null auto_increment,
  Oaddress varchar(100) not null,
  Ocity varchar(100) not null,
	Ostate varchar(100) not null,
  Odistrict varchar(100) not null,
  Odocument varchar(100) not null,
  Onumber int not null
);


