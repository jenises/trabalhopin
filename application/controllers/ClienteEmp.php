<?php

class ClienteEmp extends CI_Controller
{
    
    /**
     * author: Jenises rudolf
     * email: jenises.rudolf@gmail.com
     *
     */
    
    function __construct()
    {
        parent::__construct();
//        if ((!session_id()) || (!$this->session->userdata('logado'))) {
//            redirect('mapos/login');
//        }
            $this->load->helper(array('codegen_helper'));;
            $this->load->model('ClienteEmp_model', '', true);
            $this->data['menuClienteEmp'] = 'clienteemp';
    }
    
    function index()
    {
        $this->gerenciar();
    }

    function gerenciar()
    {

        //if (!$this->permission->checkPermission($this->session->userdata('permissao'), 'vCliente')) {
        //    $this->session->set_flashdata('error', 'Você não tem permissão para visualizar clientes.');
          //  redirect(base_url());
 //       }
        $this->load->library('table');
        $this->load->library('pagination');
        
   
        $config['base_url'] = base_url().'index.php/clienteemp/gerenciar/';
        $config['total_rows'] = $this->ClienteEmp_model->count('clienteemp');
        $config['per_page'] = 10;
        /*$config['next_link'] = 'Próxima';
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
        */
        $this->data['results'] = $this->ClienteEmp_model->get('clienteemp', 'clienteemp.idclienteemp, perfilemp.descricao, perfilemp.ramo_atividade, perfilemp.produtos, imagem', '', $config['per_page'], $this->uri->segment(3));
        $this->data['view'] = 'clienteemp/ClienteEmp';
        $this->load->view('tema/topo', $this->data);
    }
    
    function adicionar() {
        $id = 0;
       // if (!$this->permission->checkPermission($this->session->userdata('permissao'), 'aCliente')) {
            //$this->session->set_flashdata('error', 'Você não tem permissão para adicionar clientes.');
         //   redirect(base_url());
        //}
        $this->load->library('form_validation');
        $this->data['custom_error'] = '';
        if ($this->form_validation->run('clienteemp') == false) {
            $this->data['custom_error'] = (validation_errors() ? '<div class="form_error">' . validation_errors() . '</div>' : false);
        } else {
            $data = array(
                'nome' => set_value('nome'),
//                'sexo' => set_value('sexo'),
//                'pessoa_fisica' => ($this->input->post('pessoa_fisica') == 'v'? true : false),
//                'documento' => set_value('documento'),
                'telefone' => set_value('telefone'),
//                'celular' => $this->input->post('celular'),
//                'email' => set_value('email'),
                'endereco' => set_value('rua'),
//                'datacadastro' => date('Y-m-d'),
                'rg' => set_value('numero'),
//                'bairro' => set_value('bairro'),
//                'cidade' => set_value('cidade'),
//                'estado' => set_value('estado'),
                'senha' => set_value('senha')
                
            );
            $id = $this->ClienteEmp_model->add('clienteemp', $data);
            if ($id >= 0) {
                $this->session->set_flashdata('success', 'Cliente Empreendedor pré-cadastrado com sucesso!<br> Adicione agora as informações de perfil do empreededor.');
                redirect(base_url() . 'index.php/clienteemp/editar/'.$id);
            } else {
                $this->data['custom_error'] = '<div class="form_error"><p>Ocorreu um erro.</p></div>';
            }
        }
        
        
        $this->data['view'] = 'clienteemp/AdicionarCliente';
        $this->load->view('tema/topo', $this->data);

    }

