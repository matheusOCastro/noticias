<?php
//Variáveis de acesso Db
define('DB_SERVER', 'mysql.hostinger.com.br'); 
define('DB_NAME', 'u733425046_pocos'); 
define('DB_USERNAME', 'u733425046_moc'); 
define('DB_PASSWORD', '24071991'); 

//inicio da classe de conexao 
class Conexao { 
    var $db, $conn; 
    
    public function __construct($server, $database, $username, $password){ 
        $this->conn = mysqli_connect($server, $username, $password, $database); 
        $this->db = mysqli_select_db($this->conn,$database); 
        
        if (mysqli_connect_errno()) {
            printf("Connect failed: %s\n", mysqli_connect_error());
        exit();
        }
    }

}