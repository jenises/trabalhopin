<?php

class ClienteInvest extends CI_Controller
{
    
    /**
     * author: Jenises rudolf
     * email: jenises.rudolf@gmail.com
     *
     */
    
    function __construct()
    {
        parent::__construct();
            $this->load->helper(array('codegen_helper'));;
            $this->load->model('ClienteInvest_model', '', true);
            $this->data['menuClienteInvest'] = 'clienteinvest';
    }
    
    function index()
    {
        $this->gerenciar();
    }

    function gerenciar()
    {
        if ((!session_id()) || (!$this->session->userdata('logado')&& (!$this->session->userdata('clienteinvest'))) ) {
            redirect('ClienteInvest/logar');
        }


        //if (!$this->permission->checkPermission($this->session->userdata('permissao'), 'vCliente')) {
        //    $this->session->set_flashdata('error', 'Você não tem permissão para visualizar clientes.');
          //  redirect(base_url());
 //       }
        $this->load->library('table');
        $this->load->library('pagination');
        
   
        $config['base_url'] = base_url().'index.php/clienteinvest/gerenciar/';
        $config['total_rows'] = $this->ClienteInvest_model->count('clienteinvest');
        $config['per_page'] = 10;
        $config['next_link'] = 'Próxima';
        $config['prev_link'] = 'Anterior';
        $config['full_tag_open'] = '<div class="pagination alternate"><ul>';
        $config['full_tag_close'] = '</ul></div>';
        $config['num_tag_open'] = '<li>';
        $config['num_tag_close'] = '</li>';
        $config['cur_tag_open'] = '<li><a style="color: #2D335B"><b>';
        $config['cur_tag_close'] = '</b></a></li>';
        $config['prev_tag_open'] = '<li>';
        $config['prev_tag_close'] = '</li>';
        $config['next_tag_open'] = '<li>';
        $config['next_tag_close'] = '</li>';
        $config['first_link'] = 'Primeira';
        $config['last_link'] = 'Última';
        $config['first_tag_open'] = '<li>';
        $config['first_tag_close'] = '</li>';
        $config['last_tag_open'] = '<li>';
        $config['last_tag_close'] = '</li>';
        
        $this->pagination->initialize($config);
        
        $this->data['results'] = $this->ClienteInvest_model->get('clienteinvest', 'idclienteinvest,nomecliente, sexo, pessoa_fisica, documento,telefone,celular,email,datacadastro, rua,numero,bairro,cidade,estado,cep', '', $config['per_page'], $this->uri->segment(3));
        $this->data['view'] = 'clienteinvest/ClienteInvest';
        $this->load->view('tema/topo', $this->data);
    }
    
    function adicionar()
    {
       // if (!$this->permission->checkPermission($this->session->userdata('permissao'), 'aCliente')) {
            //$this->session->set_flashdata('error', 'Você não tem permissão para adicionar clientes.');
         //   redirect(base_url());
        //}

        $this->load->library('form_validation');
        $this->data['custom_error'] = '';

        if ($this->form_validation->run('clienteinvest') == false) {
            $this->data['custom_error'] = (validation_errors() ? '<div class="form_error">' . validation_errors() . '</div>' : false);
        } else {
            $data = array(
                'nomecliente' => set_value('nomeCliente'),
                'sexo' => set_value('sexo'),
                'pessoa_fisica' => ($this->input->post('pessoa_fisica') == 'v'? true : false),
                'documento' => set_value('documento'),
                'telefone' => set_value('telefone'),
                'celular' => $this->input->post('celular'),
                'email' => set_value('email'),
                'rua' => set_value('rua'),
                'datacadastro' => date('Y-m-d'),
                'numero' => set_value('numero'),
                'bairro' => set_value('bairro'),
                'cidade' => set_value('cidade'),
                'estado' => set_value('estado'),
                'cep' => set_value('cep')
                
            );

            if ($this->ClienteInvest_model->add('clienteinvest', $data) == true) {
                $this->session->set_flashdata('success', 'Cliente Investidor adicionado com sucesso!');
                redirect(base_url() . 'index.php/clienteinvest/adicionar/');
            } else {
                $this->data['custom_error'] = '<div class="form_error"><p>Ocorreu um erro.</p></div>';
            }
        }
        $this->data['view'] = 'clienteinvest/AdicionarCliente';
        $this->load->view('tema/topo', $this->data);

    }

