<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Books extends CI_Controller
{
    
    public function __construct() {
        Parent::__construct();
        $this->load->model("books_model");
    }

     public function index()
     {
          $data = new Books_Model();
          $book['books'] = $data->get_books();
          $book['name'] = $data->getUniqueData('name');
          $book['author'] = $data->getUniqueData('author');
          $book['publisher'] = $data->getUniqueData('publisher');
          $book['rating'] = $data->getUniqueData('rating');
          $book['price'] = $data->getUniqueData('price');
          
          $this->load->view("books/index.php", $book);
     }
     public function export(){
          $data = new Books_Model();
          $data = $data->get_books();
          // print_r($data);
          // die();
          // $data[] = array('f_name'=> "Nishit", 'l_name'=> "patel", 'mobile'=> "999999999", 'gender'=> "male");
          
          header("Content-type: application/csv");
          header("Content-Disposition: attachment; filename=\"book".".csv\"");
          header("Pragma: no-cache");
          header("Expires: 0");

          $handle = fopen('php://output', 'w');
          fputcsv($handle, array("S.No","Book Name","Author","Publication","Rating","Price"));
          $cnt=1;
          foreach ($data as $key) {
               $narray=array($cnt,$key->name,$key->author,$key->publisher,$key->rating,$key->price,);
               fputcsv($handle, $narray);
               $cnt++;
          }
               fclose($handle);
          exit;
     }

     public function readcsv(){
          $this->load->database();
          $this->load->helper('url');
        //   print_r($_FILES['enterCSV']['error']);
        //   die;
        if($_FILES['enterCSV']['error']>0){
            redirect('index.php/Books', 'refresh');
        }else{

          $handle = fopen($_FILES['enterCSV']['tmp_name'], "r");
          $count=0;
          while($csv_line = fgetcsv($handle,1024))
        {
            $count++;
            if($count == 1)
            {
                continue;
            }//keep this if condition if you want to remove the first row
            for($i = 0, $j = count($csv_line); $i < $j; $i++)
            {
                $insert_csv = array();
                $insert_csv['name'] = $csv_line[1];//remove if you want to have primary key,
                $insert_csv['author'] = $csv_line[2];
                $insert_csv['publisher'] = $csv_line[3];
                $insert_csv['rating'] = $csv_line[4];
                $insert_csv['price'] = $csv_line[5];
                

            }
            $i++;
          //   print_r($insert_csv);
            
            $data = array(
                'name' => $insert_csv['name'] ,
                'author' => $insert_csv['author'],
                'publisher' => $insert_csv['publisher'],
                'rating' => $insert_csv['rating'],
                'price' => $insert_csv['price']
               );
            $data['crane_features']=$this->db->insert('books', $data);
        }
        fclose($handle) or die("can't close file");
        $data['success']="success";
     //    return $data;
     //    print_r($data);
        $this->load->view("books/index.php");
        }
    }


    //read function get value from db and sant it to update page.
    public function readData($id){
        echo 'hello'.$id;
    }


    //update function
    public function update(){
        $this->load->view('books/update');
    }


//search function
    public function search(){
        return $responce = array(
            'data'=>[
                'emp_name'=>'hafdksdakl'
            ]
            );
    }

}
?>