<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login_model extends CI_Model {
// ================================================================================================
// ========================================= -- SET -- ============================================

// ================================================================================================
// ========================================= -- GET -- ============================================

// ================================================================================================
// ========================================= -- UPDATE -- =========================================

// ================================================================================================
// ========================================= -- DELETE -- =========================================

// ================================================================================================
// ========================================= -- OUTRAS -- =========================================
    public function validarLogin($email, $senha){
        $this->db->from('usuario_autenticacao');
        $this->db->where('usuario_autenticacao.email', $email);
        $this->db->join('laboratorio_possui_usuario', 'laboratorio_possui_usuario.id_usuario_autenticacao = usuario_autenticacao.id_usuario_autenticacao_autenticacao');
        $this->db->join('laboratorio', 'laboratorio.id_laboratorio = laboratorio_possui_usuario.id_laboratorio');
        $this->db->join('laboratorio_papel', 'laboratorio_papel.id_laboratorio_papel = laboratorio_possui_usuario.papel');

        $usuario = $this->db->get()->row();

        if($usuario == NULL){
            return "FALSE: usuario nao encontrado";
        }else{
            if($usuario->senha == $senha){
                if ($usuario->ativo == 1) {
                    $session_data = array(
                        // Dados usuário
                        'id_usuario_autenticacao' => $usuario->id_usuario_autenticacao,
                        'nome' => $usuario->nome,
                        'sobrenome' => $usuario->sobrenome,
                        'email' => $email,
                        'celular' => $celular,
                        'data_criacao' => $usuario->data_criacao,
                        'papel' => $usuario->papel,
                        'ativo' => $usuario->ativo,
                        // Dados laboratório
                        'id_laboratorio' =>$usuario->id_laboratorio,
                        'nome_fantasia' => $usuario->nome_fantasia,
                    );
                    $this->setSession($session_data);
                    return 'TRUE';
                } else {
                    return "FALSE: Usuario inativo";
                }
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
            // Dados usuário
            'id_usuario_autenticacao' => $session_data['id_usuario_autenticacao'],
            'nome' => $session_data['nome'],
            'sobrenome' => $session_data['sobrenome'],
            'email' => $session_data['email'],
            'celular' => $session_data['celular'],
            'data_criacao' => $session_data['data_criacao'],
            'papel' => $session_data['papel'],
            'ativo' => $session_data['ativo'],
            // Dados laboratório
            'id_laboratorio' => $session_data['id_laboratorio'],
            'nome_fantasia' => $session_data['nome_fantasia'],
            'logado' => true
        );
        
        $this->session->set_userdata($sess_data);
    }

}