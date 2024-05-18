<?php

namespace App\Controllers;

use CodeIgniter\Controller;
use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;
use Psr\Log\LoggerInterface;
use App\Models\PageModel;

abstract class BaseController extends Controller
{
    protected $request;
    protected $pageModel;
    protected $navs;

    protected $helpers = ['common'];

    public function initController(RequestInterface $request, ResponseInterface $response, LoggerInterface $logger)
    {
        parent::initController($request, $response, $logger);

        $this->pageModel=new PageModel();
        $this->navs=$this->pageModel->pageList('pageTitle,sefLink',['sort>'=>0]);
    }
}
