<?php

namespace App\Controllers;

class appController extends BaseController
{
	public function index()
	{
		echo 'inside app';
	}
    public function find($any){
       echo view('index.php');
       // echo 'string passed is: '.$any;
        // /echo view('template/footer.php');
    }

}
