<?php

namespace App\Controllers;

use App\Models\BlogModel;

class Home extends BaseController
{
    public function index()
    {
        helper(filenames:'common');
        return view('hello_world');
    }
    public function about()
    {
        return view('about');
    }
    public function welcome()
    {
        echo view('common/header');
        echo view('welcome_message');
        echo view('common/footer');                                        
    }
    public function contact()
    {
        return view('contact');
    }

    public function product_list()
    {
        $data['products'] = [['product_title' => "Iphone 14 Pro Max",
                            'product_category' => 'Telefon',
                            'stock' => 18],
                            ['product_title' => "Monster Abra A7",
                            'product_category' => 'Laptop',
                            'stock' => 9],
                            ['product_title' => "Macbook Pro M2",
                                'product_category' => 'Laptop',
                                'stock' => 4],
                            ['product_title' => "Samsung Galaxy S23",
                                'product_category' => 'Telefon',
                                'stock' => 1],
                            ['product_title' => "Redmi Note 10 Pro",
                                'product_category' => 'Telefon',
                                'stock' => 23]];
        
        return view('products/product_list',$data);
    }
    
    public function blogList()
    {
        $blogModel = new BlogModel();
        $data=['params'=>[
            'where'=>[],
            'select'=>'title,content,categoryName,blog_categories.pk'],
            'blogCats'=>$blogModel->blogCategories('categoryName,sefLink',[])
        ];
            
        return view('blogg/blogList',$data);
    }

    public function blogCategory($catName = 'codeigniter_4')
    {
        $blogModel = new \App\Models\BlogModel();
    
        $select = 'blogs.title, blogs.content, blog_categories.categoryName, blog_categories.pk';
        $where = ['blog_categories.sefLink' => $catName];
        $blogCats=[$blogModel->blogCategories('categoryName,sefLink',[])];
    
        // $params'ı tanımla
        $params = [
            'select' => $select,
            'where' => $where,
            'blogCats' => $blogCats
        ];
    
        // Blogları seçilen kategoriye göre al
        $data['blogs'] = $blogModel->blogList($select, $where);
    
        // $params'ı view'e geçir
        $data['params'] = $params;

        $data['blogCats'] = $blogModel->blogCategories();
    
        return view('blogg/blogList', $data);
    }
    
    
}