<?php

class Books_Model extends CI_Model
{    
    //  protected $table = 'books';

     public function get_books()
     {
        $this->load->database();
        //  print_r($this->db->get("books"));
        $query = $this->db->query("select * from books");
        return $query->result();
     }


//get value by id.
     public function getDataByID($id){
        $query = $this->db->query('select from books where ID');
     }

    //  public function getData($id = false){
    //       if($id==false){
    //           return $this->findAll();
    //       }else{
    //           return $this->getWhere(['email'=>$id]);
    //       }
    //   }
}

?>