<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Tournaments extends CI_Controller {

    /**
     * Index Page for this controller.
     *
     * Maps to the following URL
     * 		http://example.com/index.php/welcome
     *	- or -
     * 		http://example.com/index.php/welcome/index
     *	- or -
     * Since this controller is set as the default controller in
     * config/routes.php, it's displayed at http://example.com/
     *
     * So any other public methods not prefixed with an underscore will
     * map to /index.php/welcome/<method_name>
     * @see http://codeigniter.com/user_guide/general/urls.html
     */
    public function index()
    {
        #$user_id = $this->authentication->create_user('user1', 'Volley321');
        #var_dump($user_id);


        $query = $this->db->get_where('sites', array('id'=>1));
        $site = $query->result_array();
        $site = $site[0];

        $this->load->vars(array('site_title'=>$site['title']));
        $this->load->view('header');
        $this->load->view('home', array('site'=>$site));
        $this->load->view('footer');
    }
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */