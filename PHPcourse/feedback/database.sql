create table feeadback(
    id INT NOT NULL PRIMARY KEY  AUTO_INCREMENT ,
    name VARCHAR(100) NOT NULL , 
    email VARCHAR(100) NOT NULL , 
    body TEXT NOT NULL , 
    date DATETIME NOT NULL , 
);