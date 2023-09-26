<!DOCTYPE html>
<html>
    <head>
        <title>Acesso Negado</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
        <meta charset="UTF-8">
        <link rel="stylesheet" href="style.css">

        <!-- Bootstrap, Animate, FontAwesome, JQuery e SweetAlert -->
        <link href="<?php echo base_url();?>assets/bootstrap-5.3.0-alpha3-dist/css/bootstrap.min.css"  rel="stylesheet">
        <link href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" rel="stylesheet"/>
        
        <script src="<?php echo base_url();?>assets/bootstrap-5.3.0-alpha3-dist/js/bootstrap.bundle.min.js"></script>
        <script src="<?php echo base_url();?>assets/jquery-3.6.4.min.js"></script>
        <script src="<?php echo base_url();?>assets/fonts/font-awesome/js/all.js"></script>
        
        <?php $this->load->helper('language');?>
        <?php $this->lang->load('errors_html_lang', 'portuguese');?>

        <style>

            body * {
                margin: 0;
                padding: 0;
            }

            body {
                font: normal 100%/1.15 "Merriweather", serif;
                background-color: #048B8B;
                color: white;
            }

            h1 {
                color: red;
                margin: 0 0 1rem 0;
                font-size: 8em;
                text-shadow: 0 0 6px #8b4d1a;
            }

            code {
                color: white;
            }

            h6{
                color: red;
                text-decoration: underline;
            }

            p {
				margin-bottom: 0.5em;
				font: "Merriweather", serif;
				font-size: 1.75em;
				color: #ea8a1a;
            }

            p > a {
                border-bottom: 1px dashed #837256;
                font-style: italic;
                text-decoration: none;
                color: #837256;
            }

            .centralizacaoTotal {
                position: absolute;
                top: 50%;
                left: 50%;
                transform: translate(-50%,-50%);
                -ms-transform: translate(-50%,-50%)
            }

            .centralizacaoTexto {
                text-align: center!important;
            }

            .animacaoZoom {
                animation: animandoZoom 0.6s;
            }

            @keyframes animandoZoom {
                from {
                    transform: scale(0)
                }

                to {
                    transform: scale(1)
                }
            }

            .fonteDestaque {
                font-size: 64px!important
            }

            .animacaoTopo {
                position: relative;
                animation: animandoTopo 0.4s
            }

            @keyframes animandoTopo {
                from {
                    top: -300px;
                    opacity: 0
                }

                to {
                    top: 0;
                    opacity: 1
                }
            }

            .divisorBranco {
                border-color: #fff!important
            }

            .animacaoEsquerda {
                position: relative;
                animation: animandoEsquerda 0.4s
            }

            @keyframes animandoEsquerda {
                from {
                    left: -300px;
                    opacity: 0
                }

                to {
                    left: 0;
                    opacity: 1
                }
            }

            .animacaoDireita {
                position: relative;
                animation: animandoDireita 0.4s
            }

            @keyframes animandoDireita {
                from {
                    right: -300px;
                    opacity: 0
                }

                to {
                    right: 0;
                    opacity: 1
                }
            }

        </style>
    </head>
    <body>
        <div class="centralizacaoTotal">
            <h1 class="centralizacaoTexto animacaoZoom"><?php echo lang('numero_erro_404');?></h1>
            <h1 class="fonteDestaque animacaoTopo centralizacaoTexto"><code><?php echo lang('pagina_nao_encontrada_404');?></code></h1><br>
            <hr class="divisorBranco animacaoEsquerda" style="margin:auto;width:50%"><br>
            <h3 class="centralizacaoTexto animacaoDireita"><?php echo lang('mensagem_erro_404');?></h3><br><br>
			<?php
				if (isset($_SERVER['HTTP_REFERER'])) {
					// Redireciona para a página anterior
					$redirectUrl = $_SERVER['HTTP_REFERER'];
				} else {
					// Redireciona para a página inicial (home page)
					$redirectUrl = base_url('usuario');
				}
			?>
            <h4 class="centralizacaoTexto animacaoZoom" ><?php echo lang('texto_erro_404');?><a style="color: white" href="#" onclick="window.location.href='<?php echo $redirectUrl; ?>'; return false;"><?php echo lang('link_login_404'); ?></a></h4>
        </div>
    </body>
</html>