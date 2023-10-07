    </body>


    <?php 
        $data['usuario'] = $this->usuario_model->getUsuarioAutenticacao($this->session->userdata('id_usuario'));
        $usuario_json = json_encode($data['usuario']);
        echo "<script>var usuario = $usuario_json;</script>";
    ?>


</html>