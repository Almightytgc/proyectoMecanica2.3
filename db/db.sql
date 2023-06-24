create database automotriz;
use automotriz;

create table rol(
    idRol int auto_increment primary key,
    descripción varchar(20) not null
);

create table cliente(
    idCliente int auto_increment primary key,
    Nombre varchar(45) not null,
    Apellido varchar(45) not null,
    Usuario varchar(45) not null,
    Contraseña varchar(45) not null,
    modeloAuto varchar(45) not null,
    añoAuto int (4) not null,
    marcaCarro varchar(45) not null,
    idRol int, 
    foreign key (idRol) references rol(idRol)
);
    
create table mecanico(
    idMecanico int auto_increment primary key,
    Nombre varchar(45) not null,
    Apellido varchar(45) not null,
    Usuario varchar(45) not null,
    Contraseña varchar(45) not null,
    fechaNac date not null,
    salario int not null,    
    idRol int, 
    foreign key (idRol) references rol(idRol)
);

create table diagnostico(
    idDiagnostico int auto_increment primary key,
    observaciones longtext not null,
    Total float not null,
    idCliente int,
    foreign key(idCliente) references cliente(idCliente),
    
    idMecanico int,
    foreign key(idMecanico) references mecanico(idMecanico)
);

create table TipoReparaciones(
    idTipoReparaciones int auto_increment primary key,
    Elemento varchar(100) not null,
    PrecioElemento float not null,
    idDiagnostico int,
    foreign key(idDiagnostico) references diagnostico(idDiagnostico)
);