<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Poco_model extends CI_Model{

    public function __construct(){
        parent::__construct();
    }

    public function listar_pocos(){
        $consUtme = $this->input->post('consutme');
        $consUtmn = $this->input->post('consutmn');
        $consSituacao = $this->input->post('conssituacao');
        $consMunicipio = $this->input->post('consmunicipios_cod');

        if ($consUtme == NULL){
            $consUtme = '%';
        }
        if ($consUtmn == NULL){
            $consUtmn = '%';
        }
            return  $this->db->select('*')
                            ->from('poco p')
                            ->join('municipio m', 'p.municipios_cod_ibge = m.cod_ibge', 'left')
                            ->where('p.ativo = 1')
                            ->where('p.municipios_cod_ibge like "'.$consMunicipio.'"')
                            ->where('p.situacao like "'.$consSituacao.'"')
                            ->where('p.utme like "'.$consUtme.'"')
                            ->where('p.utmn like "'.$consUtmn.'"')
                            //->limit($maximo, $inicio)
                            ->get()->result();
    

    }
    
    public function listar_analises(){
        $poco_Utme = $this->input->post('poco_utme');
        $poco_Utmn = $this->input->post('pocoutmn');
        $data = $this->input->post('data');
        
        if ($poco_Utme == NULL){
            $poco_Utme = '%';
        }
        if ($poco_Utmn == NULL){
            $poco_Utmn = '%';
        }
        if ($data == NULL){
            $data = '%';
        }
            return  $this->db->select('*')
                            ->from('qualidade_agua q')
                            ->where('q.poco_utme like "'.$poco_Utme.'"')
                            ->where('q.poco_utmn like "'.$poco_Utmn.'"')
                            ->where('q.data like "'.$data.'"')
                            ->where('q.ativo =  "1"')
                            ->get()->result();
    

    }
    
    public function contaRegistros() {
        return $this->db->count_all_results('poco');
    }

    public function get_all_ativo_paginacao($maximo, $inicio) {
        return $this->db->get('poco', $maximo, $inicio);
    }
    function listar_municipio() {
        return $this->db->get('municipio')->result();
    }
    
    public function cadastrar(){
        $dataPoco['utme']       = $this->input->post('utme');
        $dataPoco['utmn']  = $this->input->post('utmn');
        $dataPoco['ponto']      = (double)$this->input->post('ponto');
        $dataPoco['profundidade']       = (double)$this->input->post('profundidade');
        $dataPoco['uso_agua']  = $this->input->post('uso_agua');
        $dataPoco['situacao']      = $this->input->post('situacao');
        $dataPoco['municipios_cod_ibge']      = $this->input->post('municipios_cod_ibge');
        $dataPoco['bacia_varzea_cod_bacia']       = $this->input->post('bacia_varzea_cod_bacia');
        $dataPoco['latitudese']  = $this->input->post('latitudese');
        $dataPoco['longitudes']      = $this->input->post('longitudes');
        
        $dataCap['vazao_estabilizacao']      = (double)$this->input->post('vazao_estabilizacao');
        $dataCap['nivelestatico']       = (double)$this->input->post('nivelestatico');
        $dataCap['niveldinamico']  = (double)$this->input->post('niveldinamico');
        $dataCap['cap_especifica']      = (double)$this->input->post('cap_especifica');
        $dataCap['bacia_varzea_cod_bacia']      = $this->input->post('bacia_varzea_cod_bacia');
        $dataCap['municipio_cod_ibge']       = $this->input->post('municipios_cod_ibge');
        $dataCap['poco_utme']  = $this->input->post('utme');
        $dataCap['poco_utmn']      = $this->input->post('utmn');

        $this->db->insert('poco', $dataPoco);
        if($this->db->affected_rows() > 0){
            $this->db->insert('capacidade_poco', $dataCap);
                if ($this->db->affected_rows() > 0){
                    return TRUE;
                }else{
                    return FALSE;
                }
        }else{
            return FALSE;
        }
    }
    
    public function cadastrar_analise(){
        $dataAnalise['poco_utme']       = $this->input->post('utme');
        $dataAnalise['poco_utmn']  = $this->input->post('utmn');
        $dataAnalise['ponto']      = (double)$this->input->post('ponto');
        $dataAnalise['sodio']       = (double)$this->input->post('sodio');
        $dataAnalise['potassio']  = (double)$this->input->post('potassio');
        $dataAnalise['calcio']      = (double)$this->input->post('calcio');
        $dataAnalise['magnesio']      = (double)$this->input->post('magnesio');
        $dataAnalise['cloretos']       = (double)$this->input->post('cloretos');
        $dataAnalise['sulfatos']  = (double)$this->input->post('sulfatos');
        $dataAnalise['carbonatos']      = (double)$this->input->post('carbonatos');
        $dataAnalise['bicarbonatos']      = (double)$this->input->post('bicarbonatos');
        $dataAnalise['condutividade_eletrica']       = (double)$this->input->post('condutividade_eletrica');
        $dataAnalise['ph']  = (double)$this->input->post('ph');
        $dataAnalise['fluor']      = (double)$this->input->post('fluos');
        $dataAnalise['dureza']      = (double)$this->input->post('dureza');
        
        if($this->input->post('alcalinidade') == "sim"){
            $dataAnalise['alcalinidade'] = 'sim';
        }else{
            $dataAnalise['alcalinidade'] = 'não';
        }
        
        $dataAnalise['solidos_tot_dissolvidos']  = (double)$this->input->post('solidos_tot_dissolvidos');
        $dataAnalise['temperatura']      = (double)$this->input->post('tempertura');
        $dataAnalise['data']  = $this->input->post('data');
        $dataAnalise['responsavel']      = $this->input->post('responsavel');

        $this->db->insert('qualidade_agua', $dataAnalise);
        if($this->db->affected_rows() > 0){
            return TRUE;
        }else{
            return FALSE;
        }
    }
    
    public function inativar($utme = NULL, $utmn = NULL){
        if(isset($utme) && isset($utmn) && !empty($utme) && !empty($utmn) ){
            $data['ativo'] = '0';

            $gravou = $this->db->update('poco', $data, array('utme' => $utme,
                                        'utmn' => $utmn));
            if($gravou == 1){
                $gravou = $this->db->update('capacidade_poco', $data, array('poco_utme' => $utme,
                                                                  'poco_utmn' => $utmn));
                if ($gravou == 1){
                    return TRUE;
                }else{
                    return FALSE;
                }
            }else{
                return FALSE;
            }
        }else{
            return FALSE;
        }
    }
    
    public function inativar_analises($sequencia = NULL){
        if(isset($sequencia) && !empty($sequencia)){
            $data['ativo'] = '0';

            $this->db->update('qualidade_agua', $data, array('sequencia' => $sequencia));
            if($this->db->affected_rows() > 0){
                return TRUE;
            }else{
                return FALSE;
            }
        }else{
            return FALSE;
        }
    }
    
    public function cons_poco($utme = NULL, $utmn = NULL){
        // Monta a consulta SQL e retorna um objeto
        return $this->db->select('*')
                        ->from('poco p')
                        ->join('capacidade_poco c','p.utme = c.poco_utme and p.utmn = c.poco_utmn','left')
                        ->where('p.utme = "'.$utme.'"')
                        ->where('p.utmn = "'.$utmn.'"')
                        ->get()->result();
    }
    
    public function cons_analise($sequencia = NULL){
        // Monta a consulta SQL e retorna um objeto
        return $this->db->select('*')
                        ->from('qualidade_agua q')
                        ->where('q.sequencia = "'.$sequencia.'"')
                        ->get()->result();
    }
    
    public function gravar_edicao(){
            $oldDataPoco['oldutme']       = $this->input->post('oldutme');
            $oldDataPoco['oldutmn']  = $this->input->post('oldutmn');
            
            $dataPoco['utme']       = $this->input->post('utme');
            $dataPoco['utmn']  = $this->input->post('utmn');
            $dataPoco['ponto']      = (double)$this->input->post('ponto');
            $dataPoco['profundidade']       = (double)$this->input->post('profundidade');
            $dataPoco['uso_agua']  = $this->input->post('uso_agua');
            $dataPoco['situacao']      = $this->input->post('situacao');
            $dataPoco['municipios_cod_ibge']      = $this->input->post('municipios_cod_ibge');
            $dataPoco['bacia_varzea_cod_bacia']       = $this->input->post('bacia_varzea_cod_bacia');
            $dataPoco['latitudese']  = $this->input->post('latitudese');
            $dataPoco['longitudes']      = $this->input->post('longitudes');
            $dataPoco['ativo']      = '1';

            $dataCap['vazao_estabilizacao']      = (double)$this->input->post('vazao_estabilizacao');
            $dataCap['nivelestatico']       = (double)$this->input->post('nivelestatico');
            $dataCap['niveldinamico']  = (double)$this->input->post('niveldinamico');
            $dataCap['cap_especifica']      = (double)$this->input->post('cap_especifica');
            $dataCap['bacia_varzea_cod_bacia']      = $this->input->post('bacia_varzea_cod_bacia');
            $dataCap['municipio_cod_ibge']       = $this->input->post('municipios_cod_ibge');
            $dataCap['ativo']      = '1';

            $gravou = $this->db->update('poco', $dataPoco, array('utme' => $oldDataPoco['oldutme'],
                                                       'utmn' => $oldDataPoco['oldutmn']));
            
            if($gravou == 1){
                $gravou = $this->db->update('capacidade_poco', $dataCap, array('poco_utme' => $dataPoco['utme'],
                                                                 'poco_utmn' => $dataPoco['utmn']));
                if($gravou == 1){
                    return TRUE;
                }else{
                    return FALSE;
                }
            }else{
                return FALSE;
            }
            
            
            
  
    }
    
    public function gravar_edicao_analise(){
            $dataAnalise['sequencia'] = $this->input->post('sequencia');
            $dataAnalise['poco_utme']       = $this->input->post('oldutme');
            $dataAnalise['poco_utmn']  = $this->input->post('oldutmn');
            $dataAnalise['ponto']      = (double)$this->input->post('ponto');
            $dataAnalise['sodio']       = (double)$this->input->post('sodio');
            $dataAnalise['potassio']  = (double)$this->input->post('potassio');
            $dataAnalise['calcio']      = (double)$this->input->post('calcio');
            $dataAnalise['magnesio']      = (double)$this->input->post('magnesio');
            $dataAnalise['cloretos']       = (double)$this->input->post('cloretos');
            $dataAnalise['sulfatos']  = (double)$this->input->post('sulfatos');
            $dataAnalise['carbonatos']      = (double)$this->input->post('carbonatos');
            $dataAnalise['bicarbonatos']      = (double)$this->input->post('bicarbonatos');
            $dataAnalise['condutividade_eletrica']       = (double)$this->input->post('condutividade_eletrica');
            $dataAnalise['ph']  = (double)$this->input->post('ph');
            $dataAnalise['fluor']      = (double)$this->input->post('fluos');
            $dataAnalise['dureza']      = (double)$this->input->post('dureza');

            if($this->input->post('alcalinidade') == "sim"){
                $dataAnalise['alcalinidade'] = 'sim';
            }else{
                $dataAnalise['alcalinidade'] = 'não';
            }

            $dataAnalise['solidos_tot_dissolvidos']  = (double)$this->input->post('solidos_tot_dissolvidos');
            $dataAnalise['temperatura']      = (double)$this->input->post('tempertura');
            $dataAnalise['data']  = $this->input->post('data');
            $dataAnalise['responsavel']      = $this->input->post('responsavel');

            $editou = $this->db->update('qualidade_agua', $dataAnalise, array('sequencia' => $dataAnalise['sequencia']));
            
            if($editou == 1){
                return TRUE;
            }else{
                return FALSE;
            }
  
    }


}