CREATE TABLE repository(
    rid int(10) not null primary key auto_increment,
    reponame varchar(100) not null,
    description text,
    accessLevel varchar(100) not null
);

CREATE TABLE issues(
    issueID int(10) not null primary key auto_increment,
    issueName varchar(200) not null,
    status enum('active','resolved') default "active" not null,
    rid int(10) not null,
    foreign key (rid) references repository(rid)
);

CREATE TABLE assignedissues(
    assignedID int(10) not null primary key auto_increment,
    description varchar(200) not null,
    issueID int(10) not null,
    userID int(10) not null,
    foreign key (issueID) references issues(issueID),
    foreign key (userID) references users(userID)
);

CREATE TABLE users(
    userID int(10) not null primary key auto_increment,
    firstName varchar(200) not null,
    lastName varchar(200) not null,
    username varchar(200) not null,
    email varchar(200) not null,
    accessLevel enum('developer','tester','admin','both') default "developer" not null,
    password varchar(200) not null
);

