drop table if exists User;
create table User (    
    user_name varchar(20) not null primary key       
); 

insert into User values ("David Alaba");
insert into User values ("Marco Arnautovic");
insert into User values ("Neymar");

create table Post (    
    post_id not null int primary key autoincrement primary key;

); 