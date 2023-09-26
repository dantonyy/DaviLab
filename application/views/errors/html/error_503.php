
<?php
$frasesManutencao = array(
    "Portuguese" => array(
        "Em manutenção", 
        "Pedimos desculpas pela inconveniencia. Para melhorar nossos serviços, nós desativamos temporariamente esta página.", 
        "Por favor, retorne em alguns instantes."
    ),
    "English" => array(
        "Under maintenance", 
        "We apologize for the inconvenience. In order to improve our services, we have temporarily disabled this page.", 
        "Please come back in a few moments."
    ),
    "Spanish" => array(
        "En manutención", 
        "Pedimos disculpas por las molestias. Para mejorar nuestros servicios, hemos deshabilitado temporalmente esta página.", 
        "Por favor, vuelve en unos momentos."
    )
);
?>


<!DOCTYPE html>
<html>
    <head>
        <title>Página em manutenção</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
        <meta charset="UTF-8">

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

            h2 {
                color: red;
                margin: 0 0 1rem 0;
                font-size: 6em;
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

            .animacaoZoomCod {
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
                font-size: 54px!important
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

            .sliding-text {
                white-space: nowrap;
                overflow: hidden;
                animation: slide 6s infinite;
            }

            @keyframes slide {
                0% {
                    transform: translateX(-100%);
                }

                50% {
                    transform: translateX(0%);
                }

                100% {
                    transform: translateX(200%);
                }


            }

        </style>
    </head>
    <body>
        <div class="centralizacaoTotal">
            <h1 class="centralizacaoTexto animacaoZoomCod">503</h1>
            <h2 class="fonteDestaque animacaoTopo centralizacaoTexto">
                <code id="frase1"></code>
            </h2><br>
            <hr class="divisorBranco animacaoEsquerda" style="margin:auto;width:50%"><br><br>
            <h3 class="centralizacaoTexto animacaoDireita" id="frase2"></h3><br><br>
            <h4 class="centralizacaoTexto animacaoZoom" id="frase3"></h4>
        </div>

        <script>

            
            var frasesManutencao = <?php echo json_encode($frasesManutencao); ?>;
            var indice = 0;
            var intervalo;

            function atualizarFrases() {
                var idioma = Object.keys(frasesManutencao)[indice];
                document.getElementById("frase1").textContent = frasesManutencao[idioma][0];
                document.getElementById("frase2").textContent = frasesManutencao[idioma][1];
                document.getElementById("frase3").textContent = frasesManutencao[idioma][2];

                indice = (indice + 1) % Object.keys(frasesManutencao).length;
            }

            atualizarFrases();

            function reiniciarAnimacaoEsquerda() {
                var elementos = document.querySelectorAll(".animacaoEsquerda");
                elementos.forEach(function(elemento) {
                    elemento.classList.remove("animacaoEsquerda");
                    void elemento.offsetWidth;
                    elemento.classList.add("animacaoEsquerda");
                });
            }

            function reiniciarAnimacaoDireita() {
                var elementos = document.querySelectorAll(".animacaoDireita");
                elementos.forEach(function(elemento) {
                    elemento.classList.remove("animacaoDireita");
                    void elemento.offsetWidth;
                    elemento.classList.add("animacaoDireita");
                });
            }

            function reiniciarAnimacaoZoom() {
                var elementos = document.querySelectorAll(".animacaoZoom");
                elementos.forEach(function(elemento) {
                    elemento.classList.remove("animacaoZoom");
                    void elemento.offsetWidth;
                    elemento.classList.add("animacaoZoom");
                });
            }

            function reiniciarAnimacaoTopo() {
                var elementos = document.querySelectorAll(".animacaoTopo");
                elementos.forEach(function(elemento) {
                    elemento.classList.remove("animacaoTopo");
                    void elemento.offsetWidth;
                    elemento.classList.add("animacaoTopo");
                });
            }

            function iniciarIntervalo() {
                intervalo = setInterval(function() {
                    atualizarFrases();
                    reiniciarAnimacaoEsquerda();
                    reiniciarAnimacaoDireita();
                    reiniciarAnimacaoZoom();
                    reiniciarAnimacaoTopo();
                }, 6000);
            }

            window.addEventListener("DOMContentLoaded", function() {
                document.body.classList.remove("carregando");
                document.body.classList.add("carregado");
                iniciarIntervalo();
            });
        </script>


    </body>
</html>