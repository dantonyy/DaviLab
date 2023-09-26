    </body>


    <?php 
        $data['usuario'] = $this->usuario_model->getUsuarioAutenticacao($this->session->userdata('id_usuario'));
        $usuario_json = json_encode($data['usuario']);
        echo "<script>var usuario = $usuario_json;</script>";
    ?>


    <script>







// Calcula o valor da margem direita
// const divConteudo2 = document.querySelectorAll('.conteudoPaddingSuperior *');
//                     var correcaoMargemEsquerdaDesktop = divConteudo2;
//                     console.log(divConteudo2);
//                     var margemDireita = correcaoMargemEsquerdaDesktop.getBoundingClientRect().width ;
//                     console.log(margemDireita);

//                     // Itera sobre os divConteudo2 encontrados
//                     for (var i = 0; i < divConteudo2.length; i++) {
//                     var elemento = divConteudo2[i];
                    
//                     // Obtém os estilos aplicados ao elemento
//                     var estilos = window.getComputedStyle(elemento);
                    
//                     // Imprime os estilos no console
//                     console.log(estilos);
//                     }






/**
 *  * * [------------------------------------------------ Instruções do footer ---------------------------------------------]
 * * * As cores definidas aqui só funcionam com a extensão Better Comments
 * !Os códigos para atenção serão chamados aqui = Developer mode e testes || casos em que é necessário corrigir o código também
 * ? Dúvidas sobre algum elemento
 * TODO: Quando for necessária uma correção futura
 * */




