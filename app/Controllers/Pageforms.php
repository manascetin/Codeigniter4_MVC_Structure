<?php

namespace App\Controllers;

class Pageforms extends BaseController
{
    public function contact_form()
    {
        _printrDie($_POST);
    }
  
}