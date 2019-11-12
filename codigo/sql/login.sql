/* https://mariadb.com/kb/en/library/documentation/ */
/* databasea sortu */
CREATE DATABASE IF NOT EXISTS login;

use login;

CREATE TABLE IF NOT EXISTS users (
    user VARCHAR(50) NOT NULL PRIMARY KEY,
    pass VARCHAR(250)
);

/* insert */
/* root: Pass */
INSERT INTO users (user, pass)
VALUES ('root', '$2y$10$PJ.hHKXwUvqrtClKrHtNKOpGW1WlcMldWZhVQDuhh5ZS/XXqTeHw.'); 
