<?php

namespace App\Controllers;

class Pageforms extends BaseController
{
    public function contact_form()
    {
        $valData = [
            'fullname' => ['label' => 'Ad Soyad', 'rules' => 'required'],
            'email' => ['label' => 'E-Mail', 'rules' => 'required|valid_email'],
            'subject' => ['label' => 'Konu', 'rules' => 'required'],
            'content' => ['label' => 'Mesajınız', 'rules' => 'required'],
        ];

        if ($this->validate($valData) == false) {
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }

        // Eğer doğrulama başarılı olursa form verilerini ekrana bas
        echo "<pre>";
        print_r($this->request->getPost());
        echo "</pre>";
        exit;
    }
}
