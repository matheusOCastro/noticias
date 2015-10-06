<?php
$_POST['bombeando'] = ( isset($_POST['bombeando']) ) ? 'checked' : null;
$_POST['abandonado'] = ( isset($_POST['abandonado']) ) ? 'checked' : null;
$_POST['nutil'] = ( isset($_POST['nutil']) ) ? 'checked' : null;
$_POST['ninstal'] = ( isset($_POST['ninstal']) ) ? 'checked' : null;

$_POST['fechado'] = ( isset($_POST['fechado']) ) ? 'checked' : null;
$_POST['precario'] = ( isset($_POST['precario']) ) ? 'checked' : null;
$_POST['obstruido'] = ( isset($_POST['obstruido']) ) ? 'checked' : null;
$_POST['colmatado'] = ( isset($_POST['colmatado']) ) ? 'checked' : null;

$_POST['parado'] = ( isset($_POST['parado']) ) ? 'checked' : null;
$_POST['seco'] = ( isset($_POST['seco']) ) ? 'checked' : null;
$_POST['equipado'] = ( isset($_POST['equipado']) ) ? 'checked' : null;
$_POST['indisp'] = ( isset($_POST['indisp']) ) ? 'checked' : null;

$_POST['humano'] = ( isset($_POST['humano']) ) ? 'checked' : null;
$_POST['animais'] = ( isset($_POST['animais']) ) ? 'checked' : null;
$_POST['irrigacao'] = ( isset($_POST['irrigacao']) ) ? 'checked' : null;
$_POST['recreacao'] = ( isset($_POST['recreacao']) ) ? 'checked' : null;

$_POST['todos'] = ( isset($_POST['todos']) ) ? 'checked' : null;






if ($_POST['bombeando'] == null && $_POST['abandonado']== null && $_POST['nutil'] == null && $_POST['ninstal']==null &&
        $_POST['fechado']==null && $_POST['precario']==null && $_POST['obstruido']==null && $_POST['colmatado']==null &&
        $_POST['parado'] == null && $_POST['seco']==null && $_POST['equipado']==null && $_POST['indisp']==null &&
        $_POST['humano'] == null && $_POST['animais']==null && $_POST['irrigacao']==null && $_POST['recreacao']==null){
    
            $_POST['todos']=true;
}

