<!DOCTYPE html>
<html lang="pt-br">
  <head>
    <meta charset="utf-8">
    <title>Smart Invest - Área do Cliente Empreendedor</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">

    <!-- Le styles -->
    <link rel="stylesheet" href="<?php echo base_url();?>assets/css/bootstrap.min.css" />
    <link rel="stylesheet" href="<?php echo base_url();?>assets/css/bootstrap-responsive.min.css" />
    <link rel="stylesheet" href="<?php echo base_url();?>assets/css/matrix-style.css" />
    <link rel="stylesheet" href="<?php echo base_url();?>assets/css/matrix-media.css" />
    <link href="<?php echo base_url();?>assets/font-awesome/css/font-awesome.css" rel="stylesheet" />
    <link rel="stylesheet" href="<?php echo base_url();?>assets/css/fullcalendar.css" /> 


    <link href="<?php echo base_url();?>assets/css/bootstrap-responsive.min.css" rel="stylesheet">
    <script type="text/javascript"  src="<?php echo base_url();?>assets/js/jquery-1.10.2.min.js"></script>
  </head>

  <body>            
      <div class="control-group normal_text " style="text-align: center"> <h3>
                   <img src="<?php echo base_url(); ?>assets/img/logo.png" alt="Logo"></h3>
                </div>

            <div class="row-fluid" style="margin-top:0px">

                <div class="span6 offset3">
                    <div class="widget-box">
                        <div class="widget-title">
                            <span class="icon">
                                <i class="icon-user"></i>
                            </span>
                            <h5>Cadastre-se no sistema</h5>
                        </div>
                        <div class="widget-content nopadding">
                           
                            <form action="<?php echo base_url(); ?>index.php/ClienteInvest/cadastrar" id="formCliente" method="post" class="form-horizontal" >
                                <div class="control-group">
                                    <label for="nome" class="control-label">Nome<span class="required">*</span></label>
                                    <div class="controls">
                                        <input id="nomecliente" type="text" name="nomecliente" value=""  />
                                    </div>
                                </div>
                            
                                
                                <div class="control-group">
                                    <label for="documento" class="control-label">CPF<span class="required">*</span></label>
                                     <div class="controls">                                        
                                         <input id="documento" type="text" name="documento" value=""  /> 
                                         <span for="documento" generated="true" class="help-inline">Será usado para login</span>
                                     </div>
                                </div>
                                
                                    
                                <div class="control-group" class="control-label">
                                    <label for="senha" class="control-label">Senha<span class="required">*</span></label>
                                    <div class="controls">
                                        <input id="senha" type="text" name="senha" value=""  />
                                    </div>
                                </div>
                                
                                <div class="control-group" class="control-label">
                                    <label for="senha2" class="control-label">Confirma Senha<span class="required">*</span></label>
                                    <div class="controls">
                                        <input id="senha2" type="text" name="senha2" value=""  />
                                    </div>
                                </div>
                                


                                <div class="form-actions">
                                    <div class="span12">
                                        <div class="span6 offset4">
                                            <button type="submit" class="btn btn-success btn-large"><i class="icon-plus icon-white"></i> Cadastrar</button>
                                            <!--<a href="<?php echo base_url() ?>index.php/mine" id="" class="btn btn-large"><i class="icon-lock"></i> Acessar</a>!-->
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>


            <script src="<?php echo base_url()?>assets/js/jquery.validate.js"></script>
            <script type="text/javascript">
                  $(document).ready(function(){
                       $('#formCliente').validate({
                           
                           
                        rules :{
                              nomecliente:{ required: true},
                              documento:{ required: true},
                              senha:{ required: true},
                              senha2: { equalTo: "#senha"}
                        },
                        messages:{

                              nomecliente :{ required: 'Campo Requerido.'},
                              documento :{ required: 'Campo Requerido.'},
                              senha:{ required: 'Campo Requerido.'},
                              senha2:{equalTo: 'As senhas não combinam.'}

                        },

                        errorClass: "help-inline",
                        errorElement: "span",
                        highlight:function(element, errorClass, validClass) {
                            $(element).parents('.control-group').addClass('error');
                        },
                        unhighlight: function(element, errorClass, validClass) {
                            $(element).parents('.control-group').removeClass('error');
                            $(element).parents('.control-group').addClass('success');
                        }
                       });
                  });
            </script>

    
    <!--Footer-part-->
    <div class="row-fluid">
      <div id="footer" class="span12"> <?= date('Y') ?> &copy; Pin Projeto Integrador - Smart Invest</div>
    </div>

    <!-- javascript
    ================================================== -->

    <script src="<?php echo base_url();?>assets/js/bootstrap.min.js"></script> 


  </body>
</html>