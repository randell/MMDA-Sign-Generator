-- -----------------------------------------------------
-- Drop all tables
-- -----------------------------------------------------
DROP TABLE IF EXISTS posts;
-- -----------------------------------------------------
-- Table 'posts'
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS posts (
  post_id INT NOT NULL AUTO_INCREMENT ,
  message TEXT NOT NULL ,
  stamp TIMESTAMP NOT NULL ,
  post_id_hex VARCHAR(8) NOT NULL ,
  PRIMARY KEY (post_id)
)
ENGINE = MyISAM
DEFAULT CHARACTER SET = utf8
COLLATE = utf8_general_ci;