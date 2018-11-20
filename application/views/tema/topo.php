
<!DOCTYPE html>
<html lang="en">
    <head>
        <title>Projeto Integrador I</title>
        <meta charset="UTF-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/bootstrap.min.css" />
        <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/bootstrap-responsive.min.css" />
        <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/matrix-style.css" />
        <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/matrix-media.css" />
        <link href="<?php echo base_url(); ?>assets/font-awesome/css/font-awesome.css" rel="stylesheet" />
        <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/fullcalendar.css" /> 

        <link href='http://fonts.googleapis.com/css?family=Open+Sans:400,700,800' rel='stylesheet' type='text/css'>
        <script type="text/javascript"  src="<?php echo base_url(); ?>assets/js/jquery-1.10.2.min.js"></script>

    </head>
    <body>

        <!--Header-part-->
        <div id="header">
            <h1></h1>
        </div>
        <!--close-Header-part--> 

        <!--top-Header-menu-->
        <div id="user-nav" class="navbar navbar-inverse">
            <ul class="nav">
                <?php
                    
                    if ( (session_id() ) && ( $this->session->userdata('logado') ) ) {
                        if ($this->session->userdata('clienteinvest')) {
                            echo '<li class="">';
                            echo '    <a title="" href="#">';
                            echo '         <i class="icon icon-user"></i> <span class="text">Logado Como: Investidor('. $this->session->userdata('nome').')</span>';
                            echo '    </a> ';
                            echo '</li> ';
                            echo '<li class="">';
                            echo '    <a title="" href="'.site_url().'/ClienteInvest/Editar/'.$this->session->userdata('idclienteinvest').'">';
                            echo '         <i class="icon icon-star"></i> <span class="text">Minha Conta</span>';
                            echo '    </a> ';
                            echo '</li> ';
                            echo '<li class="">';
                            echo '    <a title="" href="'.site_url().'/ClienteInvest/logar/">';
                            echo '         <i class="icon icon-star"></i> <span class="text">Sair</span>';
                            echo '    </a> ';
                            echo '</li>';
                        }  else if ($this->session->userdata('clienteemp')) {
                                echo '<li class="">';
                                echo '    <a title="" href="#">';
                                echo '         <i class="icon icon-user"></i> <span class="text">Logado Como: Empreendedor('. $this->session->userdata('descricao').')</span>';
                                echo '    </a> ';
                                echo '</li> ';
                                echo '<li class="">';
                                echo '    <a title="" href="'.site_url().'/ClienteEmp/editar/'.$this->session->userdata('idclienteemp').'">';
                                echo '         <i class="icon icon-star"></i> <span class="text">Minha Conta</span>';
                                echo '    </a> ';
                                echo '</li> ';
                                echo '<li class="">';
                                echo '    <a title="" href="'.site_url().'/ClienteInvest/logar/">';
                                echo '         <i class="icon icon-star"></i> <span class="text">Sair</span>';
                                echo '    </a> ';
                                echo '</li> ';
                        }
                    }
                    else {
                        echo '<li class="">';
                        echo '     <a href="#modalCadastrar" data-toggle="modal"><i class="icon icon-group"></i> <span>Cadastre-se </span>';
                        echo '     </a>';
                        echo '</li>';       
                    }
                    
                
                ?>


            </ul>

        </div>

        <!--start-top-serch-->
        <div id="search">
            <form action="<?php echo base_url() ?>index.php/mapos/pesquisar">
                <input type="text" name="termo" placeholder="Pesquisar..."/>
                <button type="submit"  class="tip-bottom" title="Pesquisar"><i class="icon-search icon-white"></i></button>

            </form>
        </div>
        <!--close-top-serch--> 

        <!--sidebar-menu-->

        <div id="sidebar"> 
            <a href="#" class="visible-phone">
                <i class="icon icon-list"></i> Menu
            </a>
            <ul>


                <li class="<?php
                if (isset($menuPainel)) {
                    echo 'active';
                };
                ?>"><a href="<?php echo base_url() ?>"><i class="icon icon-home"></i> <span>Inicio </span></a></li>

                <?php //if ($this->permission->checkPermission($this->session->userdata('permissao'), 'vCliente')) { ?>
                    <li class="<?php
                    if (isset($menuClienteInvest)) {
                        echo 'active';
                    };
                    ?>"><a href="#modalCadastrar" data-toggle="modal"><i class="icon icon-group"></i> <span>Cadastre-se </span></a></li>
                    <?php 
                          echo '<li><a href="'.base_url().'index.php/ClienteInvest"><i class="icon icon-group"></i> <span>Clientes Investidores </span></a></li>';
                    ?>                    
                <!--<?php// if ($this->permission->checkPermission($this->session->userdata('permissao'), 'vProduto')) { ?>!-->
                    <li class="<?php
                    if (isset($menuProdutos)) {
                        echo 'active';
                    };
                    ?>"><a href="<?php echo base_url() ?>index.php/ClienteEmp"><i class="icon icon-barcode"></i> <span>Clientes Empreendedores</span></a></li>
                    <?php //} ?>


                <?php if ($this->permission->checkPermission($this->session->userdata('permissao'), 'vOs')) { ?>
                    <li class="<?php
                    if (isset($menuOs)) {
                        echo 'active';
                    };
                    ?>"><!--<a href="<?php echo base_url() ?>index.php/os"><i class="icon icon-tags"></i> <span>Ordens de Serviço</span></a></li>--!>
                    <?php } ?>

                <?php if ($this->permission->checkPermission($this->session->userdata('permissao'), 'vVenda')) { ?>
                    <li class="<?php
                    if (isset($menuVendas)) {
                        echo 'active';
                    };
                    ?>"><!--<a href="<?php echo base_url() ?>index.php/vendas"><i class="icon icon-shopping-cart"></i> <span>Vendas</span></a></li>!-->
                    <?php } ?>

                <?php if ($this->permission->checkPermission($this->session->userdata('permissao'), 'vLancamento')) { ?>
                    <li class="submenu <?php
                    if (isset($menuFinanceiro)) {
                        echo 'active open';
                    };
                    ?>">
                      <!--  <a href="#"><i class="icon icon-money"></i> <span>Financeiro</span> <span class="label"><i class="icon-chevron-down"></i></span></a>
                        <ul>
                            <li><a href="<?php echo base_url() ?>index.php/financeiro/lancamentos">Lançamentos</a></li>
                        </ul>
                    </li>--!>
                <?php } ?>

                <?php if ($this->permission->checkPermission($this->session->userdata('permissao'), 'rCliente') || $this->permission->checkPermission($this->session->userdata('permissao'), 'rProduto') || $this->permission->checkPermission($this->session->userdata('permissao'), 'rServico') || $this->permission->checkPermission($this->session->userdata('permissao'), 'rOs') || $this->permission->checkPermission($this->session->userdata('permissao'), 'rFinanceiro') || $this->permission->checkPermission($this->session->userdata('permissao'), 'rVenda')) { ?>

                    <li class="submenu <?php
                    if (isset($menuRelatorios)) {
                        echo 'active open';
                    };
                    ?>" >
                        <a href="#"><i class="icon icon-list-alt"></i> <span>Relatórios</span> <span class="label"><i class="icon-chevron-down"></i></span></a>
                        <ul>

                            <?php if ($this->permission->checkPermission($this->session->userdata('permissao'), 'rCliente')) { ?>
                                <li><a href="<?php echo base_url() ?>index.php/relatorios/clientes">Clientes</a></li>
                            <?php } ?>
                            <?php if ($this->permission->checkPermission($this->session->userdata('permissao'), 'rProduto')) { ?>
                                <li><a href="<?php echo base_url() ?>index.php/relatorios/produtos">Produtos</a></li>
                            <?php } ?>
                            <?php if ($this->permission->checkPermission($this->session->userdata('permissao'), 'rServico')) { ?>
                                <li><a href="<?php echo base_url() ?>index.php/relatorios/servicos">Serviços</a></li>
                            <?php } ?>
                            <?php if ($this->permission->checkPermission($this->session->userdata('permissao'), 'rOs')) { ?>
                                <li><a href="<?php echo base_url() ?>index.php/relatorios/os">Ordens de Serviço</a></li>
                            <?php } ?>
                            <?php if ($this->permission->checkPermission($this->session->userdata('permissao'), 'rVenda')) { ?>
                                <li><a href="<?php echo base_url() ?>index.php/relatorios/vendas">Vendas</a></li>
                            <?php } ?>
                            <?php if ($this->permission->checkPermission($this->session->userdata('permissao'), 'rFinanceiro')) { ?>
                                <li><a href="<?php echo base_url() ?>index.php/relatorios/financeiro">Financeiro</a></li>
                            <?php } ?>

                        </ul>
                    </li>

                <?php } ?>

                <?php if ($this->permission->checkPermission($this->session->userdata('permissao'), 'cUsuario') || $this->permission->checkPermission($this->session->userdata('permissao'), 'cEmitente') || $this->permission->checkPermission($this->session->userdata('permissao'), 'cPermissao') || $this->permission->checkPermission($this->session->userdata('permissao'), 'cBackup')) { ?>
                    <li class="submenu <?php
                    if (isset($menuConfiguracoes)) {
                        echo 'active open';
                    };
                    ?>">
                        <a href="#"><i class="icon icon-cog"></i> <span>Configurações</span> <span class="label"><i class="icon-chevron-down"></i></span></a>
                        <ul>
                            <?php if ($this->permission->checkPermission($this->session->userdata('permissao'), 'cUsuario')) { ?>
                                <li><a href="<?php echo base_url() ?>index.php/usuarios">Usuários</a></li>
                            <?php } ?>
                            <?php if ($this->permission->checkPermission($this->session->userdata('permissao'), 'cEmitente')) { ?>
                                <li><a href="<?php echo base_url() ?>index.php/mapos/emitente">Emitente</a></li>
                            <?php } ?>
                            <?php if ($this->permission->checkPermission($this->session->userdata('permissao'), 'cPermissao')) { ?>
                                <li><a href="<?php echo base_url() ?>index.php/permissoes">Permissões</a></li>
                            <?php } ?>
                            <?php if ($this->permission->checkPermission($this->session->userdata('permissao'), 'cBackup')) { ?>
                                <li><a href="<?php echo base_url() ?>index.php/mapos/backup">Backup</a></li>
                            <?php } ?>

                        </ul>
                    </li>
                <?php } ?>


            </ul>
        </div>
        <div id="content">
            <div id="content-header">
                <div id="breadcrumb"> <a href="<?php echo base_url() ?>" title="Dashboard" class="tip-bottom"><i class="icon-home"></i> Dashboard</a> <?php if ($this->uri->segment(1) != null) {
                    ?><a href="<?php echo base_url() . 'index.php/' . $this->uri->segment(1) ?>" class="tip-bottom" title="<?php echo ucfirst($this->uri->segment(1)); ?>"><?php echo ucfirst($this->uri->segment(1)); ?></a> <?php if ($this->uri->segment(2) != null) {
                        ?><a href="<?php echo base_url() . 'index.php/' . $this->uri->segment(1) . '/' . $this->uri->segment(2) . '/' . $this->uri->segment(3) ?>" class="current tip-bottom" title="<?php echo ucfirst($this->uri->segment(2)); ?>"><?php
                            echo ucfirst($this->uri->segment(2));
                        }
                        ?></a> <?php }
                    ?></div>
            </div>
            <div class="container-fluid">
                <div class="row-fluid">
                    <div class="span12">
