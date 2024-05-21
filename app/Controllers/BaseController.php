<?php

namespace App\Controllers;

use App\Libraries\Cart; // Doğru namespace'i kullandığınızdan emin olun
use CodeIgniter\Controller;
use App\Models\PageModel;
use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;
use Psr\Log\LoggerInterface;
use App\Models\CommonModel; // Doğru namespace'i kullandığınızdan emin olun

abstract class BaseController extends Controller
{
    protected $request;
    protected $pageModel;
    protected $navs;

    protected $helpers = [];

    public $defData;
    public $commonModel;
    public $secondModel;

    public function initController(RequestInterface $request, ResponseInterface $response, LoggerInterface $logger)
    {
        // Do Not Edit This Line
        parent::initController($request, $response, $logger);
       // $this->commonModel = new CommonModel();
       // $this->secondModel = new CommonModel('secondDB');

        //--------------------------------------------------------------------
        // Preload any models, libraries, etc, here.
        //--------------------------------------------------------------------
        // E.g.:
        // $this->session = \Config\Services::session();
        $this->pageModel = new PageModel();
        $this->navs = $this->pageModel->select('pageTitle,sefLink')->where(['sort>' => 0])->orderBy('sort', 'asc')->findAll();
       // $this->defData = ['cart' => new Cart(),
          //  'navs' => $this->navs];
    }
}
