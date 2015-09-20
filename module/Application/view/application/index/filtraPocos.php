<?php
class filtraPocos {
    var $string_abandonado;
    function teste(){
                
        require_once 'conexao.php'; 
        $conexao = new Conexao(DB_SERVER, DB_NAME, DB_USERNAME, DB_PASSWORD); 

            $cordenada = array();
            $query = "SELECT latitudese, longitudes, situacao, profundidade FROM pocos where situacao = 'Abandonado'";

            if ($result = mysqli_query($conexao->conn, $query)) {

                /* fetch associative array */
                while ($row = mysqli_fetch_assoc($result)) {
                    array_push($cordenada, $row["latitudese"], $row["longitudes"], $row["situacao"], $row["profundidade"]);
                }
                mysqli_free_result($result);
            }
            $string_abandonado = implode("|", $cordenada);
            /* close connection */
            mysqli_close($conexao->conn);
    }
}
?>
<script type="text/javascript">

    var $array_js = '<?php echo $string_abandonado;?>';

</script>
