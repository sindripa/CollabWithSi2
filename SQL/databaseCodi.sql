<<<<<<< HEAD
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
    P_url varchar(15) not null,
    P_upp int default 0,
    P_date DATETIME default CURRENT_TIMESTAMP,
    U_id int not null,
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

select P_title, P_url, P_upp, P_id from Post where P_id < :range ORDER BY P_id DESC limit 8 /*:range is the id of the last loaded post*/


delimiter ☺
create trigger VotingHandler
    after insert on Votes
        update Post
        set P_upp = (select P_upp from Post where P_id = new.P_id)+new.V_value;
        where P_id = new.P_id;
delimiter ;

delimiter ☺
create trigger VotingHandler
    before delete on Votes
    update Post
        set P_upp = (select P_upp from Post where P_id = old.P_id)-old.V_value;
        where P_id = old.P_id;
delimiter ;

delimiter ☺
create trigger VotingHandler
    before insert on Votes


delimiter ;

DELIMITER ☺
CREATE PROCEDURE fetchPosts (IN post_id INT, IN User_id INT)
BEGIN 
create TEMPORARY table TempVotes as select Votes.V_value, Votes.U_id, Votes.P_id from Votes where Votes.U_id=User_id;
        select Post.P_title, Post.P_url, Post.P_upp, Post.P_id, TempVotes.V_value , TempVotes.U_id
        from Post 
        left join TempVotes on Post.P_id=TempVotes.P_id
        where Post.P_id < post_id
        ORDER BY Post.P_id DESC 
        limit 8;
END; ☺
 DELIMITER ;
 call fetchPosts(8,1);
drop PROCEDURE fetchPosts;
=======
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
    P_url varchar(15) not null,
    P_upp int default 0,
    P_date DATETIME default CURRENT_TIMESTAMP,
    U_id int not null,
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

select P_title, P_url, P_upp, P_id from Post where P_id < :range ORDER BY P_id DESC limit 8 /*:range is the id of the last loaded post*/


delimiter ☺
create trigger VotingHandler
    after insert on Votes
        update Post
        set P_upp = (select P_upp from Post where P_id = new.P_id)+new.V_value;
        where P_id = new.P_id;
delimiter ;

delimiter ☺
create trigger VotingHandler
    before delete on Votes
    update Post
        set P_upp = (select P_upp from Post where P_id = old.P_id)-old.V_value;
        where P_id = old.P_id;
delimiter ;

delimiter ☺
create trigger VotingHandler
    before insert on Votes


delimiter ;
>>>>>>> 5708598b7f3adc6f32286dafeee842045a05769b
