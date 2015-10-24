<?php
//Variáveis de acesso Db
define('DB_SERVER', 'localhost'); 
define('DB_NAME', 'pocos'); 
define('DB_USERNAME', 'root'); 
define('DB_PASSWORD', '24071991'); 

//inicio da classe de conexao 
class Conexao { 
    var $db, $conn; 
    
    public function __construct($server, $database, $username, $password){ 
        $this->conn = mysqli_connect($server, $username, $password, $database, '3306', 'tcp/ip'); 
        $this->db = mysqli_select_db($this->conn,$database); 
        
        if (mysqli_connect_errno()) {
            printf("Connect failed: %s\n", mysqli_connect_error());
        exit();
        }
    }

}