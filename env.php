<?php
session_start();
class Env{

    protected string $servername = "XXXXXXXXXXXX";
    protected string $user = "XXXXXXXXXXXX";
    protected string $password = "XXXXXXXXXXXX";
    protected string $db = "XXXXXXXXXXXX";
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
                            echo "<script>alert('Dados cadastrados com sucesso!')</script>";
                        } else {
                            echo "<script>alert('Erro ao cadastrar usuário!')</script>";
                        };

                    }
                }
            }
        }
    }
    public function log_function(){
        if($_SERVER['REQUEST_METHOD'] === "POST"){
            $conn = mysqli_connect($this->servername, $this->user, $this->password, $this->db);
            if ($conn) {
                if(isset($_POST["user_log"]) && ($_POST["password_log"])){
                    $log_user = $_POST["user_log"];
                    $log_password = $_POST["password_log"];

                    $log_sql = sprintf("SELECT * FROM test WHERE user = '%s'",
                    $conn->real_escape_string($_POST["user_log"]));

                    $result = $conn->query($log_sql);
                    $user = $result->fetch_assoc();
                    
                    if($user === null){
                        echo "<script>alert('Não encontrado nenhum usuário com este nome!')</script>";
                    } else {
                        if($user){
                            if (password_verify($_POST["password_log"], $user["password"])) {
                                $_SESSION["username"] = "$log_user";
                                echo "<script>alert('Login feito com sucesso!')</script>";
                                header("Location: home.php");
                            } else {
                                echo "<script>alert('Usuário ou senha incorretos!')</script>";
                            }
                        }
                    }
                }
            }
        }
    }
}

?>
