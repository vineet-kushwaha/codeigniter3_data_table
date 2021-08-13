<?php
namespace App\Controllers;
use App\Models\FormModel;
use CodeIgniter\Controller;
use CodeIgniter\HTTP\RequestInterface;
// $session = \Config\Services::session($config);
$session = session() ;


class LoginCon extends Controller
{
	public function info()
	{
		return view('login');
	}

	public function loginVal() {
        helper(['form', 'url']);
        $input = $this->validate([
            'email' => 'required|valid_email',
            'password' => 'required'
        ]);
		// return $this->response->redirect(site_url('/contact-form'));
		// print_r($data['user']->password);
		// print_r($data['user']['password']);
		if(empty($input)){
			return view('login');	
		}
		else{
			
			$formModel = new FormModel();
			$data['user'] = $formModel->getDataByEmail($_POST['email'])->getRow();            

			if($data['user']->password==$_POST['password']){

				$session['user'] = $data['user'];     //to get data from session['user'] or data['user']  write $data['user']->id  because it is class boject.
				// print_r($session);
				if(($session['user'])){
					$model = new FormModel();
					$data['user'] = $model->getData();
					return view('dashbord',$data);
				}
			}else{
				return view('login');
			}
		}
    }

	public function logout(){


		print_r($session->user);
		
	}

	public function editData($id){

	}

	public function update($id){
		$model = new FormModel();
        // $id = $this->request->getVar('id');

		print_r($id);
		// die();
        $update_data = array(
            'name'  => $this->request->getPost('name'),
            'email' => $this->request->getPost('email'),
            'phone_no' => $this->request->getPost('phone'),
            'password' => $this->request->getPost('password'),
        );
        $model->updateData($update_data, $id);
		$data['user'] = $model->getData();
        return view('contact_form', $update_data ,$data);
	}
}