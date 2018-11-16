  <?php $Verifica = 1; 
        foreach ($results as $r) {
            if ($Verifica % 2 != 0) {
                $Verifica++;
               // echo '<div class="row-fluid" style="margin-top: 0">'; 
            }
            echo '<div class="span6">';
            echo '    <div class="row-fluid" style="margin-top: 0">';
            echo '        <div class="widget-box">';
            echo '            <div class="widget-title">';
            echo '                <span class="icon">';
            echo '                    <i class="icon-th-list"></i>';
            echo '                </span>';
            echo '                <h5>'.$r->descricao.'</h5>';
            echo '            </div>';
            echo '            <div class="widget-content">';
            echo '                <div class="row-fluid">';
            echo '                    <div class="span12" style="min-height: 260px">';
            echo '                        <form id="formSenha" action="#" method="post" novalidate="novalidate">';
            echo '                            <ul class="site-stats">';
            echo '                                <li class="span12"><img src="'.base_url().$r->imagem.'"></li>';
            echo '                                <li class="bg_lb span12" style="margin-left: 0"><strong>Ramo: '.$r->ramo_atividade.'</strong></li>';
            echo '                                <li class="bg_lg span12" style="margin-left: 0"><strong>'.$r->produtos.'</strong></li>';
            echo '                            </ul>';                        
            echo '                            <div class="span12" style="margin-left: 0; text-align: right">';
            echo '                                <a  class="btn btn-info"  href="'.base_url()."index.php/ClienteEmp/visualizar/".$r->idclienteemp.'" >Ver mais..</a> ';
            echo '                            </div>';
            echo '                        </form>';
            echo '                    </div>';
            echo '                </div>';
            echo '            </div>';
            echo '        </div>';
            echo '    </div>';
            echo '</div>';
            
            
            
            if ($Verifica % 2 == 0) {
//                echo '</div>';
            }
            
            
            
        }
?>


<!--<div class="row-fluid" style="margin-top: 0">

    <div class="span6">
        <div class="widget-box">
            <div class="widget-title">
                <span class="icon">
                    <i class="icon-th-list"></i>
		</span>
                <h5>Empreendedor 1</h5>
            </div>
            <div class="widget-content">
                <div class="row-fluid">
                    <div class="span12" style="min-height: 260px">
                        <form id="formSenha" action="#" method="post" novalidate="novalidate">
                        <ul class="site-stats">
                            <li class="span12"><img src="assets/img/emp/logo_emp1.png"></li>
                            <li class="bg_lb span12" style="margin-left: 0"><strong>Ramo: TI</strong></li>
                            <li class="bg_lg span12" style="margin-left: 0"><strong>Uma startup é uma empresa emergente que tem como objetivo desenvolver um modelo de negócio escalável, repetível, em condições de extrema incerteza, ao redor de um produto, serviço, processo ou plataforma</strong></li>
                        </ul>                        
                        <div class="span12" style="margin-left: 0; text-align: right">
                            <a  class="btn btn-info"  href="" >Ver mais..</a> 
                        </div>
                        </form>
                    </div>

                </div>
            </div>
        </div>
    </div>
    
    <div class="span6">
        <div class="widget-box">
            <div class="widget-title">
                <span class="icon">
                    <i class="icon-th-list"></i>
		</span>
                <h5>Empreendedor 2</h5>
            </div>
            <div class="widget-content">
                <div class="row-fluid">
                    <div class="span12" style="min-height: 260px">
                        <form id="formSenha" action="#" method="post" novalidate="novalidate">
                        <ul class="site-stats">
                            <li class="span12"><img src="assets/img/emp/logo_emp2.png"></li>
                            <li class="bg_lb span12" style="margin-left: 0"><strong>Ramo: Auto Peças</strong></li>
                            <li class="bg_lg span12" style="margin-left: 0"><strong>Uma startup é uma empresa emergente que tem como objetivo desenvolver um modelo de negócio escalável, repetível, em condições de extrema incerteza, ao redor de um produto, serviço, processo ou plataforma</strong></li>
                        </ul>                        
                        <div class="span12" style="margin-left: 0; text-align: right">
                            <button class="btn btn-primary">Ver mais..</button>
                        </div>
                        </form>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>
<div class="row-fluid" style="margin-top: 0">
    <div class="span6">
        <div class="widget-box">
            <div class="widget-title">
                <span class="icon">
                    <i class="icon-th-list"></i>
		</span>
                <h5>Empreendedor 3</h5>
            </div>
            <div class="widget-content">
                <div class="row-fluid">
                    <div class="span12" style="min-height: 260px">
                        <form id="formSenha" action="#" method="post" novalidate="novalidate">
                        <ul class="site-stats">
                            <li class="span12"><img src=>assets/img/emp/logo_emp3.png"></li>
                            <li class="bg_lb span12" style="margin-left: 0"><strong>Vestuário</strong></li>
                            <li class="bg_lg span12" style="margin-left: 0"><strong>Uma startup é uma empresa emergente que tem como objetivo desenvolver um modelo de negócio escalável, repetível, em condições de extrema incerteza, ao redor de um produto, serviço, processo ou plataforma</strong></li>
                        </ul>                        
                        <div class="span12" style="margin-left: 0; text-align: right">
                            <button class="btn btn-primary">Ver mais..</button>
                        </div>
                        </form>
                    </div>

                </div>
            </div>
        </div>
    </div>
    <div class="span6">
        <div class="widget-box">
            <div class="widget-title">
                <span class="icon">
                    <i class="icon-th-list"></i>
		</span>
                <h5>Empreendedor 3</h5>
            </div>
            <div class="widget-content">
                <div class="row-fluid">
                    <div class="span12" style="min-height: 260px">
                        <form id="formSenha" action="#" method="post" novalidate="novalidate">
                        <ul class="site-stats">
                            <li class="span12"><img src="assets/img/emp/logo_emp3.png"></li>
                            <li class="bg_lb span12" style="margin-left: 0"><strong>Vestuário</strong></li>
                            <li class="bg_lg span12" style="margin-left: 0"><strong>Uma startup é uma empresa emergente que tem como objetivo desenvolver um modelo de negócio escalável, repetível, em condições de extrema incerteza, ao redor de um produto, serviço, processo ou plataforma</strong></li>
                        </ul>                        
                        <div class="span12" style="margin-left: 0; text-align: right">
                            <button class="btn btn-primary">Ver mais..</button>
                        </div>
                        </form>
                    </div>

                </div>
            </div>
        </div>
    </div>
    
    
</div>    
!-->