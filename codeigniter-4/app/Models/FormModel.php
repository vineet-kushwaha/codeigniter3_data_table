<?php 
namespace App\Models;
use CodeIgniter\Model;

class FormModel extends Model
{
    protected $table = 'users';
    // protected $primaryKey = 'id';

    public function saveData($data){
        $query = $this->db->table($this->table)->insert($data);
        return $query;
        // $allowedFields = ['name', 'email', 'phone_no','password'];
        
    }

    public function getData($id = false){
        if($id==false){
            return $this->findAll();
        }else{
            return $this->getWhere(['email'=>$id]);
        }
    }

    public function getDataByEmail($val){
        if(!$val){
            return false;
        }else{
            return $this->getWhere(['email'=>$val]);
        }
    }
    public function updateData($data,$id){
        $query = $this->db->table($this->table)->update($data, array('id' => $id));
        return $query;
    }
}