<?php

namespace App\Libraries;

use App\Models\BlogModel;   

class Blog
{
    public function recentBlogs(array $params = [])
    {
        $blogModel = new BlogModel();

        // $params['select'] ve $params['where'] değerlerini kullanarak blogları al
        $data = [
            'blogs' => $blogModel->blogList($params['select'], $params['where'])
        ];

        // Görünüm dosyasına $data değişkenini geçirin
        return view('blogg/blogViewCell', $data);
    }
}
