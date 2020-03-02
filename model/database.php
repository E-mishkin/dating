<?php
/*
   CREATE TABLE IF NOT EXISTS `member` (
  `member_id` INT NOT NULL AUTO_INCREMENT,
  `fname` VARCHAR(30) NULL,
  `lname` VARCHAR(30) NULL,
  `age` INT NULL DEFAULT CURRENT_TIMESTAMP,
  `gender` VARCHAR(30) NULL,
  `phone` VARCHAR(30) NULL,
  `email` VARCHAR(45) NULL,
  `state` VARCHAR(2) NULL,
  `seeking` VARCHAR(45) NULL,
  `bio` VARCHAR(200) NULL,
  `premium` TINYINT(2) NULL,
  `image` VARCHAR(45) NULL,
  PRIMARY KEY (`member_id`));

   CREATE TABLE IF NOT EXISTS `interest` (
  `interest_id` INT NOT NULL AUTO_INCREMENT,
  `interest` VARCHAR(255) NULL,
  `type` VARCHAR(45) NULL,
  PRIMARY KEY (`interest_id`))
 */

require_once ("config-dating.php");

class Database
{
    //PDO object
    private $_dbh;

    function __construct()
    {
        try {
            //Create a new PDO connection
            $this->_dbh =  new PDO(DB_DSN, DB_USERNAME, DB_PASSWORD);
            //echo "Connected!";
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }

}