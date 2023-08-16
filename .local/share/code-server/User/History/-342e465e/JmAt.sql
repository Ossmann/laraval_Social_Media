drop table if exists User;
create table User (    
    user_name varchar(20) primary key       
); 

insert into User values ("David Alaba");
insert into User values ("Marco Arnautovic");
insert into User values ("Neymar");

create table Post (    
    post_id int not null primary key auto_increment,
    post_title varchar(25),
    user_name  varchar(20),
    message varchar(200),

    FOREIGN KEY (user_name) REFERENCES User(user_name)
);

insert into Post values (1, "Good Goal", "David Alaba", "My team mate Marco scored a fantastic goal this week. Check it out");
insert into Post values (2, "I am the best", "Marco Arnautovic", "Everyone doubted me, but I scored another belter this weekend.");

