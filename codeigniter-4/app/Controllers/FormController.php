<?php 
namespace App\Controllers;
use App\Models\FormModel;
use CodeIgniter\Controller;
use CodeIgniter\HTTP\RequestInterface;

class FormController extends Controller
{

    public function create() {
        //here all data in database is assign to $data using ->getData()
        $model = new FormModel();
        $data['user'] = $model->getData();
        return view('contact_form',$data);
    }
 //data insert and validatin is performed
    public function formValidation() {
        helper(['form', 'url']);
        
        $input = $this->validate([
            'name' => 'required|min_length[3]',
            'email' => 'required|valid_email',
            'phone' => 'required|numeric|max_length[10]',
            'password' => 'required'
        ]);

        $formModel = new FormModel();
 
        if (!$input) {
            echo view('contact_form', [
                'validation' => $this->validator
            ]);
        } else {
            $data = array(
                'name' => $this->request->getVar('name'),     //$this->request->getVar('name') works fine like $_POST['name']
                'email'  => $_POST['email'],
                'phone_no'  => $_POST['phone'],
                'password' => $this->request->getVar('password'),
            );
            $formModel->saveData($data);          
            
            return $this->response->redirect(site_url('/contact-form'));
        }
    }

    public function edit($id){
        $model = new FormModel();
        $data['user'] = $model->getData($id)->getRow();
        echo view('/contact-form',$data);
    }

}