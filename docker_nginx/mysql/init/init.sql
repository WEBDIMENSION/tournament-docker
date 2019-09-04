USE laravel;
create table inittes
(
    id             INT(10) auto_increment
        primary key,
    username       VARCHAR(50)                            not null,
    email          VARCHAR(255)                           null,
    role           VARCHAR(50)                            not null,
    password       VARCHAR(255)                           null,
    constraint email
        unique (email)
);