/* ------------------------------------------------------------------------------------------------------------------------ */
/* ---------------- Função de padding-top deste conteúdo - atualização por carregar a pág ou redimensionar ---------------- */
/* ----------- Refatorar: Pode haver maneiras melhores de ajustar a div abaixo do menu (estudar SCSS ou SASS) ------------- */
    // document.addEventListener("DOMContentLoaded", function() { retirado pois agora o menu é fixo

        function atualizacaoPaddingSuperiorPagina() {

            // Obtém a classe da div que será ajustada (div principal - obs.: acrescentar a classe na primeira div da tela)
            var divConteudo = document.querySelector(".conteudoPaddingSuperior");
            var alturaFixaDivMob = document.querySelector("#divMenuMob").offsetHeight;
            var larguraFixaDivDesk = document.querySelector("#divMenuDesk").offsetWidth;

            var alturaTela = window.innerHeight;
            var larguraTela = window.innerWidth;



            var tamanhoFonteRaiz = parseFloat(getComputedStyle(document.documentElement).fontSize);
            var umRemEmPorcentagem = (1 / tamanhoFonteRaiz) * larguraTela;

            // console.log("umRemEmPorcentagem" + umRemEmPorcentagem);






            // Verifica se é um dispositivo móvel
            if (window.innerWidth <= 1200) {

                    var alturaAjustada = alturaFixaDivMob - 25; // Subtrai 25 pixels da altura da div do menu para ajuste
                    
                    divConteudo.style.paddingTop = alturaAjustada + "px";
                    divConteudo.style.marginLeft = "0";
                    // console.log(divConteudo.style.paddingTop);
                    // console.log(divConteudo.style.marginLeft);

                } 
                
                // elseif( <window.innerWidth <= 1200 larguraTela > alturaTela + (alturaTela * 0.6)){

                //     var larguraAjustada = larguraFixaDivDesk - (larguraTela * 0.66) - (umRemEmPorcentagem * 1.5); // Subtrai 25 pixels da altura da div do menu para ajuste


                //     divConteudo.style.marginLeft = larguraAjustada + "px";

                //     divConteudo.style.paddingTop = "10px";

                // }
                
                
                else {

                    // Remove a classe "bootstrap"
                    divConteudo.classList.remove("px-4");
                    // divConteudo.classList.remove("mt-4");



                    var larguraAjustada = larguraFixaDivDesk - (larguraTela * 0.66) - 100;// - (larguraTela * 0.2);//(umRemEmPorcentagem * 1.5); // Subtrai 25 pixels da altura da div do menu para ajuste


                    divConteudo.style.marginLeft = larguraAjustada + "px";

                    divConteudo.style.paddingTop = "10px";

// // 
// function remToPx(valueInRem) {
//   // Obtém o tamanho base em pixels
//   const baseFontSize = parseFloat(getComputedStyle(document.documentElement).fontSize);

//   // Converte o valor em rem para pixels
//   const valueInPx = valueInRem * baseFontSize;

//   return valueInPx;
// }
// 

// 



                    // divConteudo.style.marginLeft = "300px";

                    // // Obtém o correcaoMargemEsquerdaDesktop pela var divConteudo
                    // // divConteudo.style.marginLeft = '0px';
                    // var correcaoMargemEsquerdaDesktop = divConteudo;

                    // // // Calcula o valor da margem esquerda
                    // var margemDireita = correcaoMargemEsquerdaDesktop.getBoundingClientRect().width / 3; // metade da largura do correcaoMargemEsquerdaDesktop
                    // // var margemEsquerda = margemDireita + 80; // margem esquerda é 300 pixels a mais do que a margem direita

                    // // // Define o valor da margem esquerda no correcaoMargemEsquerdaDesktop
                    // // divConteudo.style.marginLeft = margemEsquerda + 'px';


                    // //acima ou abaho

                    // // Calcula o valor da margem direita
                    // const divConteudo2 = document.querySelectorAll('.conteudoPaddingSuperior *');
                    // var correcaoMargemEsquerdaDesktop = divConteudo2;
                    // // console.log(divConteudo2);
                    // var margemDireita = correcaoMargemEsquerdaDesktop.getBoundingClientRect().width ;
                    // // console.log(margemDireita);

                    

                    // // Remove o 'px' do valor da margem direita
                    // var valorNumerico = parseFloat(margemDireita);

                    // // Calcula o valor da margem esquerda como 10% a mais do que a margem direita
                    // var margemEsquerda = valorNumerico + (valorNumerico * 0.3); // 'calc(' + margemDireita + ' + 10%)';

                    // // Define o valor da margem esquerda no divConteudo
                    // divConteudo.style.marginLeft = margemEsquerda + 'px';


                    // console.log(divConteudo.style.paddingTop);
                    // console.log(divConteudo.style.marginLeft);

                    // // acima ou abaho


                    // // Obtém a margem direita atual
                    // var margemDireita = window.getComputedStyle(correcaoMargemEsquerdaDesktop).marginRight;

                    // // Remove o 'px' do valor da margem direita
                    // var valorNumerico = parseFloat(margemDireita);

                    // // Calcula a margem esquerda como 10% a mais do que a margem direita
                    // var margemEsquerda = valorNumerico + (valorNumerico * 0.3); // 0.1 representa 10%

                    // // Define o valor da margem esquerda no divConteudo
                    // divConteudo.style.marginLeft = margemEsquerda + 'px';
                }
        }

        // Atualizar sempre quando a página é carregada ou redimensionada
        window.addEventListener("load", atualizacaoPaddingSuperiorPagina);
        window.addEventListener("resize", atualizacaoPaddingSuperiorPagina);

        // Chamar a função pela primeira vez
        atualizacaoPaddingSuperiorPagina();

    // });








        /* ----------------------------------------------- Funções Conversora de data ---------------------------------------------- */
        //Função 1 - HTML para MySQL => Quando enviar dados para o banco
        function converterFormatoDataHtmlMySql(dataEmHtml) {
            var partes = dataEmHtml.split("/");
            var dia = partes[0];
            var mes = partes[1];
            var ano = partes[2];
            var dataMySql = ano + "-" + mes + "-" + dia;

            return dataMySql;
        }
        //Função 2 - MySQL para HTML => Quando receber dados do banco
        function converterFormatoDataMySqlHtml(dataEmMySql) {
            var partes = dataEmMySql.split("-");
            var dia = partes[2];
            var mes = partes[1];
            var ano = partes[0];
            var dataHtml = dia + "/" + mes + "/" + ano;

            return dataHtml;
        }

        /* ---------------------------------------------- Funções de Cálculo da Idade --------------------------------------------- */

        function calcularIdade(data) {
            var formatoData = detectarFormatoData(data);
            var dataCalculo;

            if (formatoData === "DD/MM/AAAA") {
                dataCalculo = converterFormatoDataHtmlMySql(data);
            } else if (formatoData === "AAAA-MM-DD") {
                dataCalculo = data;
            } else {
                console.log("Formato de data inválido. Utilize 'DD/MM/AAAA' ou 'AAAA-MM-DD'.");
            }

            var dataAtual = new Date();
            var dataNascimento = new Date(dataCalculo);
            var diferenca = dataAtual - dataNascimento;
            var idade = Math.floor(diferenca / (1000 * 60 * 60 * 24 * 365));

            return idade + " anos";
        }

        // Função para detectar o formato da data
        function detectarFormatoData(data) {
            if (data.includes("/")) {
                return "DD/MM/AAAA";
            } else if (data.includes("-")) {
                return "AAAA-MM-DD";
            } else {
                return "Formato de data inválido. Utilize 'DD/MM/AAAA' ou 'AAAA-MM-DD'.";
            }
        }


        /* ------------------------------------------------ Classe idadeUsuario ------------------------------------------------ */
        // Variável idadeUsuario aparece quando qualquer elemento HTML possui a classe com nome de idadeUsuario
        var idade_usuario = calcularIdade(usuario.data_nascimento); 

        // Obtém todos os elementos com a classe "idadeUsuario"
        var textoIdadeUsuario = document.getElementsByClassName("idadeUsuario");

        Array.from(textoIdadeUsuario).forEach(function(textoIdadeUsuarioCada) {
            textoIdadeUsuarioCada.innerHTML = idade_usuario;
        });

        /* ------------------------------------------------ Classe nomeUsuario ------------------------------------------------ */
        // Variável idadeUsuario aparece quando qualquer elemento HTML possui a classe com nome de idadeUsuario
        var nome_usuario = usuario.nome; 

        // Obtém todos os elementos com a classe "nomeUsuario"
        var textonomeUsuario = document.getElementsByClassName("nomeUsuario");

        Array.from(textonomeUsuario).forEach(function(textonomeUsuarioCada) {
            textonomeUsuarioCada.innerHTML = nome_usuario;
        });

        /* ------------------------------------------------ Classe emailUsuario ------------------------------------------------ */
        // Variável idadeUsuario aparece quando qualquer elemento HTML possui a classe com nome de idadeUsuario
        var email_usuario = usuario.email; 

        // Obtém todos os elementos com a classe "emailUsuario"
        var textoemailUsuario = document.getElementsByClassName("emailUsuario");

        Array.from(textoemailUsuario).forEach(function(textoemailUsuarioCada) {
            textoemailUsuarioCada.innerHTML = email_usuario;
        });

        
        /* ------------------------------------------------ Classe nacimentoUsuario ------------------------------------------------ */
        // Variável idadeUsuario aparece quando qualquer elemento HTML possui a classe com nacimento de idadeUsuario
        var nacimento_usuario = usuario.nacimento; 

        // Obtém todos os elementos com a classe "nacimentoUsuario"
        var textonacimentoUsuario = document.getElementsByClassName("nacimentoUsuario");

        Array.from(textonacimentoUsuario).forEach(function(textonacimentoUsuarioCada) {
            textonacimentoUsuarioCada.innerHTML = nacimento_usuario;
        });
        
        /* ------------------------------------------------ Classe sexoUsuario ------------------------------------------------ */
        // Variável idadeUsuario aparece quando qualquer elemento HTML possui a classe com sexo de idadeUsuario
        var sexo_usuario = usuario.sexo; 

        // Obtém todos os elementos com a classe "sexoUsuario"
        var textosexoUsuario = document.getElementsByClassName("sexoUsuario");

        Array.from(textosexoUsuario).forEach(function(textosexoUsuarioCada) {
            textosexoUsuarioCada.innerHTML = sexo_usuario;
        });

        /* ------------------------------------------------ Classe nacionalidadeUsuario ------------------------------------------------ */
        // Variável idadeUsuario aparece quando qualquer elemento HTML possui a classe com nacionalidade de idadeUsuario
        var nacionalidade_usuario = usuario.nacionalidade; 

        // Obtém todos os elementos com a classe "nacionalidadeUsuario"
        var textonacionalidadeUsuario = document.getElementsByClassName("nacionalidadeUsuario");

        Array.from(textonacionalidadeUsuario).forEach(function(textonacionalidadeUsuarioCada) {
            textonacionalidadeUsuarioCada.innerHTML = nacionalidade_usuario;
        });




        /* ----------------------------------------------------- Função do tema --------------------------------------------------- */
        // Modo light/dark
        $(document).ready(function() {
            // Recupera o valor atual do tema (light ou dark) armazenado no localStorage
            var temaAtual = localStorage.getItem('tema');
            
            // Se o valor do tema estiver definido, altera o tema para o valor atual
            if (temaAtual == 'dark') {
                $('body').removeClass('bg-light bg-dark text-dark text-light');
                $('body').addClass('modoEscuro text-light');
                $('#temaSwitch').prop('checked', true);
            } else {
                $('body').removeClass('bg-light bg-dark text-dark text-light');
                $('body').removeClass('modoEscuro text-light');
                $('#temaSwitch').prop('checked', false);
            }
        });

        /* ---------------------------------------------- Função de contagem para logout ------------------------------------------- */
        // Temporizador
    
        var countDownDate = new Date().getTime()+600000;//10minutos
        var count = 0;

        var x = setInterval(function() {
            var now = new Date().getTime();
            var distance = countDownDate - now;
            
            if (distance < 30000 & count ==0) {//30s
                swal({
                    title: '<?php echo lang('ola');?>',
                    text: '<?php echo lang('pressione_ok');?>',
                    icon: 'success',
                    buttons : {
                        confirm: {
                        className : 'btn btn-info'
                        }
                    }
                    }).then(function(){ 
                        countDownDate = new Date().getTime()+600000;//10m
                        count =0;
                    });
                
                count =1;
            }

            if(distance < 0){
                clearInterval(x);
                window.location.href = "<?php echo site_url('login/logout');?>";
            }
        }, 1000);






