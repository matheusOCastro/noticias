<?php
require_once 'conexao.php'; 
$conexao = new Conexao(DB_SERVER, DB_NAME, DB_USERNAME, DB_PASSWORD);
$arraySituacao = array();
$qualAux = array();
$arrayQualidade = array();



    
    $query = "select situacao, count(situacao) as total from poco group by situacao";

    if ($result = mysqli_query($conexao->conn, $query)) {
        /* fetch associative array */
        while ($row = mysqli_fetch_assoc($result)) {
            array_push($arraySituacao, $row["total"]);
        }
        mysqli_free_result($result);
    }
    $array_grafico_pie = implode("|", $arraySituacao);



    
    $humano = 'select count(*) as total, p.utme, p.utmn, p.latitudese, p.longitudes, p.situacao, p.profundidade, p.uso_agua,

                        q.alcalinidade, q.bicarbonatos, q.calcio, q.carbonatos, q.cloretos, q.condutividade_eletrica,
                        q.data, q.dureza, q.fluor, q.magnesio, q.ph, q.potassio, q.responsavel, q.sodio, 
                        q.solidos_tot_dissolvidos, q.sulfatos, q.temperatura,

                        c.cap_especifica, c.niveldinamico, c.nivelestatico, c.vazao_estabilizacao

                    from poco as p
                        left join  qualidade_agua as q
                                on p.utme = q.poco_utme and p.utmn = q.poco_utmn
                        left join  capacidade_poco as c
                        on p.utme = c.poco_utme and p.utmn = c.poco_utmn
                            where q.sodio <= 200 and q.cloretos <= 250 and q.fluor <= 1.5
                            and q.ph >= 6 and q.ph <= 9.5 and q.sulfatos <= 250 and q.dureza <= 500
                            and q.solidos_tot_dissolvidos <= 1000'; 
    
    $animais = 'select count(*) as total, p.utme, p.utmn, p.latitudese, p.longitudes, p.situacao, p.profundidade, p.uso_agua,

                        q.alcalinidade, q.bicarbonatos, q.calcio, q.carbonatos, q.cloretos, q.condutividade_eletrica,
                        q.data, q.dureza, q.fluor, q.magnesio, q.ph, q.potassio, q.responsavel, q.sodio, 
                        q.solidos_tot_dissolvidos, q.sulfatos, q.temperatura,

                        c.cap_especifica, c.niveldinamico, c.nivelestatico, c.vazao_estabilizacao

                    from poco as p
                        left join  qualidade_agua as q
                                on p.utme = q.poco_utme and p.utmn = q.poco_utmn
                        left join  capacidade_poco as c
                        on p.utme = c.poco_utme and p.utmn = c.poco_utmn
                        where q.fluor <= 2 and q.sulfatos <= 1000';
    
    $irrigacao = 'select count(*) as total, p.utme, p.utmn, p.latitudese, p.longitudes, p.situacao, p.profundidade, p.uso_agua,

                        q.alcalinidade, q.bicarbonatos, q.calcio, q.carbonatos, q.cloretos, q.condutividade_eletrica,
                        q.data, q.dureza, q.fluor, q.magnesio, q.ph, q.potassio, q.responsavel, q.sodio, 
                        q.solidos_tot_dissolvidos, q.sulfatos, q.temperatura,

                        c.cap_especifica, c.niveldinamico, c.nivelestatico, c.vazao_estabilizacao

                    from poco as p
                        left join  qualidade_agua as q
                                on p.utme = q.poco_utme and p.utmn = q.poco_utmn
                        left join  capacidade_poco as c
                        on p.utme = c.poco_utme and p.utmn = c.poco_utmn
                        where q.cloretos >= 100 and q.cloretos <= 700 and q.fluor <= 1';
    
    $recreacao = 'select count(*) as total, p.utme, p.utmn, p.latitudese, p.longitudes, p.situacao, p.profundidade, p.uso_agua,

                        q.alcalinidade, q.bicarbonatos, q.calcio, q.carbonatos, q.cloretos, q.condutividade_eletrica,
                        q.data, q.dureza, q.fluor, q.magnesio, q.ph, q.potassio, q.responsavel, q.sodio, 
                        q.solidos_tot_dissolvidos, q.sulfatos, q.temperatura,

                        c.cap_especifica, c.niveldinamico, c.nivelestatico, c.vazao_estabilizacao

                    from poco as p
                        left join  qualidade_agua as q
                                on p.utme = q.poco_utme and p.utmn = q.poco_utmn
                        left join  capacidade_poco as c
                        on p.utme = c.poco_utme and p.utmn = c.poco_utmn
                        where q.sodio <= 300 and q.cloretos <= 400 and q.sulfatos <= 400';
    
    if ($result = mysqli_query($conexao->conn, $humano)) {
        /* fetch associative array */
        while ($row = mysqli_fetch_assoc($result)) {
            array_push($arrayQualidade, $row["total"]);
        }
        $qualAux = $qualAux+$arrayQualidade;
        
        mysqli_free_result($result);
    }
    
    if ($result = mysqli_query($conexao->conn, $animais)) {
        /* fetch associative array */
        while ($row = mysqli_fetch_assoc($result)) {
            array_push($arrayQualidade, $row["total"]);
        }
        $qualAux = $qualAux+$arrayQualidade;
        mysqli_free_result($result);
    }
    
    if ($result = mysqli_query($conexao->conn, $irrigacao)) {
        /* fetch associative array */
        while ($row = mysqli_fetch_assoc($result)) {
            array_push($arrayQualidade, $row["total"]);
        }
        $qualAux = $qualAux+$arrayQualidade;
        mysqli_free_result($result);
    }
    
    if ($result = mysqli_query($conexao->conn, $recreacao)) {
        /* fetch associative array */
        while ($row = mysqli_fetch_assoc($result)) {
            array_push($arrayQualidade, $row["total"]);
        }
        $qualAux = $qualAux+$arrayQualidade;
        mysqli_free_result($result);
    }
    
    $array_grafico_column = implode("|", $qualAux);

/* close connection */
mysqli_close($conexao->conn); 
