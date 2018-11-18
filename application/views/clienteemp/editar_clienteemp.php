<link rel="stylesheet" href="<?php echo base_url(); ?>assets/js/jquery-ui/css/smoothness/jquery-ui-1.9.2.custom.css" />
<script type="text/javascript" src="<?php echo base_url() ?>assets/js/jquery-ui/js/jquery-ui-1.9.2.custom.js"></script>
<script src="<?php echo base_url() ?>assets/js/jquery.validate.js"></script>
<script src="<?php echo base_url(); ?>assets/js/maskmoney.js"></script>




<script type="text/javascript">
    jQuery(document).ready(function ($) {
        $(".money").maskMoney();
        $("#formLogar").validate({
            rules: {
                cpf: {required: true},
                senha: {required: true},
            },
            messages: {
                cpf: {required: 'Campo Requerido.'},
                senha: {required: 'Campo Requerido.'},
            }
        });
    });

</script>
<style type="text/css">
    label.error{
        color: #b94a48;
    }
    input.error{
        border-color: #b94a48;
    }
    input.valid{
        border-color: #5bb75b;
    }


</style>
<?= var_dump($result)?>
<div class="widget-box">
    <div class="widget-title">
        <ul class="nav nav-tabs">
            <li class="active"><a data-toggle="tab" href="#tab1">Dados do Empreendedor</a></li>
            <li><a data-toggle="tab" href="#tab2">Cotas</a></li>
            <div class="buttons">
                <?php
                //var_dump($result);
                //
                    ////if ($this->permission->checkPermission($this->session->userdata('permissao'), 'eCliente')) {
                // echo '<a title="Icon Title" class="btn btn-mini btn-info" href="'.base_url().'index.php/clientesinvest/editar/'.$result->idclienteinvest.'"><i class="icon-pencil icon-white"></i> Editar</a>';
//} 
                ?>

            </div>
            <div class="buttons">
                <?php
                //if ($this->permission->checkPermission($this->session->userdata('permissao'), 'eCliente')) {
                //  echo '<a title="Icon Title" class="btn btn-mini btn-info" href="'.base_url().'index.php/clienteinvest"><i class="icon-backward icon-white"></i> Voltar</a>';
