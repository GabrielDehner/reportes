<?php

class HomeController extends BaseController{

    function index(){
        //$users = new Users($this->db);
        //$this->f3->set('users', $users->find());

       // $this->f3->set('var1', 'Prueba vars');
        
       // $this->f3->set('view', 'pages/index.php');
        //print_r ('asdasd');
        echo Template::instance()->render('header.php');
        echo Template::instance()->render('pages/comprobante.htm');
        echo Template::instance()->render('footer.php');
    }
    function guardar_comprobante(){
        $comprobante = new Comprobantes($this->db);

        $id=$comprobante->save_comprobante(($this->f3->get('POST')));
        //$nombre= ($this->f3->get('POST'))['nombre'];
        echo json_encode($id);
        //echo json_encode($nombre);
        //print_r($this->f3->get('POST'));

    }
}