require_once 'conexao.php'; 
$conexao = new Conexao(DB_SERVER, DB_NAME, DB_USERNAME, DB_PASSWORD); 
    
    
    $cordenada = array();
    $coordAux = array();
    if ($_POST['todos'] == 'checked'){
        $query = "select p.utme, p.utmn, p.latitudese, p.longitudes, p.situacao, p.profundidade, p.uso_agua,
        
                    q.alcalinidade, q.bicarbonatos, q.calcio, q.carbonatos, q.cloretos, q.condutividade_eletrica,
                    q.data, q.dureza, q.fluor, q.magnesio, q.ph, q.potassio, q.responsavel, q.sodio, 
                    q.solidos_tot_dissolvidos, q.sulfatos, q.temperatura,

                    c.cap_especifica, c.niveldinamico, c.nivelestatico, c.vazao_estabilizacao

                from poco as p
                    left join  qualidade_agua as q
                            on p.utme = q.poco_utme and p.utmn = q.poco_utmn
                    left join  capacidade_poco as c
                    on p.utme = c.poco_utme and p.utmn = c.poco_utmn";
        
                    if ($result = mysqli_query($conexao->conn, $query)) {
                
                        /* fetch associative array */
                        while ($row = mysqli_fetch_assoc($result)) {
                            array_push($cordenada, $row["latitudese"], $row["longitudes"], $row["situacao"], $row["profundidade"],
                                        $row["uso_agua"], $row["alcalinidade"], $row["bicarbonatos"], $row["calcio"],
                                        $row["carbonatos"], $row["cloretos"], $row["condutividade_eletrica"],$row["dureza"], 
                                        $row["fluor"], $row["magnesio"], $row["ph"], $row["potassio"], $row["sodio"], 
                                        $row["solidos_tot_dissolvidos"], $row["sulfatos"], $row["temperatura"], $row["cap_especifica"], 
                                        $row["niveldinamico"], $row["nivelestatico"], $row["vazao_estabilizacao"]);
                        }
                        $coordAux = $coordAux+$cordenada;
                        mysqli_free_result($result);
                    }
    }else{
        if ($_POST['bombeando'] == 'checked'){
            $query = "select p.utme, p.utmn, p.latitudese, p.longitudes, p.situacao, p.profundidade, p.uso_agua,
        
                    q.alcalinidade, q.bicarbonatos, q.calcio, q.carbonatos, q.cloretos, q.condutividade_eletrica,
                    q.data, q.dureza, q.fluor, q.magnesio, q.ph, q.potassio, q.responsavel, q.sodio, 
                    q.solidos_tot_dissolvidos, q.sulfatos, q.temperatura,

                    c.cap_especifica, c.niveldinamico, c.nivelestatico, c.vazao_estabilizacao

                from poco as p
                    left join  qualidade_agua as q
                            on p.utme = q.poco_utme and p.utmn = q.poco_utmn
                    left join  capacidade_poco as c
                    on p.utme = c.poco_utme and p.utmn = c.poco_utmn
                    where p.situacao = 'Bombeando'";
                    
            if ($result = mysqli_query($conexao->conn, $query)) {
                
                /* fetch associative array */
                while ($row = mysqli_fetch_assoc($result)) {
                    array_push($cordenada, $row["latitudese"], $row["longitudes"], $row["situacao"], $row["profundidade"],
                                $row["uso_agua"], $row["alcalinidade"], $row["bicarbonatos"], $row["calcio"],
                                $row["carbonatos"], $row["cloretos"], $row["condutividade_eletrica"],$row["dureza"], 
                                $row["fluor"], $row["magnesio"], $row["ph"], $row["potassio"], $row["sodio"], 
                                $row["solidos_tot_dissolvidos"], $row["sulfatos"], $row["temperatura"], $row["cap_especifica"], 
                                $row["niveldinamico"], $row["nivelestatico"], $row["vazao_estabilizacao"]);
                }
                $coordAux = $coordAux+$cordenada;
                mysqli_free_result($result);
            }
        }
        if ($_POST['abandonado'] == 'checked'){
            $query = "select p.utme, p.utmn, p.latitudese, p.longitudes, p.situacao, p.profundidade, p.uso_agua,
        
                    q.alcalinidade, q.bicarbonatos, q.calcio, q.carbonatos, q.cloretos, q.condutividade_eletrica,
                    q.data, q.dureza, q.fluor, q.magnesio, q.ph, q.potassio, q.responsavel, q.sodio, 
                    q.solidos_tot_dissolvidos, q.sulfatos, q.temperatura,

                    c.cap_especifica, c.niveldinamico, c.nivelestatico, c.vazao_estabilizacao

                from poco as p
                    left join  qualidade_agua as q
                            on p.utme = q.poco_utme and p.utmn = q.poco_utmn
                    left join  capacidade_poco as c
                    on p.utme = c.poco_utme and p.utmn = c.poco_utmn
                    where p.situacao = 'Abandonado'";
                    
            if ($result = mysqli_query($conexao->conn, $query)) {
                
                /* fetch associative array */
                while ($row = mysqli_fetch_assoc($result)) {
                    array_push($cordenada, $row["latitudese"], $row["longitudes"], $row["situacao"], $row["profundidade"],
                                $row["uso_agua"], $row["alcalinidade"], $row["bicarbonatos"], $row["calcio"],
                                $row["carbonatos"], $row["cloretos"], $row["condutividade_eletrica"],$row["dureza"], 
                                $row["fluor"], $row["magnesio"], $row["ph"], $row["potassio"], $row["sodio"], 
                                $row["solidos_tot_dissolvidos"], $row["sulfatos"], $row["temperatura"], $row["cap_especifica"], 
                                $row["niveldinamico"], $row["nivelestatico"], $row["vazao_estabilizacao"]);
                }
                $coordAux = $coordAux+$cordenada;
                mysqli_free_result($result);
            }
        }
        if ($_POST['nutil'] == 'checked'){
            $query = "select p.utme, p.utmn, p.latitudese, p.longitudes, p.situacao, p.profundidade, p.uso_agua,
        
                    q.alcalinidade, q.bicarbonatos, q.calcio, q.carbonatos, q.cloretos, q.condutividade_eletrica,
                    q.data, q.dureza, q.fluor, q.magnesio, q.ph, q.potassio, q.responsavel, q.sodio, 
                    q.solidos_tot_dissolvidos, q.sulfatos, q.temperatura,

                    c.cap_especifica, c.niveldinamico, c.nivelestatico, c.vazao_estabilizacao

                from poco as p
                    left join  qualidade_agua as q
                            on p.utme = q.poco_utme and p.utmn = q.poco_utmn
                    left join  capacidade_poco as c
                    on p.utme = c.poco_utme and p.utmn = c.poco_utmn
                    where p.situacao = 'Não utilizável'";
                    
            if ($result = mysqli_query($conexao->conn, $query)) {
                
                /* fetch associative array */
                while ($row = mysqli_fetch_assoc($result)) {
                    array_push($cordenada, $row["latitudese"], $row["longitudes"], $row["situacao"], $row["profundidade"],
                                $row["uso_agua"], $row["alcalinidade"], $row["bicarbonatos"], $row["calcio"],
                                $row["carbonatos"], $row["cloretos"], $row["condutividade_eletrica"],$row["dureza"], 
                                $row["fluor"], $row["magnesio"], $row["ph"], $row["potassio"], $row["sodio"], 
                                $row["solidos_tot_dissolvidos"], $row["sulfatos"], $row["temperatura"], $row["cap_especifica"], 
                                $row["niveldinamico"], $row["nivelestatico"], $row["vazao_estabilizacao"]);
                }
                $coordAux = $coordAux+$cordenada;
                mysqli_free_result($result);
            }
        }
        if ($_POST['ninstal'] == 'checked'){
            $query = "select p.utme, p.utmn, p.latitudese, p.longitudes, p.situacao, p.profundidade, p.uso_agua,
        
                    q.alcalinidade, q.bicarbonatos, q.calcio, q.carbonatos, q.cloretos, q.condutividade_eletrica,
                    q.data, q.dureza, q.fluor, q.magnesio, q.ph, q.potassio, q.responsavel, q.sodio, 
                    q.solidos_tot_dissolvidos, q.sulfatos, q.temperatura,

                    c.cap_especifica, c.niveldinamico, c.nivelestatico, c.vazao_estabilizacao

                from poco as p
                    left join  qualidade_agua as q
                            on p.utme = q.poco_utme and p.utmn = q.poco_utmn
                    left join  capacidade_poco as c
                    on p.utme = c.poco_utme and p.utmn = c.poco_utmn
                    where p.situacao = 'Não Instalado'";
                    
            if ($result = mysqli_query($conexao->conn, $query)) {
                
                /* fetch associative array */
                while ($row = mysqli_fetch_assoc($result)) {
                    array_push($cordenada, $row["latitudese"], $row["longitudes"], $row["situacao"], $row["profundidade"],
                                $row["uso_agua"], $row["alcalinidade"], $row["bicarbonatos"], $row["calcio"],
                                $row["carbonatos"], $row["cloretos"], $row["condutividade_eletrica"],$row["dureza"], 
                                $row["fluor"], $row["magnesio"], $row["ph"], $row["potassio"], $row["sodio"], 
                                $row["solidos_tot_dissolvidos"], $row["sulfatos"], $row["temperatura"], $row["cap_especifica"], 
                                $row["niveldinamico"], $row["nivelestatico"], $row["vazao_estabilizacao"]);
                }
                $coordAux = $coordAux+$cordenada;
                mysqli_free_result($result);
            }
        }
        if ($_POST['fechado'] == 'checked'){
            $query = "select p.utme, p.utmn, p.latitudese, p.longitudes, p.situacao, p.profundidade, p.uso_agua,
        
                    q.alcalinidade, q.bicarbonatos, q.calcio, q.carbonatos, q.cloretos, q.condutividade_eletrica,
                    q.data, q.dureza, q.fluor, q.magnesio, q.ph, q.potassio, q.responsavel, q.sodio, 
                    q.solidos_tot_dissolvidos, q.sulfatos, q.temperatura,

                    c.cap_especifica, c.niveldinamico, c.nivelestatico, c.vazao_estabilizacao

                from poco as p
                    left join  qualidade_agua as q
                            on p.utme = q.poco_utme and p.utmn = q.poco_utmn
                    left join  capacidade_poco as c
                    on p.utme = c.poco_utme and p.utmn = c.poco_utmn
                    where p.situacao = 'Fechado'";
                    
            if ($result = mysqli_query($conexao->conn, $query)) {
                
                /* fetch associative array */
                while ($row = mysqli_fetch_assoc($result)) {
                    array_push($cordenada, $row["latitudese"], $row["longitudes"], $row["situacao"], $row["profundidade"],
                                $row["uso_agua"], $row["alcalinidade"], $row["bicarbonatos"], $row["calcio"],
                                $row["carbonatos"], $row["cloretos"], $row["condutividade_eletrica"],$row["dureza"], 
                                $row["fluor"], $row["magnesio"], $row["ph"], $row["potassio"], $row["sodio"], 
                                $row["solidos_tot_dissolvidos"], $row["sulfatos"], $row["temperatura"], $row["cap_especifica"], 
                                $row["niveldinamico"], $row["nivelestatico"], $row["vazao_estabilizacao"]);
                }
                $coordAux = $coordAux+$cordenada;
                mysqli_free_result($result);
            }
        }
        if ($_POST['precario'] == 'checked'){
            $query = "select p.utme, p.utmn, p.latitudese, p.longitudes, p.situacao, p.profundidade, p.uso_agua,
        
                    q.alcalinidade, q.bicarbonatos, q.calcio, q.carbonatos, q.cloretos, q.condutividade_eletrica,
                    q.data, q.dureza, q.fluor, q.magnesio, q.ph, q.potassio, q.responsavel, q.sodio, 
                    q.solidos_tot_dissolvidos, q.sulfatos, q.temperatura,

                    c.cap_especifica, c.niveldinamico, c.nivelestatico, c.vazao_estabilizacao

                from poco as p
                    left join  qualidade_agua as q
                            on p.utme = q.poco_utme and p.utmn = q.poco_utmn
                    left join  capacidade_poco as c
                    on p.utme = c.poco_utme and p.utmn = c.poco_utmn
                    where p.situacao = 'Precário'";
                    
            if ($result = mysqli_query($conexao->conn, $query)) {
                
                /* fetch associative array */
                while ($row = mysqli_fetch_assoc($result)) {
                    array_push($cordenada, $row["latitudese"], $row["longitudes"], $row["situacao"], $row["profundidade"],
                                $row["uso_agua"], $row["alcalinidade"], $row["bicarbonatos"], $row["calcio"],
                                $row["carbonatos"], $row["cloretos"], $row["condutividade_eletrica"],$row["dureza"], 
                                $row["fluor"], $row["magnesio"], $row["ph"], $row["potassio"], $row["sodio"], 
                                $row["solidos_tot_dissolvidos"], $row["sulfatos"], $row["temperatura"], $row["cap_especifica"], 
                                $row["niveldinamico"], $row["nivelestatico"], $row["vazao_estabilizacao"]);
                }
                $coordAux = $coordAux+$cordenada;
                mysqli_free_result($result);
            }
        }
        if ($_POST['obstruido'] == 'checked'){
            $query = "select p.utme, p.utmn, p.latitudese, p.longitudes, p.situacao, p.profundidade, p.uso_agua,
        
                    q.alcalinidade, q.bicarbonatos, q.calcio, q.carbonatos, q.cloretos, q.condutividade_eletrica,
                    q.data, q.dureza, q.fluor, q.magnesio, q.ph, q.potassio, q.responsavel, q.sodio, 
                    q.solidos_tot_dissolvidos, q.sulfatos, q.temperatura,

                    c.cap_especifica, c.niveldinamico, c.nivelestatico, c.vazao_estabilizacao

                from poco as p
                    left join  qualidade_agua as q
                            on p.utme = q.poco_utme and p.utmn = q.poco_utmn
                    left join  capacidade_poco as c
                    on p.utme = c.poco_utme and p.utmn = c.poco_utmn
                    where p.situacao = 'Obstruído'";
                    
            if ($result = mysqli_query($conexao->conn, $query)) {
                
                /* fetch associative array */
                while ($row = mysqli_fetch_assoc($result)) {
                    array_push($cordenada, $row["latitudese"], $row["longitudes"], $row["situacao"], $row["profundidade"],
                                $row["uso_agua"], $row["alcalinidade"], $row["bicarbonatos"], $row["calcio"],
                                $row["carbonatos"], $row["cloretos"], $row["condutividade_eletrica"],$row["dureza"], 
                                $row["fluor"], $row["magnesio"], $row["ph"], $row["potassio"], $row["sodio"], 
                                $row["solidos_tot_dissolvidos"], $row["sulfatos"], $row["temperatura"], $row["cap_especifica"], 
                                $row["niveldinamico"], $row["nivelestatico"], $row["vazao_estabilizacao"]);
                }
                $coordAux = $coordAux+$cordenada;
                mysqli_free_result($result);
            }
        }
        if ($_POST['colmatado'] == 'checked'){
            $query = "select p.utme, p.utmn, p.latitudese, p.longitudes, p.situacao, p.profundidade, p.uso_agua,
        
                    q.alcalinidade, q.bicarbonatos, q.calcio, q.carbonatos, q.cloretos, q.condutividade_eletrica,
                    q.data, q.dureza, q.fluor, q.magnesio, q.ph, q.potassio, q.responsavel, q.sodio, 
                    q.solidos_tot_dissolvidos, q.sulfatos, q.temperatura,

                    c.cap_especifica, c.niveldinamico, c.nivelestatico, c.vazao_estabilizacao

                from poco as p
                    left join  qualidade_agua as q
                            on p.utme = q.poco_utme and p.utmn = q.poco_utmn
                    left join  capacidade_poco as c
                    on p.utme = c.poco_utme and p.utmn = c.poco_utmn
                    where p.situacao = 'Colmatado'";
                    
            if ($result = mysqli_query($conexao->conn, $query)) {
                
                /* fetch associative array */
                while ($row = mysqli_fetch_assoc($result)) {
                    array_push($cordenada, $row["latitudese"], $row["longitudes"], $row["situacao"], $row["profundidade"],
                                $row["uso_agua"], $row["alcalinidade"], $row["bicarbonatos"], $row["calcio"],
                                $row["carbonatos"], $row["cloretos"], $row["condutividade_eletrica"],$row["dureza"], 
                                $row["fluor"], $row["magnesio"], $row["ph"], $row["potassio"], $row["sodio"], 
                                $row["solidos_tot_dissolvidos"], $row["sulfatos"], $row["temperatura"], $row["cap_especifica"], 
                                $row["niveldinamico"], $row["nivelestatico"], $row["vazao_estabilizacao"]);
                }
                $coordAux = $coordAux+$cordenada;
                mysqli_free_result($result);
            }
        }
        if ($_POST['parado'] == 'checked'){
            $query = "select p.utme, p.utmn, p.latitudese, p.longitudes, p.situacao, p.profundidade, p.uso_agua,
        
                    q.alcalinidade, q.bicarbonatos, q.calcio, q.carbonatos, q.cloretos, q.condutividade_eletrica,
                    q.data, q.dureza, q.fluor, q.magnesio, q.ph, q.potassio, q.responsavel, q.sodio, 
                    q.solidos_tot_dissolvidos, q.sulfatos, q.temperatura,

                    c.cap_especifica, c.niveldinamico, c.nivelestatico, c.vazao_estabilizacao

                from poco as p
                    left join  qualidade_agua as q
                            on p.utme = q.poco_utme and p.utmn = q.poco_utmn
                    left join  capacidade_poco as c
                    on p.utme = c.poco_utme and p.utmn = c.poco_utmn
                    where p.situacao = 'Parado'";
                    
            if ($result = mysqli_query($conexao->conn, $query)) {
                
                /* fetch associative array */
                while ($row = mysqli_fetch_assoc($result)) {
                    array_push($cordenada, $row["latitudese"], $row["longitudes"], $row["situacao"], $row["profundidade"],
                                $row["uso_agua"], $row["alcalinidade"], $row["bicarbonatos"], $row["calcio"],
                                $row["carbonatos"], $row["cloretos"], $row["condutividade_eletrica"],$row["dureza"], 
                                $row["fluor"], $row["magnesio"], $row["ph"], $row["potassio"], $row["sodio"], 
                                $row["solidos_tot_dissolvidos"], $row["sulfatos"], $row["temperatura"], $row["cap_especifica"], 
                                $row["niveldinamico"], $row["nivelestatico"], $row["vazao_estabilizacao"]);
                }
                $coordAux = $coordAux+$cordenada;
                mysqli_free_result($result);
            }
        }
        if ($_POST['seco'] == 'checked'){
            $query = "select p.utme, p.utmn, p.latitudese, p.longitudes, p.situacao, p.profundidade, p.uso_agua,
        
                    q.alcalinidade, q.bicarbonatos, q.calcio, q.carbonatos, q.cloretos, q.condutividade_eletrica,
                    q.data, q.dureza, q.fluor, q.magnesio, q.ph, q.potassio, q.responsavel, q.sodio, 
                    q.solidos_tot_dissolvidos, q.sulfatos, q.temperatura,

                    c.cap_especifica, c.niveldinamico, c.nivelestatico, c.vazao_estabilizacao

                from poco as p
                    left join  qualidade_agua as q
                            on p.utme = q.poco_utme and p.utmn = q.poco_utmn
                    left join  capacidade_poco as c
                    on p.utme = c.poco_utme and p.utmn = c.poco_utmn
                    where p.situacao = 'Seco'";
                    
            if ($result = mysqli_query($conexao->conn, $query)) {
                
                /* fetch associative array */
                while ($row = mysqli_fetch_assoc($result)) {
                    array_push($cordenada, $row["latitudese"], $row["longitudes"], $row["situacao"], $row["profundidade"],
                                $row["uso_agua"], $row["alcalinidade"], $row["bicarbonatos"], $row["calcio"],
                                $row["carbonatos"], $row["cloretos"], $row["condutividade_eletrica"],$row["dureza"], 
                                $row["fluor"], $row["magnesio"], $row["ph"], $row["potassio"], $row["sodio"], 
                                $row["solidos_tot_dissolvidos"], $row["sulfatos"], $row["temperatura"], $row["cap_especifica"], 
                                $row["niveldinamico"], $row["nivelestatico"], $row["vazao_estabilizacao"]);
                }
                $coordAux = $coordAux+$cordenada;
                mysqli_free_result($result);
            }
        }
        if ($_POST['equipado'] == 'checked'){
            $query = "select p.utme, p.utmn, p.latitudese, p.longitudes, p.situacao, p.profundidade, p.uso_agua,
        
                    q.alcalinidade, q.bicarbonatos, q.calcio, q.carbonatos, q.cloretos, q.condutividade_eletrica,
                    q.data, q.dureza, q.fluor, q.magnesio, q.ph, q.potassio, q.responsavel, q.sodio, 
                    q.solidos_tot_dissolvidos, q.sulfatos, q.temperatura,

                    c.cap_especifica, c.niveldinamico, c.nivelestatico, c.vazao_estabilizacao

                from poco as p
                    left join  qualidade_agua as q
                            on p.utme = q.poco_utme and p.utmn = q.poco_utmn
                    left join  capacidade_poco as c
                    on p.utme = c.poco_utme and p.utmn = c.poco_utmn
                    where p.situacao = 'Equipado'";
                    
            if ($result = mysqli_query($conexao->conn, $query)) {
                
                /* fetch associative array */
                while ($row = mysqli_fetch_assoc($result)) {
                    array_push($cordenada, $row["latitudese"], $row["longitudes"], $row["situacao"], $row["profundidade"],
                                $row["uso_agua"], $row["alcalinidade"], $row["bicarbonatos"], $row["calcio"],
                                $row["carbonatos"], $row["cloretos"], $row["condutividade_eletrica"],$row["dureza"], 
                                $row["fluor"], $row["magnesio"], $row["ph"], $row["potassio"], $row["sodio"], 
                                $row["solidos_tot_dissolvidos"], $row["sulfatos"], $row["temperatura"], $row["cap_especifica"], 
                                $row["niveldinamico"], $row["nivelestatico"], $row["vazao_estabilizacao"]);
                }
                $coordAux = $coordAux+$cordenada;
                mysqli_free_result($result);
            }
        }
        if ($_POST['indisp'] == 'checked'){
            $query = "select p.utme, p.utmn, p.latitudese, p.longitudes, p.situacao, p.profundidade, p.uso_agua,
        
                    q.alcalinidade, q.bicarbonatos, q.calcio, q.carbonatos, q.cloretos, q.condutividade_eletrica,
                    q.data, q.dureza, q.fluor, q.magnesio, q.ph, q.potassio, q.responsavel, q.sodio, 
                    q.solidos_tot_dissolvidos, q.sulfatos, q.temperatura,

                    c.cap_especifica, c.niveldinamico, c.nivelestatico, c.vazao_estabilizacao

                from poco as p
                    left join  qualidade_agua as q
                            on p.utme = q.poco_utme and p.utmn = q.poco_utmn
                    left join  capacidade_poco as c
                    on p.utme = c.poco_utme and p.utmn = c.poco_utmn
                    where p.situacao = 'Indisponpível'";
                    
            if ($result = mysqli_query($conexao->conn, $query)) {
                
                /* fetch associative array */
                while ($row = mysqli_fetch_assoc($result)) {
                    array_push($cordenada, $row["latitudese"], $row["longitudes"], $row["situacao"], $row["profundidade"],
                                $row["uso_agua"], $row["alcalinidade"], $row["bicarbonatos"], $row["calcio"],
                                $row["carbonatos"], $row["cloretos"], $row["condutividade_eletrica"],$row["dureza"], 
                                $row["fluor"], $row["magnesio"], $row["ph"], $row["potassio"], $row["sodio"], 
                                $row["solidos_tot_dissolvidos"], $row["sulfatos"], $row["temperatura"], $row["cap_especifica"], 
                                $row["niveldinamico"], $row["nivelestatico"], $row["vazao_estabilizacao"]);
                }
                $coordAux = $coordAux+$cordenada;
                mysqli_free_result($result);
            }
        }
        if ($_POST['humano'] == 'checked'){
            $query = "select p.utme, p.utmn, p.latitudese, p.longitudes, p.situacao, p.profundidade, p.uso_agua,
        
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
                    and q.solidos_tot_dissolvidos <= 1000";
                    
            if ($result = mysqli_query($conexao->conn, $query)) {
                
                /* fetch associative array */
                while ($row = mysqli_fetch_assoc($result)) {
                    array_push($cordenada, $row["latitudese"], $row["longitudes"], $row["situacao"], $row["profundidade"],
                                $row["uso_agua"], $row["alcalinidade"], $row["bicarbonatos"], $row["calcio"],
                                $row["carbonatos"], $row["cloretos"], $row["condutividade_eletrica"],$row["dureza"], 
                                $row["fluor"], $row["magnesio"], $row["ph"], $row["potassio"], $row["sodio"], 
                                $row["solidos_tot_dissolvidos"], $row["sulfatos"], $row["temperatura"], $row["cap_especifica"], 
                                $row["niveldinamico"], $row["nivelestatico"], $row["vazao_estabilizacao"]);
                }
                $coordAux = $coordAux+$cordenada;
                mysqli_free_result($result);
            }
        }
        if ($_POST['animais'] == 'checked'){
            $query = "select p.utme, p.utmn, p.latitudese, p.longitudes, p.situacao, p.profundidade, p.uso_agua,
        
                    q.alcalinidade, q.bicarbonatos, q.calcio, q.carbonatos, q.cloretos, q.condutividade_eletrica,
                    q.data, q.dureza, q.fluor, q.magnesio, q.ph, q.potassio, q.responsavel, q.sodio, 
                    q.solidos_tot_dissolvidos, q.sulfatos, q.temperatura,

                    c.cap_especifica, c.niveldinamico, c.nivelestatico, c.vazao_estabilizacao

                from poco as p
                    left join  qualidade_agua as q
                            on p.utme = q.poco_utme and p.utmn = q.poco_utmn
                    left join  capacidade_poco as c
                    on p.utme = c.poco_utme and p.utmn = c.poco_utmn
				where q.fluor <= 2 and q.sulfatos <= 1000 ";
                    
            if ($result = mysqli_query($conexao->conn, $query)) {
                
                /* fetch associative array */
                while ($row = mysqli_fetch_assoc($result)) {
                    array_push($cordenada, $row["latitudese"], $row["longitudes"], $row["situacao"], $row["profundidade"],
                                $row["uso_agua"], $row["alcalinidade"], $row["bicarbonatos"], $row["calcio"],
                                $row["carbonatos"], $row["cloretos"], $row["condutividade_eletrica"],$row["dureza"], 
                                $row["fluor"], $row["magnesio"], $row["ph"], $row["potassio"], $row["sodio"], 
                                $row["solidos_tot_dissolvidos"], $row["sulfatos"], $row["temperatura"], $row["cap_especifica"], 
                                $row["niveldinamico"], $row["nivelestatico"], $row["vazao_estabilizacao"]);
                }
                $coordAux = $coordAux+$cordenada;
                mysqli_free_result($result);
            }
        }
        if ($_POST['irrigacao'] == 'checked'){
            $query = "select p.utme, p.utmn, p.latitudese, p.longitudes, p.situacao, p.profundidade, p.uso_agua,
        
                    q.alcalinidade, q.bicarbonatos, q.calcio, q.carbonatos, q.cloretos, q.condutividade_eletrica,
                    q.data, q.dureza, q.fluor, q.magnesio, q.ph, q.potassio, q.responsavel, q.sodio, 
                    q.solidos_tot_dissolvidos, q.sulfatos, q.temperatura,

                    c.cap_especifica, c.niveldinamico, c.nivelestatico, c.vazao_estabilizacao

                from poco as p
                    left join  qualidade_agua as q
                            on p.utme = q.poco_utme and p.utmn = q.poco_utmn
                    left join  capacidade_poco as c
                    on p.utme = c.poco_utme and p.utmn = c.poco_utmn
				where q.cloretos >= 100 and q.cloretos <= 700 and q.fluor <= 1";
                    
            if ($result = mysqli_query($conexao->conn, $query)) {
                
                /* fetch associative array */
                while ($row = mysqli_fetch_assoc($result)) {
                    array_push($cordenada, $row["latitudese"], $row["longitudes"], $row["situacao"], $row["profundidade"],
                                $row["uso_agua"], $row["alcalinidade"], $row["bicarbonatos"], $row["calcio"],
                                $row["carbonatos"], $row["cloretos"], $row["condutividade_eletrica"],$row["dureza"], 
                                $row["fluor"], $row["magnesio"], $row["ph"], $row["potassio"], $row["sodio"], 
                                $row["solidos_tot_dissolvidos"], $row["sulfatos"], $row["temperatura"], $row["cap_especifica"], 
                                $row["niveldinamico"], $row["nivelestatico"], $row["vazao_estabilizacao"]);
                }
                $coordAux = $coordAux+$cordenada;
                mysqli_free_result($result);
            }
        }
        if ($_POST['recreacao'] == 'checked'){
            $query = "select p.utme, p.utmn, p.latitudese, p.longitudes, p.situacao, p.profundidade, p.uso_agua,
        
                    q.alcalinidade, q.bicarbonatos, q.calcio, q.carbonatos, q.cloretos, q.condutividade_eletrica,
                    q.data, q.dureza, q.fluor, q.magnesio, q.ph, q.potassio, q.responsavel, q.sodio, 
                    q.solidos_tot_dissolvidos, q.sulfatos, q.temperatura,

                    c.cap_especifica, c.niveldinamico, c.nivelestatico, c.vazao_estabilizacao

                from poco as p
                    left join  qualidade_agua as q
                            on p.utme = q.poco_utme and p.utmn = q.poco_utmn
                    left join  capacidade_poco as c
                    on p.utme = c.poco_utme and p.utmn = c.poco_utmn
				where q.sodio <= 300 and q.cloretos <= 400 and q.sulfatos <= 400";
                    
            if ($result = mysqli_query($conexao->conn, $query)) {
                
                /* fetch associative array */
                while ($row = mysqli_fetch_assoc($result)) {
                    array_push($cordenada, $row["latitudese"], $row["longitudes"], $row["situacao"], $row["profundidade"],
                                $row["uso_agua"], $row["alcalinidade"], $row["bicarbonatos"], $row["calcio"],
                                $row["carbonatos"], $row["cloretos"], $row["condutividade_eletrica"],$row["dureza"], 
                                $row["fluor"], $row["magnesio"], $row["ph"], $row["potassio"], $row["sodio"], 
                                $row["solidos_tot_dissolvidos"], $row["sulfatos"], $row["temperatura"], $row["cap_especifica"], 
                                $row["niveldinamico"], $row["nivelestatico"], $row["vazao_estabilizacao"]);
                }
                $coordAux = $coordAux+$cordenada;
                mysqli_free_result($result);
            }
        }
        
        
    }  
    
    
    
    $string_array = implode("|", $coordAux);
    /* close connection */
    mysqli_close($conexao->conn); 
    
?>