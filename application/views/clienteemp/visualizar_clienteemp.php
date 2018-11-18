<link rel="stylesheet" href="<?php echo base_url();?>assets/js/jquery-ui/css/smoothness/jquery-ui-1.9.2.custom.css" />
<script type="text/javascript" src="<?php echo base_url()?>assets/js/jquery-ui/js/jquery-ui-1.9.2.custom.js"></script>
<script src="<?php echo base_url()?>assets/js/jquery.validate.js"></script>
<script type="text/javascript">
	jQuery(document).ready(function($) {



        $("#formLogar").validate({
          rules:{
             cpf: {required:true},
             senha: {required:true},
      
          },
          messages:{
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


<div class="widget-box">
    <div class="widget-title">
        <ul class="nav nav-tabs">
            <li class="active"><a data-toggle="tab" href="#tab1">Dados do Empreendedor</a></li>
            <!--<li><a data-toggle="tab" href="#tab2">Empresas que já investiram</a></li>-->
            <div class="buttons">
                    <?php //if ($this->permission->checkPermission($this->session->userdata('permissao'), 'eCliente')) {
                       // echo '<a title="Icon Title" class="btn btn-mini btn-info" href="'.base_url().'index.php/clientesinvest/editar/'.$result->idclienteinvest.'"><i class="icon-pencil icon-white"></i> Editar</a>';
//} ?>
                    
            </div>
            <div class="buttons">
                    <?php //if ($this->permission->checkPermission($this->session->userdata('permissao'), 'eCliente')) {
                      //  echo '<a title="Icon Title" class="btn btn-mini btn-info" href="'.base_url().'index.php/clienteinvest"><i class="icon-backward icon-white"></i> Voltar</a>';
//} ?>
                    
            </div>
            
        </ul>
    </div>
    <div class="widget-content tab-content">
        <div id="tab1" class="tab-pane active" style="min-height: 300px">

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
                                                        <img src="<?php echo base_url().$result->imagem?>">
                                                    </td>
                                                    <td style="text-align: right; width: 15%"><strong>Nome/Razão</strong></td>
                                                    <td><?php echo $result->descricao ?></td>
                                                    
                                                </tr>
                                                <tr>
                                                    <td style="text-align: right"><strong>Endereço</strong></td>
                                                    <td><?php echo $result->endereco ?></td>
                                                </tr>
                                                <tr>
                                                    <td style="text-align: right"><strong>Quantidade de funcionários</strong></td>
                                                    <td><?php echo $result->qtd_func ?></td>
                                                </tr>
                                                <tr>
                                                    <td style="text-align: right"><strong>Quantidade de Clientes</strong></td>
                                                    <td><?php echo $result->qtd_clientes ?></td>
                                                </tr>
                                                <tr>
                                                    <td style="text-align: right"><strong>Linkedin</strong></td>
                                                    <td><?php echo $result->linkedin ?></td>
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
                                                    <td><?php echo $result->produtos ?></td>
                                                </tr>
                                                <tr>
                                                    <td style="text-align: right"><strong>Serviçoes</strong></td>
                                                    <td><?php echo $result->servicos ?></td>
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
                                                    <td><?php echo $result->visao ?></td>
                                                </tr>
                                                <tr>
                                                    <td style="text-align: right"><strong>Missao</strong></td>
                                                    <td><?php echo $result->missao ?></td>
                                                </tr>
                                                <tr>
                                                    <td style="text-align: right"><strong>Objetivo</strong></td>
                                                    <td><?php echo $result->objetivo ?></td>
                                                </tr>
                                                
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="span12" style="padding: 1%; margin-left: 0">
                            <div class="span6 offset3" style="text-align: center">
                                <a href="#modalLogar" data-toggle="modal" class="btn btn-success btn-large" id="btnContinuar"><i class="icon-credit-card icon-large icon-white"></i> Investir</a>
                                <a href="<?php echo base_url() ?>index.php/ClienteEmp" id="" class="btn btn-large"><i class="icon-arrow-left"></i> Voltar</a>
                            </div>
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

                        
<?php
/*foreach ($results as $r) {
    $dataInicial = date(('d/m/Y'), strtotime($r->dataInicial));
    $dataFinal = date(('d/m/Y'), strtotime($r->dataFinal));
    echo '<tr>';
    echo '<td>' . $r->idOs . '</td>';
    echo '<td>' . $dataInicial . '</td>';
    echo '<td>' . $dataFinal . '</td>';
    echo '<td>' . $r->descricaoProduto . '</td>';
    echo '<td>' . $r->defeito . '</td>';

    echo '<td>';
    if ($this->permission->checkPermission($this->session->userdata('permissao'), 'vOs')) {
        echo '<a href="' . base_url() . 'index.php/os/visualizar/' . $r->idOs . '" style="margin-right: 1%" class="btn tip-top" title="Ver mais detalhes"><i class="icon-eye-open"></i></a>';
    }
    if ($this->permission->checkPermission($this->session->userdata('permissao'), 'eOs')) {
        echo '<a href="' . base_url() . 'index.php/os/editar/' . $r->idOs . '" class="btn btn-info tip-top" title="Editar OS"><i class="icon-pencil icon-white"></i></a>';
    }
                    
    echo  '</td>';
    echo '</tr>';
 
 */?>
        </div>
    </div>
</div>