<?php

class IndexController extends ControllerBase
{

    public function indexAction()
    {
        return $this->response->redirect('user/login');
    }

    public function show404Action()
    {
    }

    public function show503Action()
    {
    }
}

