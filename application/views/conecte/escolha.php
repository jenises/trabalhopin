<!DOCTYPE html>
<html lang="pt-br">
  <head>
    <meta charset="utf-8">
    <title>Mine - Área do Cliente</title>
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
            <div class="row-fluid" style="margin-top:10%">
                <div class="span6 offset3">
                    <div class="widget-box" >
                        <div class="widget-title">
                            <span class="icon">
                                <i class="icon-user"></i>
                            </span>
                            <h5>Escolha o tipo de cadastro</h5>
                        </div>
                        <div class="widget-content nopadding">
                            <form action="<?php echo site_url('mine/cadastrar'); ?>" id="formCliente" method="post" class="form-horizontal" >
                                <div class="control-group">
                                    <label for="empreendedor" class="control-label">Empreendedor<span class="required">*</span></label>
                                    <div class="controls">
                                        <input id="nomeCliente" type="radio" name="tipo" value="<?php echo set_value('nomeCliente'); ?>"  />
                                    </div>
                                </div>
                                <div class="control-group">
                                    <label for="investidor" class="control-label">Investidor<span class="required">*</span></label>
                                     <div class="controls">                                        
                                         <input id="investidor" type="radio" name="tipo" value="<?php echo set_value('documento'); ?>"  />
                                    </div>
                                </div>
                                <div class="form-actions">
                                    <div class="span12">
                                        <div class="span6 offset3">
                                            <button type="submit" class="btn btn-success btn-large"><i class="icon-plus icon-white"></i> Cadastrar</button>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>


            <script src="<?php echo base_url()?>assets/js/jquery.validate.js"></script>
            <script type="text/javascript">
                  $(document).ready(function(){
                       $('#formCliente').validate({
                        rules :{
                              nomeCliente:{ required: true},
                              documento:{ required: true},
                              telefone:{ required: true},
                              email:{ required: true},
                              rua:{ required: true},
                              numero:{ required: true},
                              bairro:{ required: true},
                              cidade:{ required: true},
                              estado:{ required: true},
                              cep:{ required: true}
                        },
                        messages:{

                              nomeCliente :{ required: 'Campo Requerido.'},
                              documento :{ required: 'Campo Requerido.'},
                              telefone:{ required: 'Campo Requerido.'},
                              email:{ required: 'Campo Requerido.'},
                              rua:{ required: 'Campo Requerido.'},
                              numero:{ required: 'Campo Requerido.'},
                              bairro:{ required: 'Campo Requerido.'},
                              cidade:{ required: 'Campo Requerido.'},
                              estado:{ required: 'Campo Requerido.'},
                              cep:{ required: 'Campo Requerido.'}

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
      <div id="footer" class="span12"> <?= date('Y') ?> &copy; MapOS</div>
    </div>

    <!-- javascript
    ================================================== -->

    <script src="<?php echo base_url();?>assets/js/bootstrap.min.js"></script> 


  </body>
</html>