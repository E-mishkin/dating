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

  CREATE TABLE IF NOT EXISTS `member-interest` (
  `member_id` INT NOT NULL,
  `interest_id` INT NOT NULL,
  CONSTRAINT `member_id`
    FOREIGN KEY ()
    REFERENCES member.member_id (),
  CONSTRAINT `interest_id`
    FOREIGN KEY ()
    REFERENCES interest.interest_id ()
);
 */

require_once ("config-dating.php");

class Database
{
    //PDO object
    private $_dbh;

    function connect()
    {
        try {
            //Create a new PDO connection
            $this->_dbh =  new PDO(DB_DSN, DB_USERNAME, DB_PASSWORD);
            //echo "Connected!";
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }

    function getMembers()
    {
        //1. Define the query
        $sql = "SELECT * FROM member
                ORDER BY fname, lname";

        //2. Prepare the statement
        $statement = $this->_dbh->prepare($sql);

        //3. Bind the parameters

        //4. Execute the statement
        $statement->execute();

        //5. Get the result
        $result = $statement->fetchAll(PDO::FETCH_ASSOC);
        return $result;
    }

    function getMember($member_id)
    {
        //1. Define the query
        $sql = "SELECT * FROM member-interest
                WHERE member.member_id = member-interest.member_id
                AND member_id = :member_id";

        //2. Prepare the statement
        $statement = $this->_dbh->prepare($sql);

        //3. Bind the parameters
        $statement->bindParam(':member_id', $member_id);

        //4. Execute the statement
        $statement->execute();

        //5. Get the result
        $result = $statement->fetchAll(PDO::FETCH_ASSOC);
        return $result;
    }

    function getInterests($member_id)
    {
        //1. Define the query
        $sql = "SELECT * FROM member-interest
                WHERE member.interest_id = member-interest.interest_id
                AND member_id = :member_id";

        //2. Prepare the statement
        $statement = $this->_dbh->prepare($sql);

        //3. Bind the parameters
        $statement->bindParam(':member_id', $member_id);

        //4. Execute the statement
        $statement->execute();

        //5. Get the result
        $result = $statement->fetchAll(PDO::FETCH_ASSOC);
        return $result;
    }

    function insertMember($member)
    {
        //var_dump($student);

        //1. Define the query
        $sql = "INSERT INTO member (member_id, fname, lname, age, gender, phone, email, state, seeking,
                bio, premium, image)
                VALUES (:member_id, :fname, :lname, :age, :gender, :phone, :email, :state, :seeking,
                :bio, :premium, :image)";

        //2. Prepare the statement
        $statement = $this->_dbh->prepare($sql);

        //3. Bind the parameters
        $statement->bindParam(':member_id', $member->getMember_id());
        $statement->bindParam(':fname', $member->getFname());
        $statement->bindParam(':lname', $member->getLname());
        $statement->bindParam(':gender', $member->getGender());
        $statement->bindParam(':phone', $member->getPhone());
        $statement->bindParam(':email', $member->getEmail());
        $statement->bindParam(':state', $member->getState());
        $statement->bindParam(':seeking', $member->getSeeking());
        $statement->bindParam(':bio', $member->getBio());
        $statement->bindParam(':premium', $member->getPremium());
        $statement->bindParam(':image', $member->getImage());

        //4. Execute the statement
        $statement->execute();

        //Get the key of the last inserted row
        $id = $this->_dbh->lastInsertId();

    }

}