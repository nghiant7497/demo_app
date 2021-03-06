<?php
namespace App\Controller;

use App\Controller\AppController;

class HomeController extends AppController
{

    public function initialize()
    {
        parent::initialize(); // TODO: Change the autogenerated stub
        $this->Auth->allow('index');

        $this->loadModel('Products');
        $this->loadComponent('Cart');
    }

    public function index(){
        //lấy 8 sp mới nhất
        $newproducts = $this->Products->find()->limit(8)->order(['created' => 'DESC'])->toList();

        //lấy 8 sp bán chạy nhất
        $topbuyedproducts = $this->Products->find()->limit(8)->order(['buyed' => 'DESC'])->toList();

        //lấy 20 sp view nhiều nhất
        $topviewproducts = $this->Products->find()->limit(20)->order(['view' => 'DESC'])->toList();

        //lấy 20 sp bất kì
        $allproducts = $this->Products->find()->limit(30)->order(['created' => 'DESC'])->toList();

        $this->set(compact('newproducts','topbuyedproducts','topviewproducts','allproducts'));
    }
}
