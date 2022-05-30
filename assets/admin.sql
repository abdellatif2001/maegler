CREATE TABLE phone_tab_reviews (
    idp int(5) AUTO_INCREMENT PRIMARY KEY,
    title VARCHAR(50),
    descrip text,
    price VARCHAR(10),
    marque VARCHAR(20),
    modele VARCHAR(20),
    etat VARCHAR(10),
    capacity VARCHAR(5),
    id int(7) NOT NULL,
    image text DEFAULT NULL,
    location text DEFAULT NULL,
    likes int(11) DEFAULT NULL,
    status VARCHAR(20),
    CONSTRAINT fk14 FOREIGN KEY(id) REFERENCES maegler.users(id)
);
CREATE TABLE tele_reviews (
    idt int(5) AUTO_INCREMENT PRIMARY KEY,
    title VARCHAR(50),
    descrip text,
    price VARCHAR(10),
    etat VARCHAR(10),
    nb_pouce int(3),
    id int(7) NOT NULL,
    image text DEFAULT NULL,
    location text DEFAULT NULL,
    likes int(11) DEFAULT NULL,
    status VARCHAR(20),
    CONSTRAINT fk15 FOREIGN KEY(id) REFERENCES maegler.users(id)
);
CREATE TABLE pc_reviews (
    idpc int(5) AUTO_INCREMENT PRIMARY KEY,
    title VARCHAR(50),
    descrip text,
    price VARCHAR(10),
    marque VARCHAR(20),
    proce VARCHAR(20),
    etat VARCHAR(10),
    ram VARCHAR(10),
    capacity VARCHAR(5),
    id int(7) NOT NULL,
    image text DEFAULT NULL,
    location text DEFAULT NULL,
    likes int(11) DEFAULT NULL,
    status VARCHAR(20),
    CONSTRAINT fk16 FOREIGN KEY(id) REFERENCES maegler.users(id)
);
CREATE TABLE cars_reviews (
    idcar int(5) AUTO_INCREMENT PRIMARY KEY,
    title VARCHAR(50),
    descrip text,
    price VARCHAR(10),
    marque VARCHAR(20),
    modele VARCHAR(20),
    ann_mod int(5),
    klm VARCHAR(10),
    carburant VARCHAR(10),
    puss VARCHAR(5),
    boite VARCHAR(10),
    nb_porte int(1),
    origine VARCHAR(10),
    conducteur VARCHAR(15),
    etat VARCHAR(10), 
    id int(7) NOT NULL,
    image text DEFAULT NULL,
    location text DEFAULT NULL,
    likes int(11) DEFAULT NULL,
    status VARCHAR(20),
    CONSTRAINT fk17 FOREIGN KEY(id) REFERENCES maegler.users(id)
);
CREATE TABLE moto_reviews (
    idm int(5) AUTO_INCREMENT PRIMARY KEY,
    title VARCHAR(50),
    descrip text,
    price VARCHAR(10),
    ann_mod int(5),
    klm VARCHAR(10),
    cyln VARCHAR(10),
    nb_whell VARCHAR(5),
    origine VARCHAR(10),
    conducteur VARCHAR(15),
    etat VARCHAR(10), 
    id int(7) NOT NULL,
    image text DEFAULT NULL,
    location text DEFAULT NULL,
    likes int(11) DEFAULT NULL,
    status VARCHAR(20),
    CONSTRAINT fk18 FOREIGN KEY(id) REFERENCES maegler.users(id)
);
CREATE TABLE bike_reviews (
    idb int(5) AUTO_INCREMENT PRIMARY KEY,
    title VARCHAR(50),
    descrip text,
    price VARCHAR(10),
    marque VARCHAR(10),
    etat VARCHAR(10), 
    id int(7) NOT NULL,
    image text DEFAULT NULL,
    location text DEFAULT NULL,
    likes int(11) DEFAULT NULL,
    status VARCHAR(20),
    CONSTRAINT fk19 FOREIGN KEY(id) REFERENCES maegler.users(id)
);
CREATE TABLE appartement_reviews (
    idappartement int(5) AUTO_INCREMENT PRIMARY KEY,
    title VARCHAR(50),
    descrip text,
    price VARCHAR(10),
    nb_chambre int(2),
    nb_salle_bain int(2),
    nb_sallon int(2),
    surface VARCHAR(10),
    etage VARCHAR(2),
    id int(7) NOT NULL,
    image text DEFAULT NULL,
    location text DEFAULT NULL,
    likes int(11) DEFAULT NULL,
    status VARCHAR(20),
    CONSTRAINT fk20 FOREIGN KEY(id) REFERENCES maegler.users(id)
);
CREATE TABLE maison_reviews (
    idmaison int(5) AUTO_INCREMENT PRIMARY KEY,
    title VARCHAR(50),
    descrip text,
    price VARCHAR(10),
    nb_chambre int(2),
    nb_salle_bain int(2),
    nb_sallon int(2),
    surface VARCHAR(10),
    nb_etage VARCHAR(2),
    id int(7) NOT NULL,
    image text DEFAULT NULL,
    location text DEFAULT NULL,
    likes int(11) DEFAULT NULL,
    status VARCHAR(20),
    CONSTRAINT fk21 FOREIGN KEY(id) REFERENCES maegler.users(id)
);
CREATE TABLE clothe_reviews (
    idclothe int(5) AUTO_INCREMENT PRIMARY KEY,
    title VARCHAR(50),
    descrip text,
    price VARCHAR(10),
    etat VARCHAR(10),
    gender VARCHAR(8),
    id int(7) NOT NULL,
    image text DEFAULT NULL,
    location text DEFAULT NULL,
    likes int(11) DEFAULT NULL,
    status VARCHAR(20),
    CONSTRAINT fk22 FOREIGN KEY(id) REFERENCES maegler.users(id)
);
CREATE TABLE shoes_reviews (
    idshoes int(5) AUTO_INCREMENT PRIMARY KEY,
    title VARCHAR(50),
    descrip text,
    price VARCHAR(10),
    etat VARCHAR(10),
    taille VARCHAR(10),
    gender VARCHAR(8),
    id int(7) NOT NULL,
    image text DEFAULT NULL,
    location text DEFAULT NULL,
    likes int(11) DEFAULT NULL,
    status VARCHAR(20),
    CONSTRAINT fk23 FOREIGN KEY(id) REFERENCES maegler.users(id)
);

