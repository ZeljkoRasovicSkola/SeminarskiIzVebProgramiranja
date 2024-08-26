CREATE TABLE people(peopleID INT AUTO_INCREMENT, email VARCHAR(320), CONSTRAINT PRIMARY KEY (peopleID,email), firstname VARCHAR(32) NOT NULL, lastname VARCHAR(32) NOT NULL, phone VARCHAR(16) NOT NULL, password VARCHAR(60) NOT NULL, token VARCHAR(32) NOT NULL, status VARCHAR(16) NOT NULL DEFAULT 'pending', role VARCHAR(16) NOT NULL DEFAULT 'user');

CREATE TABLE profileImage(imageID INT PRIMARY KEY AUTO_INCREMENT, peopleID INT, status VARCHAR(16) NOT NULL DEFAULT 'empty', name VARCHAR(32) NOT NULL DEFAULT 'avatar.svg', FOREIGN KEY peopleImageLink(peopleID) REFERENCES people(peopleID));

CREATE TABLE spot(spotID INT PRIMARY KEY AUTO_INCREMENT, seat SMALLINT NOT NULL, smoke VARCHAR(8) NOT NULL DEFAULT 'no', reserved VARCHAR(8) NOT NULL DEFAULT 'no');

CREATE TABLE reservation(reservationID INT AUTO_INCREMENT, code VARCHAR(32), CONSTRAINT PRIMARY KEY (reservationID,code), peopleID INT, spotID INT, dateOfIt date NOT NULL, timeStart time NOT NULL, timeEnd time NOT NULL, status VARCHAR(16) NOT NULL DEFAULT 'active', FOREIGN KEY peopleLink(peopleID) REFERENCES people(peopleID),FOREIGN KEY spotLink(spotID) REFERENCES spot(spotID));

INSERT INTO spot(seat,smoke,reserved) VALUES (2,"no","no");
INSERT INTO spot(seat,smoke,reserved) VALUES (2,"yes","no");
INSERT INTO spot(seat,smoke,reserved) VALUES (4,"no","no");
INSERT INTO spot(seat,smoke,reserved) VALUES (4,"yes","no");
INSERT INTO spot(seat,smoke,reserved) VALUES (8,"no","no");
INSERT INTO spot(seat,smoke,reserved) VALUES (8,"yes","no");
