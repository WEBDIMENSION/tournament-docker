create table administrator
(
    id             int auto_increment
        primary key,
    username       varchar(50)                        not null,
    email          varchar(255)                       null,
    role           varchar(50)                        not null,
    password       varchar(255)                       null,
    date_created   datetime default CURRENT_TIMESTAMP not null,
    date_modifiy   datetime default CURRENT_TIMESTAMP not null on update CURRENT_TIMESTAMP,
    date_lastlogin datetime default CURRENT_TIMESTAMP not null,
    constraint email
        unique (email)
);

INSERT INTO smarttr.administrator (id, username, email, role, password, date_created, date_modifiy, date_lastlogin) VALUES (1, 'garaccii', 'garaccii@gmail.com', 'administrator', '$2y$10$7Dpx0ZTrqBbAyyV9EbIKf.bRibf6zFXABKqFkL6x9/GENTdUW3coa', '2019-02-10 05:09:10', '2019-02-15 07:21:20', '2019-02-10 05:09:10');
INSERT INTO smarttr.administrator (id, username, email, role, password, date_created, date_modifiy, date_lastlogin) VALUES (4, 'ffdafdafdsfdsfd', 'garacsscii@gmal.com', 'administrator', 'password', '2019-02-10 05:31:35', '2019-02-10 06:54:30', '2019-02-10 05:31:35');