CREATE TABLE shopping_list_item (
  id MEDIUMINT NOT NULL AUTO_INCREMENT,
  name VARCHAR(255) NOT NULL,
  description VARCHAR(255),
  inQueque TINYINT(1) NOT NULL DEFAULT 1,
  purchased TINYINT(1) NOT NULL DEFAULT 0,
  PRIMARY KEY (id));


CREATE TABLE shopping_list_category (
  id MEDIUMINT NOT NULL AUTO_INCREMENT,
  name VARCHAR(255) NOT NULL,
  PRIMARY KEY (id));


CREATE TABLE shopping_list_item_category (
  id MEDIUMINT NOT NULL AUTO_INCREMENT,
  item_id MEDIUMINT NOT NULL,
  category_id MEDIUMINT NOT NULL,
  PRIMARY KEY (id));


INSERT INTO shopping_list_item (name, description) VALUES ('Oranges', 'Type of fruit');
INSERT INTO shopping_list_item (name, description) VALUES ('Cucumber', 'A vegetable');

