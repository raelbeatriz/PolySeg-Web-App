/*Temp and Humid*/
CREATE TABLE tempData (
  id int(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
  sensor varchar(30) not null,
  value1 varchar(10),
  value2 varchar(10),
  reading_time TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
);

/*Weight*/
CREATE TABLE weightData (
  id int(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
  sensor varchar(30) not null,
  value1 varchar(10),
  value2 varchar(10),
  value3 varchar(10),
  value4 varchar(10),
  reading_time TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
);

