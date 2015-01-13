CREATE TABLE clubs (id INT AUTO_INCREMENT NOT NULL, referent_id INT DEFAULT NULL, name VARCHAR(100) NOT NULL, slug VARCHAR(100) NOT NULL, description VARCHAR(255) NOT NULL, logo VARCHAR(255) DEFAULT NULL, type INT NOT NULL, website VARCHAR(255) DEFAULT NULL, updated DATETIME NOT NULL, INDEX IDX_A5BD312335E47E35 (referent_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB;
CREATE TABLE club_referents (id INT AUTO_INCREMENT NOT NULL, firstname VARCHAR(50) NOT NULL, lastname VARCHAR(250) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB;
CREATE TABLE news (id INT AUTO_INCREMENT NOT NULL, title VARCHAR(100) NOT NULL, slug VARCHAR(100) NOT NULL, image VARCHAR(255) DEFAULT NULL, overview VARCHAR(255) NOT NULL, updated DATETIME NOT NULL, created DATETIME NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB;
CREATE TABLE partners (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(100) NOT NULL, logo VARCHAR(255) DEFAULT NULL, website VARCHAR(255) NOT NULL, updated DATETIME NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB;
ALTER TABLE clubs ADD CONSTRAINT FK_A5BD312335E47E35 FOREIGN KEY (referent_id) REFERENCES club_referents (id);