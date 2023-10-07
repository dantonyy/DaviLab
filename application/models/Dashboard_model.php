<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard_model extends CI_Model {

// ================================================================================================
// ========================================= -- SET -- ============================================

    public function setNovoUsuario($dados_usuario_autenticacao, $dados_usuario_configuracao, $dados_laboratorio_possui_usuario) {
        // Primeiro insere os dados em usuario_autenticacao

        $id_usuario_autenticacao = $this->setUsuarioAutenticacao($dados_usuario_autenticacao, $dados_usuario_configuracao);
        if($id_usuario_autenticacao != null){
            $set_usuario_configuracao = $this->setUsuarioConfiguracao($id_usuario_autenticacao, $dados_usuario_configuracao);
            if ($set_usuario_configuracao != null) {
                $setLabPossuiUsuario = $this->setLabPossuiUsuario($id_usuario_autenticacao,$dados_laboratorio_possui_usuario);
            }
        }else{
            return FALSE;
        }
    }

    public function setUsuarioAutenticacao($dados) {
        if($this->db->insert('usuario_autenticacao', $dados)){
            $id_usuario_autenticacao = $this->db->insert_id();
            return $id_usuario_autenticacao;
        }else{
            return FALSE;
        }
    }

    public function setUsuarioConfiguracao($id_usuario_autenticacao, $dados_usuario_configuracao) {
        $id_usuario_autenticacao = array (
            'id_usuario_autenticacao' => $id_usuario_autenticacao
        );
        
        $dados_inserir = array_merge($dados_usuario_configuracao, $id_usuario_autenticacao);

        if($this->db->insert('usuario_configuracao', $dados_inserir)){
            return TRUE;
        }else{
            return FALSE;
        }
    }

    public function setLabPossuiUsuario($id_usuario_autenticacao, $dados_laboratorio_possui_usuario) {
        $id_usuario_autenticacao = array (
            'id_usuario_autenticacao' => $id_usuario_autenticacao
        );
        
        $dados_inserir = array_merge($dados_laboratorio_possui_usuario, $id_usuario_autenticacao);

        if($this->db->insert('laboratorio_possui_usuario', $dados_inserir)){
            return TRUE;
        }else{
            return FALSE;
        }
    }

// ================================================================================================
// ========================================= -- GET -- ============================================
    
    public function getTodosFuncionarios($id_laboratorio){
        $this->db->from('usuario_autenticacao');
        $this->db->join('laboratorio_possui_usuario', 'laboratorio_possui_usuario.id_usuario_autenticacao = usuario_autenticacao.id_usuario_autenticacao AND laboratorio_possui_usuario.id_laboratorio = ' . $id_laboratorio);
        $this->db->join('laboratorio_papel', 'laboratorio_papel.id_laboratorio_papel = laboratorio_possui_usuario.papel');
        
        $resultado = $this->db->get()->result();
        return $resultado;
    }

    public function getDadosFuncionario($id_usuario_autenticacao){
        $this->db->from('usuario_autenticacao');
        $this->db->join('laboratorio_possui_usuario', 'usuario_autenticacao.id_usuario_autenticacao = laboratorio_possui_usuario.id_usuario_autenticacao AND laboratorio_possui_usuario.id_usuario_autenticacao =' . $id_usuario_autenticacao);
        $this->db->join('laboratorio_papel', 'laboratorio_papel.id_laboratorio_papel = laboratorio_possui_usuario.papel');
        $this->db->join('usuario_configuracao', 'usuario_configuracao.id_usuario_autenticacao = laboratorio_possui_usuario.id_usuario_autenticacao');

        $resultado = $this->db->get()->row();
        return $resultado;
    }

    public function getEstados() {
        $this->db->from('estado');
        $resultado = $this->db->get()->result();
        return $resultado;
    }

    public function getMunicipios($estado) {
        $this->db->from('municipio');
        $this->db->where('Uf', $estado);
        $resultado = $this->db->get()->result();
        return $resultado;
    }

// ================================================================================================
// ========================================= -- UPDATE -- =========================================

    public function updateUsuarioAutenticacao($id_usuario_autenticacao, $dados_usuario_autenticacao=null) {
        $this->db->where('id_usuario_autenticacao', $id_usuario_autenticacao);

        if($this->db->update('usuario_autenticacao', $dados_usuario_autenticacao)){
            return TRUE;
        }else{
            return FALSE;
        }
    }

    public function updateUsuarioConfiguracao($id_usuario_autenticacao, $dados_usuario_configuracao=null) {
        $this->db->where('id_usuario_autenticacao', $id_usuario_autenticacao);

        if($this->db->update('usuario_configuracao', $dados_usuario_configuracao)){
            return TRUE;
        }else{
            return FALSE;
        }
    }

    public function updateLabPossuiUsuario($id_usuario_autenticacao, $dados_laboratorio_possui_usuario=null) {
        $this->db->where('id_usuario_autenticacao', $id_usuario_autenticacao);

        if($this->db->update('laboratorio_possui_usuario', $dados_laboratorio_possui_usuario)){
            return TRUE;
        }else{
            return FALSE;
        }
    }

    public function mudarSenha($id_usuario_autenticacao, $dados) {
        $this->db->where('id_usuario_autenticacao', $id_usuario_autenticacao);

        if($this->db->update('usuario_autenticacao', $dados)){
            return TRUE;
        }else{
            return FALSE;
        }
    }

// ================================================================================================
// ========================================= -- DELETE -- =========================================

// ================================================================================================
// ========================================= -- OUTRAS -- =========================================
    public function verificaSenha($id_usuario_autenticacao, $senha_atual){
        $this->db->from('usuario_autenticacao');
        $this->db->where('id_usuario_autenticacao', $id_usuario_autenticacao);
        $this->db->select('senha');

        $senha_cadastrada = $this->db->get()->row();
        
        if ($senha_cadastrada->senha == $senha_atual) {
            return 'TRUE';
        } else {
            return 'FALSE';
        }
    }
}