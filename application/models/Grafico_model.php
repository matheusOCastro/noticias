<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Grafico_model extends CI_Model{

    public function __construct(){
        parent::__construct();
        
    }
    
    public function select(){
        return $select = 'select count(*) as total, p.utme, p.utmn, p.latitudese,p.longitudes, p.situacao, p.profundidade, p.uso_agua,
                    q.alcalinidade, q.bicarbonatos, q.calcio, q.carbonatos, q.cloretos, q.condutividade_eletrica,
                    q.data, q.dureza, q.fluor, q.magnesio, q.ph, q.potassio, q.responsavel, q.sodio, 
                    q.solidos_tot_dissolvidos, q.sulfatos, q.temperatura,
                    c.cap_especifica, c.niveldinamico, c.nivelestatico, c.vazao_estabilizacao 
                    from poco as p
                        left join  qualidade_agua as q
                                on p.utme = q.poco_utme and p.utmn = q.poco_utmn
                        left join  capacidade_poco as c
                        on p.utme = c.poco_utme and p.utmn = c.poco_utmn ';
    }
    
    public function consGraficoSituacao(){
        $query = "select situacao, count(situacao) as total from poco group by situacao";
        $arraySituacao = array();
        
        if ($result = mysqli_query($this->db->conn_id, $query)) {
        /* fetch associative array */
            while ($row = mysqli_fetch_assoc($result)) {
                array_push($arraySituacao, $row["total"]);
            }
            mysqli_free_result($result);
        }
        $pie = implode("|", $arraySituacao);
       
        return $pie;
    }
    
    public function consGraficoQualidade(){
        $arrayQualidade = array();
        $qualAux = array();
        
        $humano = $this->select()."where q.sodio <= 200 and q.cloretos <= 250 and q.fluor <= 1.5
                            and q.ph >= 6 and q.ph <= 9.5 and q.sulfatos <= 250 and q.dureza <= 500
                            and q.solidos_tot_dissolvidos <= 1000";
        
        $animais = $this->select()."where q.fluor <= 2 and q.sulfatos <= 1000";
        
        $irrigacao = $this->select()."where q.cloretos >= 100 and q.cloretos <= 700 and q.fluor <= 1";
        
        $recreacao = $this->select()."where q.sodio <= 300 and q.cloretos <= 400 and q.sulfatos <= 400";
        
        if ($result = mysqli_query($this->db->conn_id, $humano)) {
        /* fetch associative array */
            while ($row = mysqli_fetch_assoc($result)) {
                array_push($arrayQualidade, $row["total"]);
            }
            $qualAux = $qualAux+$arrayQualidade;
            mysqli_free_result($result);
        }
        
        if ($result = mysqli_query($this->db->conn_id, $animais)) {
        /* fetch associative array */
            while ($row = mysqli_fetch_assoc($result)) {
                array_push($arrayQualidade, $row["total"]);
            }
            $qualAux = $qualAux+$arrayQualidade;
            mysqli_free_result($result);
        }
        
        if ($result = mysqli_query($this->db->conn_id, $irrigacao)) {
        /* fetch associative array */
            while ($row = mysqli_fetch_assoc($result)) {
                array_push($arrayQualidade, $row["total"]);
            }
            $qualAux = $qualAux+$arrayQualidade;
            mysqli_free_result($result);
        }
        
        if ($result = mysqli_query($this->db->conn_id, $recreacao)) {
        /* fetch associative array */
            while ($row = mysqli_fetch_assoc($result)) {
                array_push($arrayQualidade, $row["total"]);
            }
            $qualAux = $qualAux+$arrayQualidade;
            mysqli_free_result($result);
        }
        $column = implode("|", $qualAux);
       
        return $column;
    }

}
