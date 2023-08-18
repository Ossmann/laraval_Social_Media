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

insert into Post values (1, "Good Goal", "David Alaba", "My team mate Marco scored a fantastic goal this week. Check it out");
insert into Post values (2, "I am the best", "Marco Arnautovic", "Everyone doubted me, but I scored another belter this weekend.");

drop table if exists Like;
create table Like (
    like_id integer not null primary key autoincrement,
    post_id integer,
    user_name varchar(20),

    FOREIGN KEY (user_name) REFERENCES User (user_name),
    FOREIGN KEY (post_id) REFERENCES Post (post_id)
);

insert into Like values (1, 'Marco Arnautovic');
insert into Like values (2, 'David Alaba');

drop table if exists Comment;
create table Comment (
    comment_id integer not null primary key autoincrement,
    user_name varchar(20),
    post_id integer,
    comment_message varchar(200),
    date DATE,

    FOREIGN KEY (user_name) REFERENCES User (user_name),
    FOREIGN KEY (post_id) REFERENCES Post (post_id)
);

insert into Comment values (1, "Marco Arnautovic", 1, "Thanks for pointing it out brother");
insert into Comment values (2, "David Alaba", 2, "What a great goal my friend");

drop table if exists CommentAnswer;
create table CommentAnswer (
        answer_id integer not null primary key autoincrement,
        user_name varchar(20),
        comment_id integer,
        answer_message varchar(60),
        date DATE,

    FOREIGN KEY (user_name) REFERENCES User (user_name),
    FOREIGN KEY (comment_id) REFERENCES Comment (comment_id)
);
