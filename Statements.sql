create database Jongerenkansrijker;

USE Jongerenkansrijker;

create table activiteit(    
    activiteitcode INT NOT NULL AUTO_INCREMENT,
    activiteit VARCHAR(255) NOT NULL,
    primary key(activiteitcode)
);


create table instituut(
    instituutcode INT NOT NULL AUTO_INCREMENT,
    instituut VARCHAR(255) NOT NULL,
    instituuttelefoon VARCHAR(255) NOT NULL,
    primary key(instituutcode)
);

create table jongere(
    jongerecode INT NOT NULL AUTO_INCREMENT,
    roepnaam VARCHAR(255) NOT NULL,
    tussenvoegsel VARCHAR(255),
    achternaam VARCHAR(255) NOT NULL,
    inschrijfdatum DATE,
    primary key(jongerecode)
);

create table medewerker(
    medewerkercode INT NOT NULL AUTO_INCREMENT,
    username v(255) NOT NULL UNIQUE,
    password VARCHAR(255) NOT NULL,
    primary key(medewerkercode)
);

create table jongereinstituut(
    jongereinstituutcode INT NOT NULL AUTO_INCREMENT,
    jongerecode INT NOT NULL,
    instituutcode INT NOT NULL,
    startdatum DATE NOT NULL,
    primary key(jongereinstituutcode),



