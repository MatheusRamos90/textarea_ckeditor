CREATE TABLE ck_info(
  id INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
  title VARCHAR(200) NOT NULL,
  content LONGTEXT NOT NULL
)DEFAULT CHARSET utf8;

SELECT * FROM ck_info;