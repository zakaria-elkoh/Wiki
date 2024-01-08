CREATE DATABASE Wiki;
USE Wiki;
CREATE TABLE user (
    id INT PRIMARY KEY AUTO_INCREMENT,
    first_name VARCHAR(50),
    last_name VARCHAR(50),
    user_name VARCHAR(100),
    email VARCHAR(100),
    role_id int,
    FOREIGN KEY (role_id) REFERENCES role (id),
    password VARCHAR(255)
);
CREATE TABLE role (
    id INT PRIMARY KEY AUTO_INCREMENT,
    name VARCHAR(50)
);
CREATE TABLE wiki (
    id INT PRIMARY KEY AUTO_INCREMENT,
    title VARCHAR(255),
    image VARCHAR(255),
    description VARCHAR(255),
    content STRING,
    read_time VARCHAR(50),
    categorie_id INT,
    FOREIGN KEY (categorie_id) REFERENCES categorie(id)
);
CREATE TABLE Categorie (
    id INT PRIMARY KEY AUTO_INCREMENT,
    name VARCHAR(100)
);
CREATE TABLE Tag (
    id INT PRIMARY KEY AUTO_INCREMENT,
    name VARCHAR(100)
);
CREATE TABLE Wiki_Tag (
    Wiki_id INT,
    FOREIGN KEY (Wiki_id) REFERENCES Wiki(id),
    Tag_id INT,
    FOREIGN KEY (Tag_id) REFERENCES categorie(id)
);