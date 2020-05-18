<?php

//application/controllers/Pics.php

class Pics extends CI_Controller {

        public function __construct()
        {
                parent::__construct();                
                $this->config->set_item('banner', 'Pics Section');
                $this->load->model('pics_model');
                $this->load->helper('url_helper');
        }

        public function index()
        {
                $this->config->set_item('title', 'Seattle Sports Pics');
                $data['pics'] = $this->pics_model->get_pics();
                $data['title'] = 'Pics Archive';

                $this->load->view('pics/index', $data);
 
        }

        public function view($slug = NULL)
        {
                $this->config->set_item('title', 'Seattle ' . ucfirst($slug) . ' Pics');
                $data['pics_item'] = $this->pics_model->set_pics($slug);
        
                if (empty($data['pics_item']))
                {
                        show_404();
                }
        
                $data['title'] = ucfirst($slug) . ' Pictures';
                $this->load->view('pics/view', $data);
        }

}
