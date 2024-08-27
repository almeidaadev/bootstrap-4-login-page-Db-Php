<?php

class Form {
    private $mysqli;

    public function __construct($HOST, $USER, $PASS, $DBSA)
    {
        $this->mysqli = new mysqli($HOST, $USER, $PASS, $DBSA);
        $this->verifyConnectDb();
    }

    private function verifyConnectDb()
    {
        if ($this->mysqli->connect_error) {
            die("Error " . $this->mysqli->connect_error);
        }
    }

    public function register()
    {
        if (isset($_POST["submit"])) {
            $name = $_POST["name"];
            $email = $_POST["email"];
            $password = $_POST["password"];

            $sql = "INSERT INTO login (name, email, password) VALUES ('$name', '$email', '$password')";
            $result = $this->mysqli->query($sql);

            if ($result) {
                header("Location: registerOkPage.php");
                die();  
            } else {
                echo "Deu merda";
            }
        }
    }
    
    public function login()
    {
        if (isset($_POST["submit"])) {
            $email = $_POST["email"];
            $password = $_POST["password"];

            $sql = "SELECT * FROM login WHERE email='$email' AND password='$password'";

            $result = $this->mysqli->query($sql);

            if ($result) {
                header("Location: loginOkPage.php");
                die();   
            } else {
                echo "Deu merda no login";
            }
        }
    }
}