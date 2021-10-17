--------------- DATABASE - EVENT_BOOKING-------------------
CREATE DATABASE event_booking;

USE event_booking;

CREATE TABLE users_detail(
    user_id INT AUTO_INCREMENT, 
    username VARCHAR(50) NOT NULL,
    password VARCHAR(50) NOT NULL,
    name VARCHAR(50) NOT NULL,
    email VARCHAR(50) NOT NULL,
    user_type ENUM('Admin','User') NOT NULL,
    CONSTRAINT PRIMARY KEY(user_id)
);
CREATE TABLE events(
    event_id INT AUTO_INCREMENT,   
    event_name VARCHAR(50) , 
    event_image VARCHAR(50),
    CONSTRAINT PRIMARY KEY (event_id)
);
CREATE TABLE bookings(
    booking_id INT AUTO_INCREMENT, 
    event_id INT NOT NULL, 
    user_id INT NOT NULL,
    CONSTRAINT PRIMARY KEY(booking_id),
    CONSTRAINT FOREIGN KEY(event_id) REFERENCES events(event_id),
    CONSTRAINT FOREIGN KEY(user_id) REFERENCES users_detail(user_id)
);

------------- ALTER TABLE - USER_TYPE CHANGE DEFAULT --------------
ALTER TABLE users_detail
DROP COLUMN user_type;

ALTER TABLE users_detail
ADD user_type ENUM ('Admin','User') DEFAULT 'User' NOT NULL;

--------------- CREATING ADMIN AND USER -------------------
INSERT INTO users_detail(username,password, name,email,user_type) VALUE
('roeann','ra_123','Roe Ann Kim Codoy','roeannkim@gmail.com','Admin'),
('kami_genshin','cryo','Kamisato Ayaka','ayaka@email.com','User'),
('geo_mommy','geo','Ningguang','ning@email.com','User'),
('tyrant_mommy','electro','Raiden Shogun','shogun@email.com','User');