/* ------------------------------------------------------------------------------------------------------------------------- */
/**
 * !--------------------------------------------------------------------------------------------------------------------------
 * !--------------------------------------------------------------------------------------------------------------------------
 * !--------------------------------------------------------------------------------------------------------------------------
 *  * * ------------------------------------------------- Funções Developer Mode ------------------------------------------------
 * !Não deixar ativo no código, apeas no modo de testes e debug de software
 * ? Uso apenas quando necessário debugar
 * TODO: Verificar possibilidade de sempre ter a permissão tela cheia do usuario independente o dispositivo
 * */
/*  */
/* ------------------------------- Funções atualização de página automatico (1000 = 1 segundo) ----------------------------- */


        // // Função para recarregar a página
        // function reloadPage() {
        //     location.reload();

        // }

        // // Chama a função reloadPage a cada x segundos (x000 milissegundos)
        // setInterval(reloadPage, 10000);


/**
 * !---------------------------------------------------------------------------------------------------------------------------
 * * -------------------------------------------------- Funções Tela cheia ----------------------------------------------------
 * !Não deixar ativo no código, caso 
 * ? Uso apenas quando necessário debugar
 * TODO: Verificar possibilidade de sempre ter a permissão tela cheia do usuario independente o dispositivo
 * */

        // function telaInteiraDeveloperMode() {
        //     var doc = window.document;
        //     var docEl = doc.documentElement;

        //     var requestFullScreen = docEl.requestFullscreen || docEl.mozRequestFullScreen || docEl.webkitRequestFullScreen || docEl.msRequestFullscreen;
        //     var exitFullScreen = doc.exitFullscreen || doc.mozCancelFullScreen || doc.webkitExitFullscreen || doc.msExitFullscreen;

        //     if (!doc.fullscreenElement && !doc.mozFullScreenElement && !doc.webkitFullscreenElement && !doc.msFullscreenElement) {
        //         requestFullScreen.call(docEl);
        //         localStorage.setItem('fullscreen', 'true');
        //     } else {
        //         exitFullScreen.call(doc);
        //         localStorage.setItem('fullscreen', 'false');
        //     }
        // }

        // document.addEventListener('DOMContentLoaded', function() {
        //     var fullscreenStatus = localStorage.getItem('fullscreen');

        //     if (fullscreenStatus === 'true') {
        //         telaInteiraDeveloperMode();
        //     }
        // });

        
    