    function editar()
    {

        if (!$this->uri->segment(3) || !is_numeric($this->uri->segment(3))) {
            $this->session->set_flashdata('error', 'Item não pode ser encontrado, parâmetro não foi passado corretamente.');
            redirect('mapos');
        }


        if (!$this->permission->checkPermission($this->session->userdata('permissao'), 'eCliente')) {
            $this->session->set_flashdata('error', 'Você não tem permissão para editar clientes.');
            redirect(base_url());
        }

        $this->load->library('form_validation');
        $this->data['custom_error'] = '';

        if ($this->form_validation->run('clientes') == false) {
            $this->data['custom_error'] = (validation_errors() ? '<div class="form_error">' . validation_errors() . '</div>' : false);
        } else {
            $data = array(
                'nomeCliente' => $this->input->post('nomeCliente'),
                'documento' => $this->input->post('documento'),
                'telefone' => $this->input->post('telefone'),
                'celular' => $this->input->post('celular'),
                'email' => $this->input->post('email'),
                'rua' => $this->input->post('rua'),
                'numero' => $this->input->post('numero'),
                'bairro' => $this->input->post('bairro'),
                'cidade' => $this->input->post('cidade'),
                'estado' => $this->input->post('estado'),
                'cep' => $this->input->post('cep')
            );

            if ($this->clientes_model->edit('clientes', $data, 'idClientes', $this->input->post('idClientes')) == true) {
                $this->session->set_flashdata('success', 'Cliente editado com sucesso!');
                redirect(base_url() . 'index.php/clientes/editar/'.$this->input->post('idClientes'));
            } else {
                $this->data['custom_error'] = '<div class="form_error"><p>Ocorreu um erro</p></div>';
            }
        }


        $this->data['result'] = $this->clientes_model->getById($this->uri->segment(3));
        $this->data['view'] = 'clienteinvest/editarCliente';
        $this->load->view('tema/topo', $this->data);

    }

    public function visualizar()
    {
/*        if (!$this->uri->segment(3) || !is_numeric($this->uri->segment(3))) {
            $this->session->set_flashdata('error', 'Item não pode ser encontrado, parâmetro não foi passado corretamente.');
            redirect('pin');
        }

        if (!$this->permission->checkPermission($this->session->userdata('permissao'), 'vCliente')) {
            $this->session->set_flashdata('error', 'Você não tem permissão para visualizar clientes.');
            redirect(base_url());
        }

*/
        $this->data['custom_error'] = '';
        $this->data['result'] = $this->clienteemp_model->getById($this->uri->segment(3));
        //$this->data['results'] = $this->clienteinvest_model->getOsByCliente($this->uri->segment(3));
        $this->data['view'] = 'clienteinvest/visualizar_clienteinvest';
        $this->load->view('tema/topo', $this->data);

        
    }
    
    public function excluir()
    {

            
        if (!$this->permission->checkPermission($this->session->userdata('permissao'), 'dCliente')) {
            $this->session->set_flashdata('error', 'Você não tem permissão para excluir clientes.');
            redirect(base_url());
        }

            
            $id =  $this->input->post('id');
        if ($id == null) {

            $this->session->set_flashdata('error', 'Erro ao tentar excluir cliente.');
            redirect(base_url().'index.php/clientes/gerenciar/');
        }

            //$id = 2;
            // excluindo OSs vinculadas ao cliente
            $this->db->where('clientes_id', $id);
            $os = $this->db->get('os')->result();

        if ($os != null) {

            foreach ($os as $o) {
                $this->db->where('os_id', $o->idOs);
                $this->db->delete('servicos_os');

                $this->db->where('os_id', $o->idOs);
                $this->db->delete('produtos_os');


                $this->db->where('idOs', $o->idOs);
                $this->db->delete('os');
            }
        }

            // excluindo Vendas vinculadas ao cliente
            $this->db->where('clientes_id', $id);
            $vendas = $this->db->get('vendas')->result();

        if ($vendas != null) {

            foreach ($vendas as $v) {
                $this->db->where('vendas_id', $v->idVendas);
                $this->db->delete('itens_de_vendas');


                $this->db->where('idVendas', $v->idVendas);
                $this->db->delete('vendas');
            }
        }

            //excluindo receitas vinculadas ao cliente
            $this->db->where('clientes_id', $id);
            $this->db->delete('lancamentos');



            $this->clientes_model->delete('clientes', 'idClientes', $id);

            $this->session->set_flashdata('success', 'Cliente excluido com sucesso!');
            redirect(base_url().'index.php/cliente/gerenciar/');
    }
    