CREATE TABLE watches_reviews (
    idw int(5) AUTO_INCREMENT PRIMARY KEY,
    title VARCHAR(50),
    descrip text,
    price VARCHAR(10),
    etat VARCHAR(10),
    gender VARCHAR(8),
    id int(7) NOT NULL,
    image text DEFAULT NULL,
    location text DEFAULT NULL,
    likes int(11) DEFAULT NULL,
    status VARCHAR(20),
    CONSTRAINT fk24 FOREIGN KEY(id) REFERENCES maegler.users(id)
);
CREATE TABLE pets_reviews (
    idpets int(5) AUTO_INCREMENT PRIMARY KEY,
    title VARCHAR(50),
    descrip text,
    price VARCHAR(10),
    etat VARCHAR(10),
    gender VARCHAR(8),
    id int(7) NOT NULL,
    image text DEFAULT NULL,
    location text DEFAULT NULL,
    likes int(11) DEFAULT NULL,
    status VARCHAR(20),
    CONSTRAINT fk25 FOREIGN KEY(id) REFERENCES maegler.users(id)
);
CREATE TABLE user(
    id int(3) PRIMARY KEY AUTO_INCREMENT,
    nom VARCHAR(20),
    prenom VARCHAR(20),
    email VARCHAR(30),
    password VARCHAR(30)
)