<?php
defined('BASEPATH') OR exit('');

/**
 * Description of Customer
 *
 * @author Amir <amirsanni@gmail.com>
 * @date 4th RabThaani, 1437AH (15th Jan, 2016)
 */
class Employee extends CI_Model{
    public function __construct(){
        parent::__construct();
        
    }
    /*
    ********************************************************************************************************************************
    ********************************************************************************************************************************
    ********************************************************************************************************************************
    ********************************************************************************************************************************
    ********************************************************************************************************************************
    */
    
    /*
    ///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
    ///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
    ///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
    ///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
    ///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
    */
    /**
     * 
     * @param type $orderBy
     * @param type $orderFormat
     * @param type $start
     * @param type $limit
     * @return boolean
     */
    public function getAll($orderBy = "first_name", $orderFormat = "ASC", $start = 0, $limit = ""){
       
         $this->db->select('customer_id, first_name, last_name, email, address, mobile, dni, cp, customer_ref, i_points, group_points, created_on');
        $this->db->where("id != ", "0");//added to prevent people from removing the demo admin account
        $this->db->limit($limit, $start);
        $this->db->order_by($orderBy, $orderFormat);
        
        
        $run_q = $this->db->get('employees');
        if ($run_q->num_rows() > 0) {
            $rows = $run_q->result_array();
            foreach ($rows as $k => $get) {
                $totalpoints = $get['i_points'] + $get['group_points'];
                if($totalpoints < 500){
                    $percent = 0;
                    }else if($totalpoints < 1600){
                    $percent = 11;
                    }else if($totalpoints < 3800){
                    $percent = 14;
                    }else if($totalpoints < 7100){
                    $percent = 17;
                    }else if($totalpoints < 10000){
                    $percent = 20;
                    }else{
                    $percent = 23;
                }   
                $amountbycustomer = $get['i_points'] * 26;
                $amountbycustomer = $amountbycustomer * $percent / 100; 
                $amountbypref = $this->finalf($get['customer_id'], $percent);
                $finalamount = $amountbycustomer + $amountbypref;
                $rows[$k]['finalamount'] = $finalamount;
            }
            return $rows;
        }
        else{
            return FALSE;
        }
    }
    /**
     * 
     * @param type $f_name
     * @param type $l_name
     * @param type $email
     * @param type $customer_id
     * @param type $customer_ref
     * @param type $mobile1
     * @param type $address
     * @param type $dni
     * @param type $cp
     * @return boolean
     */
    public function add($f_name, $l_name, $email, $customer_id, $customer_ref, $mobile1, $address, $dni, $cp){
        $data = ['first_name'=>$f_name, 'last_name'=>$l_name, 'email'=>$email, 'customer_id'=>$customer_id, 'customer_ref'=>$customer_ref,
            'mobile'=>$mobile1, 'address'=>$address, 'dni'=>$dni, 'cp'=>$cp];
        
        //set the datetime based on the db driver in use
        $this->db->platform() == "sqlite3" 
                ? 
        $this->db->set('created_on', "datetime('now')", FALSE) 
                : 
        $this->db->set('created_on', "NOW()", FALSE);
        
        $this->db->insert('employees', $data);
        
        if($this->db->affected_rows() > 0){
            return $this->db->insert_id();
        }
        
        else{
            return FALSE;
        }
    }
     /*
    *************
    */
     /**
     * addpo
     * addpoint to user 
     * @param type $cust_code the total amount to calculate the discount from
     * @param type $cumAmount ac
     * @return boolean
     */
    public function addPoints($cust_code, $cumAmount){//s12 , 350
        //SUMA DE LOS PUNTOS INDIVIDUALES POR LAS COMPRAS AL EMPLEADO QUE REALIZO LA COMPRA
        $points = $cumAmount / 60;
        $q = "UPDATE employees SET i_points = i_points + ? WHERE customer_id = ?";
        $this->db->query($q, [$points, $cust_code]);

        //SUMA DE LOS PUNTOS TOTALES POR LAS COMPRAS QUE REALIZO EL EMPLEADO QUE VAN AL REFERIDO
        
        //OBTENGO LA ID DEL REFERIDO QUE TIENE EL QUE REALIZO LA COMPRA
        $qaux = "SELECT * FROM employees WHERE customer_id = ?";                
        $run_aux = $this->db->query($qaux,[$cust_code]);        
        foreach ($run_aux->result() as $get) {
         
        //A LA ID DEL REFERIDO SE LO SUMO A LOS PUNTOS TOTALES
        $qref = "UPDATE employees SET group_points = group_points + ? WHERE customer_id = ?";
        $this->db->query($qref, [$points ,$get->customer_ref]);
        if($get->customer_ref != "S0"){
        $this->addPointsRef($get->customer_ref,$points);
        }
        return TRUE;
        }

        
    }
   /*
    *************
    */
     /**
     * addpo
     * addpoint to user 
     * @param type $cust_code the total amount to calculate the discount from
     * @param type $points
     * @return boolean
     */
    public function addPointsRef($cust_code, $points){//s12 , 12
        //OBTENGO LA ID DEL REFERIDO QUE TIENE EL QUE REALIZO LA COMPRA
        $qaux = "SELECT * FROM employees WHERE customer_id = ?";                
        $run_aux = $this->db->query($qaux,[$cust_code]);        
        foreach ($run_aux->result() as $get) {
         
        //A LA ID DEL REFERIDO SE LO SUMO A LOS PUNTOS TOTALES
        $qref = "UPDATE employees SET group_points = group_points + ? WHERE customer_id = ?";
        $this->db->query($qref, [$points ,$get->customer_ref]);
        if($get->customer_ref != "S0"){
        $this->addPointsRef($get->customer_ref,$points);
        }
        return TRUE;
        }
        
        
    }
    /*
    *************
    */
     /**
     * addpo
     * addpoint to user 
     * @param type id
     * @return int
     */
    public function finalf($id,$percentparam){//s12 , 12
        //OBTENGO LA ID DEL REFERIDO QUE TIENE EL QUE REALIZO LA COMPRA
        $qaux = "SELECT * FROM employees WHERE customer_ref = ?";                
        $run_aux = $this->db->query($qaux,[$id]);        
        $finalamount = 0;
        foreach ($run_aux->result() as $get) {
        
        $totalpointsaux = $get->i_points + $get->group_points;
        if($totalpointsaux < 500){
            $percent = 0;
        }else if($totalpointsaux < 1600){
            $percent = 11;
        }else if($totalpointsaux < 3800){
            $percent = 14;
        }else if($totalpointsaux < 7100){
            $percent = 17;
        }else if($totalpointsaux < 10000){
            $percent = 20;
        }else{
            $percent = 23;
        }
        
        if($percentparam > $percent){
            //Si el porcentaje del original es mayor que el otro bobo
            $finalpercent = $percentparam - $percent;
             //los restamos
            $finalamountref = $totalpointsaux * 26;
            $finalamountref = $finalamountref * $finalpercent / 100;
            //contador para sacar toda la plata de los de abajo de el
            $finalamount = $finalamount + $finalamountref;
        }
    }
        return $finalamount;
        
    }
    public function employeesearch($value) {
        $q = "SELECT * FROM employees
            WHERE 
            customer_id LIKE '%".$this->db->escape_like_str($value)."%'
            || 
            customer_ref LIKE '%".$this->db->escape_like_str($value)."%'
            || 
            first_name LIKE '%".$this->db->escape_like_str($value)."%'
            || 
            dni LIKE '%".$this->db->escape_like_str($value)."%'
            ||
            mobile LIKE '%".$this->db->escape_like_str($value)."%'
            ||  
            address LIKE '%".$this->db->escape_like_str($value)."%'
            ||
            email LIKE '%".$this->db->escape_like_str($value)."%'
            ||
            last_name LIKE '%".$this->db->escape_like_str($value)."%'";
        
        $run_q = $this->db->query($q, [$value, $value]);
       
        if ($run_q->num_rows() > 0) {
            $rows = $run_q->result_array();
            foreach ($rows as $k => $get) {
                $totalpoints = $get['i_points'] + $get['group_points'];
                if($totalpoints < 500){
                    $percent = 0;
                    }else if($totalpoints < 1600){
                    $percent = 11;
                    }else if($totalpoints < 3800){
                    $percent = 14;
                    }else if($totalpoints < 7100){
                    $percent = 17;
                    }else if($totalpoints < 10000){
                    $percent = 20;
                    }else{
                    $percent = 23;
                }   
                $amountbycustomer = $get['i_points'] * 26;
                $amountbycustomer = $amountbycustomer * $percent / 100; 
                $amountbypref = $this->finalf($get['customer_id'], $percent);
                $finalamount = $amountbycustomer + $amountbypref;
                $rows[$k]['finalamount'] = $finalamount;
            }
            return $rows;
        }
        
        else{
            return FALSE;
        }
    }

}