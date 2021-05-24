CREATE TABLE repository(
    rid int(10) not null primary key auto_increment,
    reponame varchar(100) not null,
    description text,
    accessLevel varchar(100) not null
)