<?php

class database{

    private $db_server;
    private $db_username;
    private $db_password;
    private $db_name;
    private $db_connection;

    function __construct(){
        $this->db_server = 'localhost';
        $this->db_username = 'root';
        $this->db_password = '';
        $this->db_name = 'jongerenkansrijker';

        $dsn = "mysql:host=$this->db_server;dbname=$this->db_name;charset=utf8mb4";

        $options = [
            PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
            PDO::ATTR_EMULATE_PREPARES   => false,
        ];

        try {
            $this->db_connection = new PDO($dsn, $this->db_username, $this->db_password, $options);
        } catch (\PDOException $e){
            throw new \PDOException($e->getMessage(), (int)$e->getCode());


        }


    }

    public function login($username, $password){
        $sql = "SELECT medewerkercode, medewerkergebruikersnaam, medewerkerwachtwoord
                FROM medewerker 
                WHERE medewerkergebruikersnaam = :username";


        $stmt = $this_>db_connection->prepare($sql);

        $stmt->execute([
            'username'=>$uname,
        ]);

        $result = $stmt->fetch(PDO::FETCH_ASSOC);

        if(is_array($result) && count($result) > 0){

            if($username && password_verify($password, $result['medewerkerwachtwoord'])){
                session_start();

                $_SESSION['medewerkerscode'] = $result['medewerkercode'];
                $_SESSION['medewerkersgebruiksnaam'] = $result['username'];
                $_SESSION['is_logged_in'] = true;

            
                header("location: welcome.php");

            }else
            
            { echo 'Username and/or password is incorrect. Please fix your input errors again';

            }
         }else{ 
             echo 'Username and/or password is incorrect. Please fix your input errors again';

         }
    }

    public function select($sql, $placeholders = []){
        $stmt = $this->db_connection->prepare($sql);
        $stmt->execute($placeholders);
        $result = $stmt->fetchALL(PDO::FETCH_ASSOC);

        if(!empty($result)){
            return $result;
        }
        return;
    }


    public function insert($statement, $placeholders, $location=null){
        try{
            $this->db_connection->beginTransaction();

            $stmt = $this_>db_connection=>prepare($statement);
            $stmt->execute($placeholders);

            $this->db_connection_>commit();
            if(!is_null($location)){
                header("location: $location.php");
            }
        }catch (Exception $e){
            $this->db_connection->rollback();
            throw $e;
        }
    }

    public function update_or_delete($sql, $placeholders, $location){
        try{
            $stmt = $this->db_connection->prepare($sql);
            if($stmt->execute($placeholders)){
                header("location: $location.php");
            };


        }catch(\PDOExeption) $e){
            die($e->getMessage));
        }
    }
  
}
?>