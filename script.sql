DROP TABLE IF EXISTS users;
DROP TABLE IF EXISTS post;
DROP TABLE IF EXISTS siteSetting;
DROP TABLE IF EXISTS media;
DROP TABLE IF EXISTS comment;
DROP TABLE IF EXISTS categorie;


CREATE TABLE users(
	id          INT NOT NULL,
	firstname        VARCHAR(25)  NOT NULL,
	lastname        VARCHAR(50)  NOT NULL,
	usersname        VARCHAR(25)  NOT NULL,
	password        VARCHAR(255)  NOT NULL,
    email VARCHAR(320) NOT NULL,
    status BOOLEAN NOT NULL,
	roles VARCHAR(10)          NOT NULL,
    createdAt TIMESTAMP,
    updatedAt TIMESTAMP,
	PRIMARY KEY (id)
);
CREATE TABLE siteSetting(
    id INT NOT NULL,
    clé INTEGER(255),
    valeur VARCHAR(255),
    createdAt TIMESTAMP,
    updatedAt TIMESTAMP,
    isDeleted BOOLEAN NOT NULL
);
CREATE TABLE post(
    id INT,
    title VARCHAR(40) NOT NULL,
    body LONGTEXT NOT NULL,
    type VARCHAR(40) NOT NULL,
    description VARCHAR(40) NOT NULL,
    slug VARCHAR(20) NOT NULL,
    published BOOLEAN NOT NULL,
    isDeleted BOOLEAN NOT NULL,
    createdAt TIMESTAMP,
    updatedAt TIMESTAMP,
    users_id int NOT NULL,
    siteSetting_id int NOT NULL,
    PRIMARY KEY (id),
    FOREIGN KEY (users_id) REFERENCES users(id),
    FOREIGN KEY (siteSetting_id) REFERENCES siteSetting(id)
);
CREATE TABLE media(
    id INT NOT NULL,
    tag VARCHAR(15) NOT NULL,
    filepath VARCHAR(100) NOT NULL,
    descriptions VARCHAR(100) NOT NULL,
    createdAt TIMESTAMP,
    updatedAt TIMESTAMP,
    isDeleted BOOLEAN NOT NULL,
    post_id INTEGER,
    FOREIGN KEY (post_id) REFERENCES post(id)
);
CREATE TABLE comment(
    id INT NOT NULL,
    commentText VARCHAR(255) NOT NULL,
    createdAt TIMESTAMP,
    updatedAt TIMESTAMP,
    post_id INTEGER,
    users_id INTEGER,
    FOREIGN KEY (post_id) REFERENCES post(id),
    FOREIGN KEY (users_id) REFERENCES users(id)
);
CREATE TABLE categorie(
    id INT NOT NULL,
    description VARCHAR(30) NOT NULL,
    createdAt TIMESTAMP,
    updatedAt TIMESTAMP,
    isDeleted BOOLEAN NOT NULL
);
