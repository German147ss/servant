<?php
defined('BASEPATH') OR exit('');
/**
 * Description of Customer
 *
 * @author Amir <amirsanni@gmail.com>
 * @date 4th RabThaani, 1437AH (15th Jan, 2016)
 */

class Service extends CI_Model{
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
    /**
     * 
     * @param type $orderBy
     * @param type $orderFormat
     * @param type $start
     * @param type $limit
     * @return boolean
     */
    public function getAll($orderBy = "first_name", $orderFormat = "ASC", $start = 0, $limit = ""){
        $this->db->select('id, first_name, contact, description, price, local, created_on, payed');


        $this->db->limit($limit, $start);
        $this->db->order_by($orderBy, $orderFormat);
        
        $run_q = $this->db->get('service');
        if(!$this->session->admin_local == ""){
         $this->db->where('local =', $this->session->admin_local);
            
        }
        if($run_q->num_rows() > 0){
            return $run_q->result();
        }
        
        else{
            return FALSE;
        }
    }
    
    public function add($f_name ,$description , $price, $contact, $local, $payed){
        $data = ['first_name'=>$f_name ,'price'=>$price , 'contact'=>$contact, 'description'=>$description, 'local'=>$local, 'payed'=>$payed];
        
        //set the datetime based on the db driver in use
        $this->db->platform() == "sqlite3" 
                ? 
        $this->db->set('created_on', "datetime('now')", FALSE) 
                : 
        $this->db->set('created_on', "NOW()", FALSE);
        
        $this->db->insert('service', $data);
        
        if($this->db->affected_rows() > 0){
            return $this->db->insert_id();
        }
        
        else{
            return FALSE;
        }
    }
    public function getCumTotal(){
        $this->db->select("SUM(price) as cumPrice ");

        $run_q = $this->db->get('service');

        return $run_q->num_rows() ? $run_q->row()->cumPrice : FALSE;
    }
     public function getCumPayed(){
         if(!$this->session->admin_local == ""){
            $localCum = $this->session->admin_local;
         $str = "SELECT SUM(price) AS 'cumPricePayed'
        FROM service
        WHERE payed = 1 AND local = '$localCum';";
            
        }else{
            $str = "SELECT SUM(price) AS 'cumPricePayed'
FROM service
WHERE payed = 1;";
        }

            $run_q = $this->db->query($str);

        return $run_q->num_rows() ? $run_q->row()->cumPricePayed : FALSE;
    }
    public function getCumNotPayed(){
        if(!$this->session->admin_local == ""){
            $localCum = $this->session->admin_local;
         $str2 = "SELECT SUM(price) AS 'cumPriceNotPayed'
        FROM service
        WHERE payed = 0 AND local = '$localCum';";
            
        }else{
            $str2 = "SELECT SUM(price) AS 'cumPriceNotPayed'
FROM service
WHERE payed = 0;";
        }

            $run_q = $this->db->query($str2);

        return $run_q->num_rows() ? $run_q->row()->cumPriceNotPayed : FALSE;
    }

}