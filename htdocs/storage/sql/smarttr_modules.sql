create table modules
(
    id            int auto_increment
        primary key,
    module_name   varchar(255)                       not null,
    module_prefix varchar(50)                        null,
    date_created  datetime default CURRENT_TIMESTAMP not null,
    date_modifiy  datetime default CURRENT_TIMESTAMP not null on update CURRENT_TIMESTAMP
);

INSERT INTO smarttr.modules (id, module_name, module_prefix, date_created, date_modifiy) VALUES (1, 'tennis', 'tennis', '2019-03-09 05:50:19', '2019-03-12 16:29:49');
INSERT INTO smarttr.modules (id, module_name, module_prefix, date_created, date_modifiy) VALUES (2, 'baseball', 'baseball', '2019-03-12 15:49:47', '2019-03-12 16:29:49');