// function telaInteiraDeveloperMode() {
//   var doc = window.document;
//   var docEl = doc.documentElement;

//   var requestFullScreen = docEl.requestFullscreen || docEl.mozRequestFullScreen || docEl.webkitRequestFullScreen || docEl.msRequestFullscreen;
//   var exitFullScreen = doc.exitFullscreen || doc.mozCancelFullScreen || doc.webkitExitFullscreen || doc.msExitFullscreen;

//   if (!doc.fullscreenElement && !doc.mozFullScreenElement && !doc.webkitFullscreenElement && !doc.msFullscreenElement) {
//     requestFullScreen.call(docEl);
//   } else {
//     exitFullScreen.call(doc);
//   }
// }



/** 
 * !---------------------------------------------------------------------------------------------------------------------------
 * * ------------------------------------------------ Função Captura Classes --------------------------------------------------
 * ! Ativar apenas quando necessário testes de caso
 * */

        // const divConteudo2 = document.querySelectorAll('.conteudoPaddingSuperior *');

        // function exibirEstilosComUnidade(elemento) {
        //     const estilos = window.getComputedStyle(elemento);
        //     const propriedades = Array.from(estilos);

        //     for (const propriedade of propriedades) {
        //         const valor = estilos.getPropertyValue(propriedade);

        //         // Verifica se o valor possui uma unidade
        //         if (valor.match(/px|%|rem|em|vw|vh/)) {
        //         console.log(propriedade + ': ' + valor);
        //         }
        //     }
        // }

        // divConteudo2.forEach(function (elemento) {
        // exibirEstilosComUnidade(elemento);
        // });



    </script>
    

        



</html>