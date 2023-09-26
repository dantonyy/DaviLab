<?php $this->lang->load('login_lang', 'portuguese');?>

<style>
    .d_davi {
    border-color: #048B8B;
    color:#f4f6fa;
    }    

    .circle{
        border-radius: 50%;
        width: 50px;
        height: 50px; 
        background-color: #048B8B;
    }

    .center {
    margin: auto;
    padding: 50px;
    }

    .title_davi {
            display: inline-block;
            background-color: #048B8B;
            margin: 15px;
            border-radius: 50%;
        }
    .button_davi {
        color: #000;
        display: table-cell;
        vertical-align: middle; 
        text-align: center;
        height: 100px;
        width: 100px;
    }
    .card-title{
        text-align: center;
    }

</style>



<body style="background: #048B8B;">
    <div class="container px-5 my-5">
        <form id="loginForm" data-sb-form-api-token="API_TOKEN">
            <div class="form-floating mb-3">
                <input class="form-control" id="login" type="text" placeholder="Login" data-sb-validations="required" />
                <label for="login">Login</label>
                <div class="invalid-feedback" data-sb-feedback="login:required">Login is required.</div>
            </div>
            <div class="form-floating mb-3">
                <input class="form-control" id="senha" type="text" placeholder="Senha" data-sb-validations="required" />
                <label for="senha">Senha</label>
                <div class="invalid-feedback" data-sb-feedback="senha:required">Senha is required.</div>
            </div>
            <div class="d-none" id="submitSuccessMessage">
                <div class="text-center mb-3">
                    <div class="fw-bolder">Form submission successful!</div>
                    <p>To activate this form, sign up at</p>
                </div>
            </div>
            <div class="d-none" id="submitErrorMessage">
                <div class="text-center text-danger mb-3">Error sending message!</div>
            </div>
            <div class="d-grid">
                <button class="btn btn-primary btn-lg disabled" id="submitButton" type="submit" onclick="login()">Entrar</button>
            </div>
        </form>
    </div>
    <script src="https://cdn.startbootstrap.com/sb-forms-latest.js"></script>

<script>
    function login(){
        var email = document.getElementById('login').value;
        var senha = document.getElementById('senha').value;
        if(email == '' || senha == ''){
            swal('Atenção', 'Todos os campos devem ser preenchidos', 'info');
        }else{
            $.ajaxSetup({async:false});
            $.post("<?php echo site_url('login/login/');?>", {email:email, senha:senha}, function(data){
                console.log(data);
                switch(data){
                    case 'TRUE':
                        location.replace("<?php echo base_url('dashboard');?>");
                        break;
                    case 'FALSE: usuario':
                        var alerta = document.getElementById('alerta');
                        alerta.innerHTML = 'Usuário não cadastrado';
                        alerta.style.display = 'block';
                        break;
                    case 'FALSE: senha':
                        var alerta = document.getElementById('alerta');
                        alerta.innerHTML = 'Senha inválida';
                        alerta.style.display = 'block';
                        break;
                }
            });
        }
    }
</script>

</html>