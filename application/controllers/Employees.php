<?php
defined('BASEPATH') OR exit('');

/**
 * Description of Employees
 *
 * @author Amir <amirsanni@gmail.com>
 * @date 31st Dec, 2015
 */
class Employees extends CI_Controller{
    
    public function __construct(){
        parent::__construct();
        
        $this->genlib->checkLogin();
        
        $this->load->model(['employee']);
    }
    
    /**
     * 
     */
    public function index(){
        $data['pageContent'] = $this->load->view('employees/employees', '', TRUE);
        $data['pageTitle'] = "Employees";

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
    public function laem_(){
        //set the sort order
        $orderBy = $this->input->get('orderBy', TRUE) ? $this->input->get('orderBy', TRUE) : "first_name";
        $orderFormat = $this->input->get('orderFormat', TRUE) ? $this->input->get('orderFormat', TRUE) : "ASC";
        
        //count the total administrators in db (excluding the currently logged in admin)
        $totalEmployees = count($this->employee->getAll());
        
        $this->load->library('pagination');
        
        $pageNumber = $this->uri->segment(3, 0);//set page number to zero if the page number is not set in the third segment of uri
	
        $limit = $this->input->get('limit', TRUE) ? $this->input->get('limit', TRUE) : 10;//show $limit per page
        $start = $pageNumber == 0 ? 0 : ($pageNumber - 1) * $limit;//start from 0 if pageNumber is 0, else start from the next iteration
        
        //call setPaginationConfig($totalRows, $urlToCall, $limit, $attributes) in genlib to configure pagination
        $config = $this->genlib->setPaginationConfig($totalEmployees, "employees/laem_", $limit, ['class'=>'lnp']);
        
        $this->pagination->initialize($config);//initialize the library class
        
        //get all customers from db
        $data['allEmployees'] = $this->employee->getAll($orderBy, $orderFormat, $start, $limit);
        $data['range'] = $totalEmployees > 0 ? ($start+1) . "-" . ($start + count($data['allEmployees'])) . " of " . $totalEmployees : "";
        $data['links'] = $this->pagination->create_links();//page links
        $data['sn'] = $start+1;
        $json['employeeTable'] = $this->load->view('employees/employeeslist', $data, TRUE);//get view with populated customers table

        $this->output->set_content_type('application/json')->set_output(json_encode($json));
    }
    
    
    /*
    ********************************************************************************************************************************
    ********************************************************************************************************************************
    ********************************************************************************************************************************
    ********************************************************************************************************************************
    ********************************************************************************************************************************
    */
     /*
    ********************************************************************************************************************************
    ********************************************************************************************************************************
    ********************************************************************************************************************************
    ********************************************************************************************************************************
    ********************************************************************************************************************************
    */
    
    
    /**
     * To add new employees
     */
    public function add(){
        $this->genlib->ajaxOnly();
        $this->load->library('form_validation');
        $this->form_validation->set_error_delimiters('', '');
        $this->form_validation->set_rules('firstName', 'First name', ['required'=>"required"]);
        $this->form_validation->set_rules('lastName', 'Last name', ['required'=>"required"]);
        $this->form_validation->set_rules('email', 'E-mail', ['trim', 'required', 'valid_email', 'is_unique[employees.email]', 'strtolower'], 
                ['required'=>"required", 'is_unique'=>'Email ya existe']);
        $this->form_validation->set_rules('address', 'Address', ['required'=>"required"]);
        $this->form_validation->set_rules('mobile1', 'Phone number', ['required'=>"required"]);
        $this->form_validation->set_rules('dni', 'Dni', ['required'=>"required"]);
        $this->form_validation->set_rules('cp', 'Cp',['required'=>"required"]);
        $this->form_validation->set_rules('customerRef', 'CustomerRef', ['required'=>"required"]);
        $this->form_validation->set_rules('customerId', 'CustomerId', ['required'=>"required"]);

        if($this->form_validation->run() !== FALSE){
            /**
             * insert info into db
            *add($f_name, $l_name, $email, $customer_id, $customer_ref, $mobile1, $address, $dni, $cp)
             */
            
            $inserted = $this->employee->add(set_value('firstName'), set_value('lastName'), set_value('email'), set_value('customerId'), set_value('customerRef'), 
                set_value('mobile1'), set_value('address'), set_value('dni'), set_value('cp'));
            
            
            $json = $inserted ? 
                ['status'=>1, 'msg'=>"Employee account successfully created"] 
                : 
                ['status'=>0, 'msg'=>"Oops! Unexpected server error! Pls contact administrator for help. Sorry for the embarrassment"];
        }
        
        else{
            //return all error messages
            $json = $this->form_validation->error_array();//get an array of all errors
            
            $json['msg'] = "One or more required fields are empty or not correctly filled";
            $json['status'] = 0;
        }
                    
        $this->output->set_content_type('application/json')->set_output(json_encode($json));
    }   
}