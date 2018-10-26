<?php
defined('BASEPATH') OR exit('');

/**
 * Description of Employees
 *
 * @author Amir <amirsanni@gmail.com>
 * @date 31st Dec, 2015
 */
class Services extends CI_Controller{
    
    public function __construct(){
        parent::__construct();
        
        $this->genlib->checkLogin();
        
        $this->load->model(['service']);
    }
    
    /**
     * 
     */
    public function index(){
        $data['pageContent'] = $this->load->view('services/services', '', TRUE);
        $data['pageTitle'] = "Services";

        $this->load->view('main', $data);
    }
    
    /*
    ********************************************************************************************************************************
    ********************************************************************************************************************************
    ********************************************************************************************************************************
    ********************************************************************************************************************************
    ********************************************************************************************************************************
    */
    
     /**
     * lac_ = "Load all employees"
     */
    public function laad_(){
        //set the sort order
        $orderBy = $this->input->get('orderBy', TRUE) ? $this->input->get('orderBy', TRUE) : "first_name";
        $orderFormat = $this->input->get('orderFormat', TRUE) ? $this->input->get('orderFormat', TRUE) : "ASC";
        
        //count the total administrators in db (excluding the currently logged in admin)
        $totalServices = count($this->service->getAll());
        
        $this->load->library('pagination');
        
        $pageNumber = $this->uri->segment(3, 0);//set page number to zero if the page number is not set in the third segment of uri
	
        $limit = $this->input->get('limit', TRUE) ? $this->input->get('limit', TRUE) : 10;//show $limit per page
        $start = $pageNumber == 0 ? 0 : ($pageNumber - 1) * $limit;//start from 0 if pageNumber is 0, else start from the next iteration
        
        //call setPaginationConfig($totalRows, $urlToCall, $limit, $attributes) in genlib to configure pagination
        $config = $this->genlib->setPaginationConfig($totalServices, "services/laad_", $limit, ['class'=>'lnp']);
        
        $this->pagination->initialize($config);//initialize the library class
        
        //get all customers from db
        $data['allServices'] = $this->service->getAll($orderBy, $orderFormat, $start, $limit);
        $data['range'] = $totalServices > 0 ? ($start+1) . "-" . ($start + count($data['allServices'])) . " of " . $totalServices : "";
        $data['links'] = $this->pagination->create_links();//page links
        $data['sn'] = $start+1;
        $data['cumTotal'] = $this->service->getCumTotal();
                $data['cumTotalPayed'] = $this->service->getCumPayed();
                        $data['cumTotalNotPayed'] = $this->service->getCumNotPayed();

        $json['serviceTable'] = $this->load->view('services/servicelist', $data, TRUE);//get view with populated customers table
        $this->output->set_content_type('application/json')->set_output(json_encode($json));
    }

    public function add(){
        $this->genlib->ajaxOnly();
        
        $this->load->library('form_validation');
        $this->form_validation->set_error_delimiters('', '');
        
        $this->form_validation->set_rules('firstName', 'First name', ['required', 'trim', 'max_length[20]', 'strtolower', 'ucfirst'], ['required'=>"required"]);
       
        $this->form_validation->set_rules('price', 'Price', ['required', 'trim', 'numeric'], ['required'=>"required"]);
        if($this->form_validation->run() !== FALSE){
    
            $inserted = $this->service->add(set_value('firstName'),  set_value('description'), set_value('price'), set_value('contact'), set_value('local'), FALSE );
            
            
            $json = $inserted ? 
                ['status'=>1, 'msg'=>"servicio tecnico satisfactorio"] 
                : 
                ['status'=>0, 'msg'=>"Oops! Unexpected server error! Pls contact administrator for help. Sorry for the embarrassment"];
                $json['transReceipt'] = $this->genTransReceipt(set_value('firstName'),  set_value('description'), set_value('price'), set_value('contact'), FALSE);

               
        }
        
        else{
            //return all error messages
            $json = $this->form_validation->error_array();//get an array of all errors
            
            $json['msg'] = "One or more required fields are empty or not correctly filled";
            $json['status'] = 0;
        }
                    
        $this->output->set_content_type('application/json')->set_output(json_encode($json));
    }
     private function genTransReceipt($firstname, $description, $price, $contact, $payed){
                $data['firstname'] = $firstname;

        $data['desc'] = $description;
        $data['price'] = $price;
        $data['contact'] = $contact;
        $data['payed'] = $payed;

       

        //generate and return receipt
        $transReceipt = $this->load->view('services/servreceipt', $data, TRUE);

        return $transReceipt;
    }
    public function updatePay(){
        $this->genlib->ajaxOnly();

        $json['status'] = 0;
        $item_id = $this->input->post('i', TRUE);
           
        if($item_id){
            $data = array(
                    'payed' => 1,
            );
            $this->db->where('id', $item_id);
            $this->db->update('service', $data);

            $json['status'] = 1;
        }

        //set final output
        $this->output->set_content_type('application/json')->set_output(json_encode($json));
    }
 }