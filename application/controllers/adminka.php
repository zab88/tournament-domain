<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Adminka extends CI_Controller {

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
        // Read the username
        $username = $this->input->post('lgn');

        // Read the password
        $password = $this->input->post('psw');

        if ($username && $password){
            // Try to log the user in
            if ($this->authentication->login($username, $password))
            {
                // The user was SUCCESSFULLY logged in
                redirect('adminka/tournaments');
                exit();
            }
        }

        $this->load->view('header');
        $this->load->view('admin/login.php');
        $this->load->view('footer');
    }
    public function tournaments()
    {
        //https://github.com/joelvardy/Basic-CodeIgniter-Authentication
        if ($this->authentication->is_loggedin())
        {
            #if post data
            $new_title = $this->input->post('title');
            $new_name = $this->input->post('name');
            $new_description = $this->input->post('desc');
            $new_sites = $this->input->post('trn_stages');
//            var_dump($new_sites);die;
            if ($new_name && $new_description && $new_sites){
                $this->db->update('sites', array(
                    'title' => $new_title,
                    'name' => $new_name,
                    'description' => $new_description,
                    'urls' => json_encode( $new_sites )
                ));
            }

            $query = $this->db->get_where('sites', array('id'=>1));
            $site = $query->result_array();
            $site = $site[0];
//            var_dump($site);die;
            $user_tournaments = array();
            $data = array(
                'site' => $site
            );

            // User is logged in
            $this->load->view('admin/header');
            $this->load->view('admin/tournaments.php', $data);
            $this->load->view('footer');
        } else {
            redirect('adminka');
        }

    }

    public function logout()
    {
        $this->authentication->logout();
        redirect('adminka');
    }
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */