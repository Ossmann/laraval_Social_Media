drop table if exists User;
create table User (    
    user_name varchar(20) primary key       
); 

insert into User values ("David Alaba");
insert into User values ("Marco Arnautovic");
insert into User values ("Neymar");

drop table if exists Post;
create table Post (    
    post_id integer not null primary key autoincrement,
    post_title varchar(25),
    user_name  varchar(20),
    message varchar(200),
    date DATE,

    FOREIGN KEY (user_name) REFERENCES User(user_name)
);

insert into Post values (1, "Good Goal", "David Alaba", "My team mate Marco scored a fantastic goal this week. Check it out", '2023-01-12');
insert into Post values (2, "I am the best", "Marco Arnautovic", "Everyone doubted me, but I scored another belter this weekend.", '2023-01-12');

drop table if exists Like;
create table Like (
    post_id integer,
    user_name varchar(20),

    PRIMARY KEY (post_id, user_name),
    FOREIGN KEY (user_name) REFERENCES User (user_name),
    FOREIGN KEY (post_id) REFERENCES Post (post_id)
);

insert into Like values (1, 'Marco Arnautovic');
insert into Like values (2, 'David Alaba');

drop table if exists Comment;
create table Comment (
    comment_id integer not null primary key autoincrement,
    comment_parent_id integer,
    user_name varchar(20),
    post_id integer,
    comment_message varchar(200),
    date DATE,

    FOREIGN KEY (comment_parent_id) REFERENCES Comment (comment_id),
    FOREIGN KEY (user_name) REFERENCES User (user_name),
    FOREIGN KEY (post_id) REFERENCES Post (post_id)
);

insert into Comment values (1, null, "Marco Arnautovic", 1, "Thanks for pointing it out brother", '2012-01-12');
insert into Comment values (2, null, "David Alaba", 2, "What a great goal my friend", '2023-01-12');
insert into Comment values (3, 1, "David Alaba", 1, "Always my friend.", '2020-01-12');
insert into Comment values (5, 3, "Neymar", 1, "Next time I will join.", '2023-01-12');
insert into Comment values (4, 2, "Marco Arnautovic", 2, "Thanks. I can teach you how to do it.", '2023-01-12');
