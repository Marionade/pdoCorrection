use kaamelott;

CREATE TABLE story (
  id INT NOT NULL AUTO_INCREMENT,
  title VARCHAR(255),
  content TEXT,
  author VARCHAR(100),
  PRIMARY KEY (id)
);