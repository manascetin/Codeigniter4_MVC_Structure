<?php

namespace App\Controllers;


class Home extends BaseController
{
    public function index()
    {
        helper(filenames:'common');
        echo view('common/header');
        echo view('hello_world');
        echo view('common/footer');
    }
    public function about()
    {
        echo view('common/header');
        echo view('about');
        echo view('common/footer');
    }
    public function welcome()
    {
        echo view('common/header');
        echo view('welcome_message');
        echo view('common/footer');                                        
    }
    public function contact()
    {
        echo view('common/header');
        echo view('contact');
        echo view('common/footer');
    }

    public function product_list()
    {
        $data['products'] = [['product_title' => "Iphone 14 Pro Max",
                            'product_category' => 'Akıllı Telefon',
                            'stock' => 18],
                            ['product_title' => "Monster Abra A7",
                            'product_category' => 'Laptop',
                            'stock' => 9],
                            ['product_title' => "Macbook Pro M2",
                                'product_category' => 'Laptop',
                                'stock' => 4],
                            ['product_title' => "Redmi Note 10 Pro",
                                'product_category' => 'Akıllı Telefon',
                                'stock' => 23]];
        
        echo view('common/header');
        echo view('products/product_list',$data);
        echo view('common/footer');
    }
    
    public function blogList()
    {
       
        $data=['params'=>[
            'where'=>[],
            'select'=>'title,content,categoryName,']];
        echo view('common/header');
        echo view('blogg/blogList',$data);
        echo view('common/footer');
    }
      
}
