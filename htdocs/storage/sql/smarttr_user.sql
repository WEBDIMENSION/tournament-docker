create table user
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

INSERT INTO smarttr.user (id, username, email, role, password, date_created, date_modifiy, date_lastlogin) VALUES (2, 'garaccii', 'garaccii@gmail.com', 'general', '$2y$10$wy5wN9PxOmq/ZEMed.F99.uriYCJB7UCGsBYrRF.Cesgdlc6WShL2', '2019-03-07 19:02:05', '2019-03-21 17:34:38', '2019-03-07 19:02:05');
INSERT INTO smarttr.user (id, username, email, role, password, date_created, date_modifiy, date_lastlogin) VALUES (4, 'webd', 'office@webdimension.jp', 'general', '$2y$10$E7Na6ZlBnNssusxbKKvJbOfyAAHJmGStFtGw3x4lwM0N.lCaujeTi', '2019-03-18 16:11:37', '2019-04-03 14:34:01', '2019-03-18 16:11:37');
INSERT INTO smarttr.user (id, username, email, role, password, date_created, date_modifiy, date_lastlogin) VALUES (6, '', '', 'general', '$2y$10$WmvRxQIiKQdIC2EmiEvOS.LJQudntFyZwpAPRCZwdGKiuIS5r2yd2', '2019-03-21 14:38:12', '2019-03-21 16:30:34', '2019-03-21 14:38:12');
INSERT INTO smarttr.user (id, username, email, role, password, date_created, date_modifiy, date_lastlogin) VALUES (7, 'garaccii', 'garaccii@gmail.comd', 'general', '$2y$10$puLq8F5Cq0uxBOofG.qa/OHoyn8IQAjoraEXfWyDrhAXRX0F6sPjK', '2019-03-21 15:28:15', '2019-03-21 15:28:15', '2019-03-21 15:28:15');