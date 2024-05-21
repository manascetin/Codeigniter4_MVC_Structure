<?php

namespace App\Controllers;

use App\Models\BlogModel;
use App\Models\TagModel;

class Home extends BaseController
{

    public function index()
    {
        $data = ['navs'=> $this->navs];
        helper('common');
        return view('hello_world',['navs'=> $this->navs]);
    }

    public function about()
    {
        $data = ['navs'=> $this->navs];
        return view('about',['navs'=> $this->navs]);
    }

    public function welcome()
    {
        echo view('common/header');
        echo view('welcome_message',['navs'=> $this->navs]);
        echo view('common/footer');                                        
    }

    public function contact()
    {
        return view('contact',['navs'=> $this->navs]);
    }

    public function product_list()
    {
        $data=['products' => [
            ['product_title' => "Iphone 14 Pro Max",
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
            'stock' => 23]],
        'navs'=>$this->navs];
        
        return view('products/product_list', $data);
    }
    
    public function blogList()
    {
        $blogModel = new BlogModel();
        $data = [
            'params' => [
                'where' => [],
                'select' => 'title,content,categoryName,blog_categories.pk'
            ],
            'blogCats' => $blogModel->blogCategories('categoryName,sefLink',[]),
            'navs' => $this->navs
        ];
            
        return view('blogg/blogList', $data);
    }

    public function blogCategory($catName = 'codeigniter_4')
    {
        $blogModel = new \App\Models\BlogModel();
    
        $select = 'blogs.title, blogs.content, blog_categories.categoryName, blog_categories.pk';
        $where = ['blog_categories.sefLink' => $catName];
        $blogCats = $blogModel->blogCategories('categoryName,sefLink',[]);
        
        $params = [
            'select' => $select,
            'where' => $where,
            'blogCats' => $blogCats,
            'navs' => $this->navs
        ];
    
        $data['blogs'] = $blogModel->blogList($select, $where);
        $data['params'] = $params;
        $data['blogCats'] = $blogCats;
        $data['navs'] = $this->navs;
    
        return view('blogg/blogList', $data);
    }

    public function tagList()
    {
        $tagModel = new TagModel();
        $data=['navs'=>$this->navs,
        'tags'=>$tagModel->findAll()];
        return view('tagList',$data);
    }

        public function tagAddView()
    {
        $data = ['navs'=> $this->navs];
        return view('tagAdd', $data);
    }

    public function tagAdd()
    {
        $data = ['navs'=> $this->navs];
        $tagModel = new TagModel();
        $return = $tagModel->insert(['tag' => $this->request->getPost('tag')]);
        if ($return === false) 
            return redirect()->back()->with('errors', $tagModel->errors());

        return redirect()->back()->with('message', 'Başarılı bir şekilde kayıt edildi.');
    }


    public function tagUpdateView($pk)
    {
        $tagModel = new TagModel();
        $data = [
            'navs' => $this->navs,
            'tag' => $tagModel->find($pk)
        ];
        return view('tagUpdate', $data);
    }
    
    public function tagUpdate($pk)
    {
        $tagModel = new TagModel();
        $return = $tagModel->update($pk, ['tag' => $this->request->getPost('tag')]);
    
        if ($return === false) 
            return redirect()->back()->withInput()->with('errors', $tagModel->errors());
    
        return redirect()->to('/tags')->with('message', 'Başarılı bir şekilde güncellendi.');
    }
    

    public function tagDelete($pk)
    {
        $tagModel = new TagModel();
        $return = $tagModel->delete($pk);
    
        if ($return === false) {
            return redirect()->to('tags')->with('errors', $tagModel->errors());
        } else {
            return redirect()->to('tags')->with('message', 'Başarılı bir şekilde kayıt edildi.');
        }
    }

    public function recoveryTag($pk)
    {
        $tagModel = new TagModel();
        $data = ['id' => $pk, 'deleted_at' => NULL];
        $return = $tagModel->save($data);

        if ($return === false) return redirect()->back()->with('errors', $tagModel->errors());

        return redirect()->to('/tags')->with('message', 'Başarılı bir şekilde silinenlerden kaldırıldı.');
    }

    public function deletedTags()
    {
        $tagModel = new TagModel();
        $data = [
            'navs' => $this->navs, // $navs değişkenini tanımla
            'tags' => $tagModel->onlyDeleted()->findAll()
        ];
        return view('tagList', $data);
    }


    
    

    
}
