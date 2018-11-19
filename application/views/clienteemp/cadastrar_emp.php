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
                           
                            <form action="<?php echo base_url(); ?>index.php/ClienteEmp/adicionar" id="formCliente" method="post" class="form-horizontal" >
                                <div class="control-group">
                                    <label for="nome" class="control-label">Nome<span class="required">*</span></label>
                                    <div class="controls">
                                        <input id="nome" type="text" name="nome" value="<?php echo set_value('nome'); ?>"  />
                                    </div>
                                </div>
                            
                                <div class="control-group">
                                    <label for="cpf" class="control-label">CPF<span class="required">*</span></label>
                                     <div class="controls">                                        
                                         <input id="cpf" type="text" name="cpf" value="<?php echo set_value('documento'); ?>"  /> 
                                         <span for="documento" generated="true" class="help-inline">Será usado para login</span>
                                     </div>
                                </div>
                                    
                                <div class="control-group">
                                    <label for="telefone" class="control-label">Telefone<span class="required">*</span></label>
                                    <div class="controls">
                                        <input id="telefone" type="text" name="telefone" value="<?php echo set_value('telefone'); ?>"  />
                                    </div>
                                </div>
                                <div class="control-group">
                                    <label for="endereco" class="control-label">Endereço<span class="required">*</span></label>
                                    <div class="controls">
                                        <input id="endereco" type="text" name="endereco" value="<?php echo set_value('endereco'); ?>"  />
                                    </div>
                                </div>
                                    
                                <div class="control-group" class="control-label">
                                    <label for="rg" class="control-label">Rg<span class="required">*</span></label>
                                    <div class="controls">
                                        <input id="rg" type="text" name="rg" value="<?php echo set_value('rg'); ?>"  />
                                    </div>
                                </div>

                                    
                                <div class="control-group" class="control-label">
                                    <label for="senha" class="control-label">Senha<span class="required">*</span></label>
                                    <div class="controls">
                                        <input id="senha" type="text" name="senha" value="<?php echo set_value('senha'); ?>"  />
                                    </div>
                                </div>


                                <div class="form-actions">
                                    <div class="span12">
                                        <div class="span6 offset3">
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
                              nome:{ required: true},
                              cpf:{ required: true},
                              telefone:{ required: true},
                              endereco:{ required: true},
                              rg:{ required: true},
                              senha:{ required: true}
                        },
                        messages:{

                              nome :{ required: 'Campo Requerido.'},
                              cpf :{ required: 'Campo Requerido.'},
                              telefone:{ required: 'Campo Requerido.'},
                              endereco:{ required: 'Campo Requerido.'},
                              rg:{ required: 'Campo Requerido.'},
                              senha:{ required: 'Campo Requerido.'},

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