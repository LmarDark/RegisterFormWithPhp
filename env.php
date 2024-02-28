<?php
session_start();
class Env{

    protected string $servername = "XXXXXXXXX";
    protected string $user = "XXXXXXXXX";
    protected string $password = "XXXXXXXXX";
    protected string $db = "XXXXXXXXX";
    protected $conn;

    public function ConnectionDB(){
        if($_SERVER['REQUEST_METHOD'] === "POST"){
            $conn = mysqli_connect($this->servername, $this->user, $this->password, $this->db);
            if ($conn) {
                if(isset($_POST["user_input"]) && ($_POST["password_input"]) && ($_POST["conpassword_input"])){
                    $user_php = $_POST["user_input"];
                    $password_php = $_POST["password_input"];
                    $confirm_password_php = $_POST["conpassword_input"];

                    if($password_php === $confirm_password_php){
                        $hash_pass = password_hash($password_php, PASSWORD_DEFAULT);
                        
                        $register_sql = "INSERT INTO test(user, password) VALUES('$user_php', '$hash_pass')";
                        
                        if(mysqli_query($conn, $register_sql)){
                            echo "Dados cadastrados com sucesso!";
                        } else {
                            echo "Erro ao cadastrar usuário!";
                        };

                    }
                }
            }
        }
    }
}

?>