<?php if ($this->session->flashdata('error') != null) { ?>
                            <div class="alert alert-danger">
                                <button type="button" class="close" data-dismiss="alert">&times;</button>
                            <?php echo $this->session->flashdata('error'); ?>
                            </div>
                        <?php } ?>

<?php if ($this->session->flashdata('success') != null) { ?>
                            <div class="alert alert-success">
                                <button type="button" class="close" data-dismiss="alert">&times;</button>
                            <?php echo $this->session->flashdata('success'); ?>
                            </div>
                        <?php } ?>

                        <?php
                        if (isset($view)) {
                            echo $this->load->view($view, null, true);
                        }
                        ?>


                    </div>
                </div>
            </div>
        </div>
        <!--Footer-part-->
        <div class="row-fluid">
            <div id="footer" class="span12"> <a href="#" target="_blank"><?php echo date('Y'); ?> &copy; Projeto Integrador I </a></div>
        </div>
        <!--end-Footer-part-->


        <script src="<?php echo base_url(); ?>assets/js/bootstrap.min.js"></script> 
        <script src="<?php echo base_url(); ?>assets/js/matrix.js"></script> 

        
        
        <div id="modalCadastrar" class="modal hide fade"  tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <form id="formLogar" action="<?php echo base_url() ?>index.php/ClienteInvest/logar" method="post">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                <h3 id="myModalLabel">PIN Smart Invest  - Escolha o tipo de cliente</h3>
            </div>
            <div class="modal-body  " >
                    <ul class="quick-actions ">
                        <li class="bg_lb "> <a href="<?php  echo base_url()?>index.php/ClienteInvest"> <i class="icon-group"></i>&nbsp;&nbsp;&nbsp; Eu sou Cliente Investidor&nbsp;&nbsp&nbsp;</a> </li>
                        <li class="bg_lg"> <a href="<?php echo base_url()?>index.php/ClienteEmp/cadastrar"> <i class="icon-group"></i>&nbsp; Eu sou  Cliente Empreendedor</a> </li>
                    </ul>
            </div>
<!--            <div class="modal-footer">
                <button class="btn btn-large btn-primary pull-left" data-dismiss="modal" aria-hidden="true" style="">Cadastre-se</button>
                <button class="btn" data-dismiss="modal" aria-hidden="true">Cancelar</button>
                <button class="btn btn-success">Logar</button>
            </div>
!-->
        </form>
    </div>
        
        

    </body>
</html>