    function logar() {
         session_destroy();
         $this->load->view('clienteinvest/login');
        
//        $this->load->library('form_validation');
//        $this->data['custom_error'] = '';
//        $urlAtual = $this->input->post('urlAtual');
//        if ($this->form_validation->run('logar') == false) {
//            $this->data['custom_error'] = (validation_errors() ? '<div class="form_error">' . validation_errors() . '</div>' : false);
//        } else {
//            $this->session->set_flashdata('success', 'Você está logado!');
//            redirect(base_url().'index.php/ClienteEmp/');
//        }
    }
    
    public function cadastrar() {
        $this->load->model('ClienteInvest_model', '', true);
       // $this->load->library('form_validation');
        $this->data['custom_error'] = '';

    //if ($this->form_validation->run('clienteemp') == false) {
    //        $this->data['custom_error'] = (validation_errors() ? '<div class="form_error">' . validation_errors() . '</div>' : false);
     //   } else {
     //        exit("ddd");
        if (trim($this->input->post('nomecliente') != "")) { //pequena gabiarrazinha
            
            $data = array(
                'nomecliente' => $this->input->post('nomecliente'),
                'documento' => $this->input->post('documento'),
                'senha' => $this->input->post('senha')
            );

            if ($this->ClienteInvest_model->add('clienteinvest', $data) == true) {
                $this->session->set_flashdata('success', 'Cliente pré-cadastrado com sucesso!');
                $this->load->view('clienteinvest/login', "");
                //redirect(base_url() . 'clienteinvest/login');
            } else {
               exiy("nao é pra cair aqui!!");
                $this->session->set_flashdata('success', 'Cliente adicionado com sucesso!');
            }
            
        }
        else {
            $this->load->view('clienteinvest/cadastrar_invest', "");
        }
        
        //}
       // $data = ''; 
       
    }
    
    
        public function verificarLogin()
    {
        header('Access-Control-Allow-Origin: '.base_url());
        header('Access-Control-Allow-Methods: POST, GET, OPTIONS');
        header('Access-Control-Max-Age: 1000');
        header('Access-Control-Allow-Headers: Content-Type');
        $this->load->library('form_validation');
        $this->form_validation->set_rules('documento', 'Documento', 'required|trim');
        $this->form_validation->set_rules('senha', 'Senha', 'required|trim');
        if ($this->form_validation->run() == false) {
            $json = array('result' => false, 'message' => validation_errors());
            echo json_encode($json);
        } else {
            $cpf = $this->input->post('documento');
            $password = $this->input->post('senha');
            $this->load->model('ClienteInvest_model');
            $user = $this->ClienteInvest_model->checkCPF($cpf);

            if ($user) {
                if (password_verify($password, password_hash($user->senha, PASSWORD_DEFAULT))) {
                    $session_data = array('clienteinvest' => true, 'nome' => $user->nomecliente, 'documento' => $user->documento, 'idclienteinvest' => $user->idclienteinvest, 'logado' => true);
                    $this->session->set_userdata($session_data);
                    $json = array('result' => true);
                    echo json_encode($json);
                } else {
                    $json = array('result' => false, 'message' => 'Os dados de acesso estão incorretos.');
                    echo json_encode($json);
                }
            } else {
                $json = array('result' => false, 'message' => 'Usuário não encontrado, verifique se suas credenciais estão corretass.');
                echo json_encode($json);
            }
        }
        die();
    }


    
}
