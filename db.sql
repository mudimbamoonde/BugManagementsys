CREATE TABLE repository(
    rid int(10) not null primary key auto_increment,
    reponame varchar(100) not null,
    description text,
    accessLevel varchar(100) not null
)

CREATE TABLE issues(
    issueID int(10) not null primary key auto_increment,
    issueName varchar(200) not null,
    status enum('active','resolved') default "active" not null,
    rid int(10) not null,
    foreign key (rid) references repository(rid)
);

CREATE TABLE assignedissues(
    assignedID int(10) not null primary key auto_increment,
    issueName varchar(200) not null,
    description varchar(200) not null,
    issueID int(10) not null,
    foreign key (issueID) references issues(issueID)
);