//} 
                ?>

            </div>

        </ul>
    </div>
    <div class="widget-content tab-content">
            <div id="tab1" class="tab-pane active" style="min-height: 300px">
                <form action="<?php echo base_url()."index.php/ClienteEmp/AlteraPerfil"; ?>" id="formCliente" method="post" class="form-horizontal" >                
                <div class="accordion" id="collapse-group">
                    <div class="accordion-group widget-box">
                        <div class="accordion-heading">
                            <div class="widget-title">
                                <a data-parent="#collapse-group" href="#collapseGOne" data-toggle="collapse">
                                    <span class="icon"><i class="icon-list"></i></span><h5>Dados da Empresa</h5>
                                </a>
                            </div>
                        </div>
                        <div class="collapse in accordion-body" id="collapseGOne">
                            <div class="widget-content">
                                <table  class="table table-bordered">
                                    <tbody>
                                        <tr>
                                            <td rowspan="5" style="width: 20%">
                                                <img src="<?php echo base_url() . $result->imagem ?>"><br>
                                                <a href="#modalLogo" data-toggle="modal" role="button" class="btn btn-inverse">Add Logo</a>
                                            </td>
                                            <td style="text-align: right; width: 15%"><strong>Nome/Razão</strong></td>
                                            <td style="text-align:left">
                                                <div class="controls" >
                                                    <input type="hidden" name="idclienteemp" id="idclienteemp" value="<?php echo $result->idclienteemp ?>" />
                                                    <input id="descricao" type="text" name="descricao" value="<?php echo $result->descricao; ?>"  />
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td style="text-align: right"><strong>Endereço</strong></td>
                                            <td>
                                                <div class="controls">
                                                    <input id="qtd_func" type="text" name="qtd_func" value="<?php echo $result->endereco; ?>"  />
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td style="text-align: right"><strong>Quantidade de funcionários</strong></td>
                                            <td>
                                                <div class="controls">
                                                    <input id="qtd_func" type="text" name="qtd_func" value="<?php echo $result->qtd_func; ?>"  />
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td style="text-align: right"><strong>Quantidade de Clientes</strong></td>
                                            <td>
                                                <div class="controls">
                                                    <input id="qtd_clientes" type="text" name="qtd_clientes" value="<?php echo $result->qtd_clientes; ?>"  />
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td style="text-align: right"><strong>Linkedin</strong></td>
                                            <td>
                                                <div class="controls">
                                                    <input id="linkedin" type="text" name="linkedin" value="<?php echo $result->linkedin; ?>"  />
                                                </div>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    <div class="accordion-group widget-box">
                        <div class="accordion-heading">
                            <div class="widget-title">
                                <a data-parent="#collapse-group" href="#collapseGTwo" data-toggle="collapse">
                                    <span class="icon"><i class="icon-list"></i></span><h5>Serviçoes e Produtos</h5>
                                </a>
                            </div>
                        </div>
                        <div class="collapse in accordion-body" id="collapseGTwo">
                            <div class="widget-content">
                                <table class="table table-bordered">
                                    <tbody>
                                        <tr>
                                            <td style="text-align: right; width: 30%"><strong>Produtos</strong></td>
                                            <td>
                                                <div class="controls">
                                                    <textarea id="produtos" class="span12" name="produtos"><?php echo $result->produtos; ?></textarea>
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td style="text-align: right"><strong>Serviços</strong></td>
                                            <td>
                                                <div class="controls">
                                                    <textarea id="servicos" class="span12" name="produtos"><?php echo $result->servicos; ?></textarea>
                                                </div>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    <div class="accordion-group widget-box">
                        <div class="accordion-heading">
                            <div class="widget-title">
                                <a data-parent="#collapse-group" href="#collapseGThree" data-toggle="collapse">
                                    <span class="icon"><i class="icon-list"></i></span><h5>Informações Adicionais</h5>
                                </a>
                            </div>
                        </div>
                        <div class="collapse in accordion-body" id="collapseGThree">
                            <div class="widget-content">
                                <table class="table table-bordered">
                                    <tbody>
                                        <tr>
                                            <td style="text-align: right; width: 30%"><strong>Visão</strong></td>
                                            <td><textarea id="visao" class="span12" name="visao"><?php echo $result->visao; ?></textarea></td>
                                        </tr>
                                        <tr>
                                            <td style="text-align: right"><strong>Missao</strong></td>
                                            <td><textarea id="missao" class="span12" name="missao"><?php echo $result->missao; ?></textarea></td>
                                        </tr>
                                        <tr>
                                            <td style="text-align: right"><strong>Objetivo</strong></td>
                                            <td><textarea id="objetivo" class="span12" name="objetivo"><?php echo $result->objetivo; ?></textarea></td>
                                        </tr>

                                </table>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="span12" style="padding: 1%; margin-left: 0">
                    <div class="span6 offset3" style="text-align: center">
                        <button class="btn btn-primary btn-large" id="btnContinuar"><i class="icon-white icon-ok"></i> Alterar</button>
                        <a href="<?php echo base_url() ?>index.php/ClienteEmp" id="" class="btn btn-large"><i class="icon-arrow-left"></i> Voltar</a>
                    </div>
                </div>
            </form>        
        </div>


        <div class="tab-pane" id="tab2">
            <div class="span10 well" style="padding: 1%; margin-left: 0">
                <form id="formCotas" action="<?php echo base_url() ?>index.php/os/adicionarProduto" method="post">
                    <input type="hidden" name="idclienteemp" id="idclienteemp" value="<?php echo $result->idclienteemp ?>" />
                    <div class="span3">

                        <label for="">Valor da Cota R$</label>
                        <input type="text" class="money" name="valor" id="produto" placeholder="Digite o valor da cota" />
                    </div>
                    <div class="span2">
                        <label for="">Quantidade diponíveis</label>
                        <input type="text" placeholder="Quantidade" id="quantidade" name="quantidade" class="s" />
                    </div>
                    <div class="span2">
                        <label for="">.</label>
                        <button class="btn btn-success span12" id="btnAdicionarProduto"><i class="icon-white icon-plus"></i> Adicionar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>


    <div id="modalLogar" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <form id="formLogar" action="<?php echo base_url() ?>index.php/ClienteInvest/logar" method="post">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                <h3 id="myModalLabel">Pin - Para poder continuar precisamos que você esteja logado!</h3>
            </div>
            <div class="modal-body">

                <div class="span12 alert alert-info" style="margin-left: 0"> Obrigatório o preenchimento dos campos com asterisco.</div>
                <div class="span12" style="margin-left: 0"> 
                    <label for="cpf">CPF*</label>
                    <input class="span12" id="cpf" type="text" name="cpf"  />
                    <input id="urlAtual" type="hidden" name="urlAtual" value="<?php echo current_url() ?>"  />
                </div>	
                <div class="span12" style="margin-left: 0"> 
                    <div class="span12" style="margin-left: 0"> 
                        <label for="senha">Senha*</label>
                        <input class="span12" id="senha" type="password" name="senha"/>
                    </div>
                </div>

            </div>
            <div class="modal-footer">
                <button class="btn btn-large btn-primary pull-left" data-dismiss="modal" aria-hidden="true" style="">Cadastre-se</button>
                <button class="btn" data-dismiss="modal" aria-hidden="true">Cancelar</button>
                <button class="btn btn-success">Logar</button>
            </div>
        </form>
    </div>


    
    <div id="modalLogo" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <form action="<?php echo base_url(); ?>index.php/ClienteEmp/addLogo" id="formLogo" enctype="multipart/form-data" method="post" class="form-horizontal" >
            <div class="modal-header">
                <input type="hidden" name="idclienteemp" id="idclienteemp" value="<?php echo $result->idclienteemp ?>" />
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                <h3 id="">Pin Smart Invest - Alterar/Adicionar Logotipo Empresa</h3>
            </div>
            <div class="modal-body">
                <div class="span12 alert alert-info">Selecione uma nova imagem da logotipo. Tamanho indicado (130 X 130).</div>          
                <div class="control-group">
                    <label for="logo" class="control-label"><span class="required">Logotipo*</span></label>
                    <div class="controls">
                        <input type="file" name="userfile" value="" />
                        <input id="nome" type="hidden" name="id" value="<?= $result->nome?>"  />
                    </div>
                </div>

            </div>
            <div class="modal-footer">
                <button class="btn" data-dismiss="modal" aria-hidden="true" id="btnCancelExcluir">Cancelar</button>
                <button class="btn btn-primary">Alterar</button>
            </div>
        </form>
    </div>

    
</div>
</div>
</div>