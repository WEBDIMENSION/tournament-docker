create table process
(
    id           int auto_increment
        primary key,
    event_id     int                                not null,
    process_data longtext                           null,
    match_data   longtext                           null,
    date_created datetime default CURRENT_TIMESTAMP not null,
    date_modifiy datetime default CURRENT_TIMESTAMP not null on update CURRENT_TIMESTAMP
);

