<?php $this->lang->load('politica_privacidade_lang', 'portuguese');?>

<style>
.d_davi{
  border-color: #048B8B;
  color:#f4f6fa;
}    

.circle{
    border-radius: 50%;
    width: 50px;
    height: 50px; 
    background-color: #048B8B;
}

.center{
  margin: auto;
  padding: 50px;
}

.title_davi{
    display: inline-block;
    background-color: #048B8B;
    margin: 15px;
    border-radius: 50%;
}
.button_davi{
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



<body style="background-color: #048B8B">

    <div class="container" style="position: absolute; margin: auto; top: 0; bottom: 0; left: 0; right: 0; width: 100%; height: 800px;"  >
        <form action="<?php echo base_url('usuario')?>" method="post" >
            <div class="row justify-content-center" >
                
                <div class="col-sm-10 col-sm-offset-1 col-md-10 col-xl-6 main">
                    <div class="card o-hidden border-0 shadow-lg my-4">

                        <div class="wizard-header text-center">
                            <div class="col">
                                <div class="p-4">
                                    <div class="text-center">
                                
                                        <div class="circle center fa-bounce fa-solid"  >
                                            <div class="fa-solid fa-d  d_davi fa-5x  " style="margin-left: -25px; margin-top:-40px;" >
                                            
                                            </div>
                                        </div>
                                        
                                        <h1 class="h4 text-gray-900 mb-4 ">Davi</h1>
                                    
                                    </div>
                                </div>
                            </div>
                            <br>
                            <h3 class="wizard-title"><?php echo lang('politica_privacidade');?></h3>
                        </div>

                        <div class="col-md-12 " >
                            <div class="px-4 d-flex justify-content-between align-items-center" style="padding-top: 20px">
                                <div class="card-body">
                                    <div class="tab-content " style="margin: 60px 60px 60px;">

                                        <div class="row " >
                                            <p class="fs-5 ">  <?php echo lang('texto_lgpd');?>  </p>

                                        </div>
            
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="wizard-footer col-sm-12  " >
                        
                            <div class="d-grid gap-2 d-md-flex justify-content-md-center ">
                                <h4><?php echo lang('politica_privacidade_consentir');?> <input type="checkbox" id="myCheck" onclick="myFunction()" style="width: 15px;height: 15px;"></h4>
                            </div>
                            <div class="d-grid gap-2 d-md-flex justify-content-md-center "> 
                                
                                <br>
                                <button type="submit" id="aceitar" name="finalizar" value="finalizar" class="btn btn-primary btn-fill btn-lg btn-primary btn-wd " style="background-color:#048B8B; display:none;">Aceito</button>
                                        
                                <div class="clearfix"></div>   
                            </div><br>
                            
                        </div>

                    </div>
                
                </div>
            </div>
                        
                        
        </form>
    </div>

</body>


<script>
function myFunction() {

  var checkBox = document.getElementById("myCheck");
 
  var texto = document.getElementById("aceitar");

 
  if (checkBox.checked == true){
    texto.style.display = "block";
  } else {
    texto.style.display = "none";
  }
}

</script>