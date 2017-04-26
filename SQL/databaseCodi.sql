create database 0405993209_NoneGag;
use 0405993209_NoneGag;
create table Usor(
    U_id int primary key AUTO_INCREMENT,
    U_email varchar(50),
    U_name varchar(50),
    U_password varchar(70)
);
create table Post
(
    P_id int primary key AUTO_INCREMENT,
    P_title varchar(128),
    P_url varchar(15),
    P_upp int default 0,
    P_date DATETIME,
    U_id int,
    FOREIGN KEY (U_id) REFERENCES Usor(U_id)
);
create table Votes
(
    V_value smallint,
    U_id int,
    P_id int,
    FOREIGN KEY (U_id) REFERENCES Usor(U_id),
    FOREIGN KEY (P_id) REFERENCES Post(P_id)
);
create table Commint 
(
    C_id int primary key AUTO_INCREMENT,
    C_txt varchar(500),
    C_date DATETIME,
    U_id int,
    P_id int,
    FOREIGN KEY (U_id) REFERENCES Usor(U_id),
    FOREIGN KEY (P_id) REFERENCES Post(P_id)
);
create table Reply
(
    C_id int,
    R_txt varchar(500),
    FOREIGN KEY (C_id) REFERENCES Commint(C_id)
);