    function editar()
    {

        if (!$this->uri->segment(3) || !is_numeric($this->uri->segment(3))) {
            $this->session->set_flashdata('error', 'Item não pode ser encontrado, parâmetro não foi passado corretamente.');
            redirect('pin');
        }


   //     if (!$this->permission->checkPermission($this->session->userdata('permissao'), 'eCliente')) {
   //         $this->session->set_flashdata('error', 'Você não tem permissão para editar clientes.');
   //         redirect(base_url());
   //     }

        $this->load->library('form_validation');
        $this->data['custom_error'] = '';

        if ($this->form_validation->run('clienteemp') == false) {
            $this->data['custom_error'] = (validation_errors() ? '<div class="form_error">' . validation_errors() . '</div>' : false);
        } else {
            $data = array(
                'nome' => set_value('nome'),
//                'sexo' => set_value('sexo'),
//                'pessoa_fisica' => ($this->input->post('pessoa_fisica') == 'v'? true : false),
//                'documento' => set_value('documento'),
                'telefone' => set_value('telefone'),
//                'celular' => $this->input->post('celular'),
//                'email' => set_value('email'),
                'endereco' => set_value('rua'),
//                'datacadastro' => date('Y-m-d'),
                'rg' => set_value('numero'),
//                'bairro' => set_value('bairro'),
//                'cidade' => set_value('cidade'),
//                'estado' => set_value('estado'),
                'senha' => set_value('senha')
                
            );

            if ($this->ClienteEmp_model->edit('clienteemo', $data, 'idClientes', $this->input->post('idClientes')) == true) {
                $this->session->set_flashdata('success', 'Cliente editado com sucesso!');
                redirect(base_url() . 'index.php/ClienteEmp/editar_clienteemp/'.$this->input->post('idclienteemp'));
            } else {
                $this->data['custom_error'] = '<div class="form_error"><p>Ocorreu um erro</p></div>';
            }
        }


        $this->data['result'] = $this->ClienteEmp_model->getById($this->uri->segment(3));
        $this->data['view'] = 'clienteemp/editar_clienteemp';
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
        $this->data['result'] = $this->ClienteEmp_model->getById($this->uri->segment(3));
        //$this->data['results'] = $this->clienteinvest_model->getOsByCliente($this->uri->segment(3));
        $this->data['view'] = 'clienteemp/visualizar_clienteemp';
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
    
    
        public function cadastrar() {
            $this->load->model('ClienteEmp_model', '', true);
            $this->load->library('form_validation');
            $this->data['custom_error'] = '';

        if ($this->form_validation->run('clienteemp') == false) {
            $this->data['custom_error'] = (validation_errors() ? '<div class="form_error">' . validation_errors() . '</div>' : false);
        } else {
             exit("ddd");
        /*    $data = array(
                'nomeCliente' => set_value('nomeCliente'),
                'documento' => set_value('documento'),
                'telefone' => set_value('telefone'),
                'celular' => $this->input->post('celular'),
                'email' => set_value('email'),
                'rua' => set_value('rua'),
                'numero' => set_value('numero'),
                'bairro' => set_value('bairro'),
                'cidade' => set_value('cidade'),
                'estado' => set_value('estado'),
                'cep' => set_value('cep'),
                'dataCadastro' => date('Y-m-d')
            );

            if ($this->clientes_model->add('clientes', $data) == true) {
                $this->session->set_flashdata('success', 'Cliente adicionado com sucesso!');
                redirect(base_url() . 'index.php/mine');
            } else {
               
                $this->session->set_flashdata('success', 'Cliente adicionado com sucesso!');
            }
         * */
        }
        $data = ''; 
        $this->load->view('clienteemp/cadastrar_emp', $data);
    }
    
      public function addPerfil()
    {

        
        $preco = $this->input->post('preco');
        $quantidade = $this->input->post('quantidade');
        $subtotal = $preco * $quantidade;
        $produto = $this->input->post('idProduto');
        $data = array(
            'quantidade'=> $quantidade,
            'subTotal'=> $subtotal,
            'produtos_id'=> $produto,
            'os_id'=> $this->input->post('idOsProduto'),
        );

        if ($this->os_model->add('produtos_os', $data) == true) {
            $sql = "UPDATE produtos set estoque = estoque - ? WHERE idProdutos = ?";
            $this->db->query($sql, array($quantidade, $produto));
            
            echo json_encode(array('result'=> true));
        } else {
            echo json_encode(array('result'=> false));
        }
      
    }
    
    public function addLogo(){
        
//        if ((!session_id()) || (!$this->session->userdata('logado'))) {
//            redirect('mapos/login');
//        }
//
//        if (!$this->permission->checkPermission($this->session->userdata('permissao'), 'cEmitente')) {
//            $this->session->set_flashdata('error', 'Você não tem permissão para configurar emitente.');
//            redirect(base_url());
//        }

        $id = $this->input->post('idclienteemp');
        if ($id == null || !is_numeric($id)) {
            $this->session->set_flashdata('error', 'Ocorreu um erro ao tentar alterar a logomarca.');
            redirect(base_url().'index.php/mapos/emitente');
        }
        $this->load->helper('file');
        //delete_files(FCPATH .'assets/uploads/');

        $image = $this->logo_upload();
        $logo = 'assets/img/emp/'.$image;

        $retorno = $this->ClienteEmp_model->AtualizaLogo($id, $logo);
        if ($retorno) {

            $this->session->set_flashdata('success', 'As informações foram alteradas com sucesso.');
            
        } else {
            $this->session->set_flashdata('error', 'Ocorreu um erro ao tentar alterar as informações.');
            //redirect(base_url().'index.php/mapos/emitente');
        }
        redirect(base_url().'index.php/ClienteEmp/editar/'.$id);

    }

    function logo_upload() {

/*        if ((!session_id()) || (!$this->session->userdata('logado'))) {
            redirect('mapos/login');
        }

        if (!$this->permission->checkPermission($this->session->userdata('permissao'), 'cEmitente')) {
            $this->session->set_flashdata('error', 'Você não tem permissão para configurar emitente.');
            redirect(base_url());
        }
 * */
 
        $this->load->library('upload');

        $image_upload_folder = FCPATH . 'assets/img/emp';

        if (!file_exists($image_upload_folder)) {
            mkdir($image_upload_folder, DIR_WRITE_MODE, true);
        }

        $this->upload_config = array(
            'upload_path'   => $image_upload_folder,
            'allowed_types' => 'png|jpg|jpeg|bmp',
            'max_size'      => 2048,
            'remove_space'  => true,
            'encrypt_name'  => true,
        );

        $this->upload->initialize($this->upload_config);

        if (!$this->upload->do_upload()) {
            $upload_error = $this->upload->display_errors();
            print_r($upload_error);
            exit();
        } else {
            $file_info = array($this->upload->data());
            return $file_info[0]['file_name'];
        }

    }
    
    function AlteraPerfil() {
        $this->load->library('form_validation');
        $this->data['custom_error'] = '';
//        if ($this->form_validation->run('clienteemp') == false) {
//            $this->data['custom_error'] = (validation_errors() ? '<div class="form_error">' . validation_errors() . '</div>' : false);
//        } else {
            $data = array(
                'descricao' => $this->input->post('descricao'),
                'produtos' => $this->input->post('produtos'),
                'servicos' => $this->input->post('servicos'),
                'ramo_atividade' => $this->input->post('ramo'),
                'qtd_func' => (trim($this->input->post('qtd_func')) == "") ? "0" : $this->input->post('qtd_func'),
                'qtd_clientes' => (trim($this->input->post('qtd_clientes')) == "") ? "0" : $this->input->post('qtd_clientes'),
                'linkedin' => $this->input->post('linkedin'),
                'servicos' => $this->input->post('servicos'),
                'objetivo' => $this->input->post('objetivo'),
                'visao' => $this->input->post('visao'),
                'ramo_atividade' => $this->input->post('ramo_atividade')
                
            );
            //exit(var_dump($_POST));
            if ($this->ClienteEmp_model->AtualizaPerfil($data, $this->input->post('idclienteemp')) == true) {
                $this->session->set_flashdata('success', 'Dados do Perfil do Cliente Empreendedor atualizado com sucesso!');
                redirect(base_url() . 'index.php/clienteemp/editar/'.$id);
            } else {
                $this->data['custom_error'] = '<div class="form_error"><p>Ocorreu um erro.</p></div>';
            }
        }
}
