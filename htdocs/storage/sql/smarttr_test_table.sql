create table test_table
(
    id    int         not null
        primary key,
    title varchar(64) null,
    name  varchar(32) null,
    price int(5)      null
);

INSERT INTO smarttr.test_table (id, title, name, price) VALUES (1, '双子の帝國', 'ふたごのていこく', 300);
INSERT INTO smarttr.test_table (id, title, name, price) VALUES (2, '進撃の巨人', 'singeki', 500);
INSERT INTO smarttr.test_table (id, title, name, price) VALUES (3, 'となりの関くん', 'となりのせきくん', 50000);