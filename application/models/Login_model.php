<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login_model extends CI_Model {
// SET----------------------------------------------
// GET----------------------------------------------
// ATUALIZAR ----------------------------------------------
// DELETAR----------------------------------------------
// OUTROS----------------------------------------------
    public function validarLogin($email, $senha){  
        $this->db->from('usuario_autenticacao');
        $this->db->where('email', $email);
        $usuario = $this->db->get()->row();

        if($usuario == NULL){
            return "FALSE: usuario";
        }else{
            if($usuario->senha == $senha){
                $session_data = array(
                    'id_usuario' => $usuario->id_usuario_autenticacao,
                    'email' => $email,
                    'nome' => $usuario->nome
                );
                $this->setSession($session_data);
                return 'TRUE';
            }else{
                return "FALSE: senha";
            }
        }
    }

    public function resetarSenha($email){
        $this->db->from('usuario_autenticacao');
        $this->db->where('email', $email);

        $resultado = $this->db->get()->result();   

        if($resultado != NULL){
            
            $bytes = random_bytes(3);
            $senha = bin2hex($bytes);

            $this->db->set('senha', $senha);
            $this->db->where('email', $email);
            $this->db->update('usuario_autenticacao');

            return $senha;
        }else{
            //usuário não encontrado
            return FALSE;
        }

    }

    private function setSession($session_data){
        $sess_data = array(
            'id_usuario' => $session_data['id_usuario'],
            'email' => $session_data['email'],
            'nome' => $session_data['nome'],
            'logado' => true
        );
        
        $this->session->set_userdata($sess_data);
    }

}