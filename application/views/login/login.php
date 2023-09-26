<?php $this->lang->load('login_lang', 'portuguese');?>

<head>
	<meta name="viewport" content="width=device-width, initial-scale=1">
<!--===============================================================================================-->	
	<link rel="icon" type="image/png" href="<?php echo base_url();?>application/views/includes/assets/login_page/images/icons/favicon.ico"/>
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>application/views/includes/assets/login_page/vendor/bootstrap/css/bootstrap.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>application/views/includes/assets/login_page/fonts/font-awesome-4.7.0/css/font-awesome.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>application/views/includes/assets/login_page/vendor/animate/animate.css">
<!--===============================================================================================-->	
	<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>application/views/includes/assets/login_page/vendor/css-hamburgers/hamburgers.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>application/views/includes/assets/login_page/vendor/select2/select2.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>application/views/includes/assets/login_page/css/util.css">
	<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>application/views/includes/assets/login_page/css/main.css">
<!--===============================================================================================-->
</head>
<body>
	<div class="limiter">
		<div class="container-login100">
			<div class="wrap-login100">
				<div class="login100-pic js-tilt" data-tilt>
					<img src="<?php echo base_url();?>application/views/includes/assets/login_page/images/img-01.png" alt="IMG">
				</div>

				<form class="login100-form validate-form">
					<span class="login100-form-title">
						DaviLab
					</span>

					<div class="wrap-input100 validate-input" data-validate = "Valid email is required: ex@abc.xyz">
						<input class="input100" type="text" name="email" placeholder="Email">
						<span class="focus-input100"></span>
						<span class="symbol-input100">
							<i class="fa fa-envelope" aria-hidden="true"></i>
						</span>
					</div>

					<div class="wrap-input100 validate-input" data-validate = "Password is required">
						<input class="input100" type="password" name="pass" placeholder="Password">
						<span class="focus-input100"></span>
						<span class="symbol-input100">
							<i class="fa fa-lock" aria-hidden="true"></i>
						</span>
					</div>
					
					<div class="container-login100-form-btn">
						<button class="login100-form-btn">
							Login
						</button>
					</div>

					<div class="text-center p-t-12">
						<!-- <span class="txt1">
							Forgot
						</span>
						<a class="txt2" href="#">
							Username / Password?
						</a> -->
					</div>

					<div class="text-center p-t-136">
						<!-- <a class="txt2" href="#">
							Create your Account
							<i class="fa fa-long-arrow-right m-l-5" aria-hidden="true"></i>
						</a> -->
					</div>
				</form>
			</div>
		</div>
	</div>
	
	

	
<!--===============================================================================================-->	
	<script src="<?php echo base_url();?>application/views/includes/assets/login_page/vendor/jquery/jquery-3.2.1.min.js"></script>
<!--===============================================================================================-->
	<script src="<?php echo base_url();?>application/views/includes/assets/login_page/vendor/bootstrap/js/popper.js"></script>
	<script src="<?php echo base_url();?>application/views/includes/assets/login_page/vendor/bootstrap/js/bootstrap.min.js"></script>
<!--===============================================================================================-->
	<script src="<?php echo base_url();?>application/views/includes/assets/login_page/vendor/select2/select2.min.js"></script>
<!--===============================================================================================-->
	<script src="<?php echo base_url();?>application/views/includes/assets/login_page/vendor/tilt/tilt.jquery.min.js"></script>
	<script >
		$('.js-tilt').tilt({
			scale: 1.1
		})
	</script>
<!--===============================================================================================-->
	<script src="<?php echo base_url();?>application/views/includes/assets/login_page/js/main.js"></script>
<script>
	const queryString = window.location.search;
	const urlParams = new URLSearchParams(queryString);

	const client_id = urlParams.get('client_id');
	code = urlParams.get('code');

	if (urlParams == '') {
		console.log("Parâmetros não encontrados");
		//document.getElementById("div_login").style.display = "none";

	} else {
		for (const param of urlParams) {
			console.log(param);
		}

		$.ajaxSetup({async:false});
		$.post("<?php echo site_url('login/request_token');?>",{code:code},
			function(data, status) {
				// $.ajaxSetup({async:false});
				// $.post("<?php echo site_url('login/resources');?>",{tokens:data},
				// 	function(data, status) {
				// 	if(data){
				// 		window.location = "<?php echo site_url('dashboard');?>";
				// 	}else{
				// 		window.location = "<?php echo site_url('login');?>";
				// 	}
				// 	} // Fecha function
				// ); // fecha POST
			} // Fecha function
		); // fecha POST
	}
    function login(form){
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