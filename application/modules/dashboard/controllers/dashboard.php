<?php
defined('BASEPATH') or exit('No direct script access allowed');

/**
 *
 */
class Dashboard extends CI_Controller
{

    public function index()
    {
        $data['content'] = 'dashboard_content';
        $data['caption'] = 'Dashboard';
        $data['header'] = 'dashboard_header';
        $data['sidebar'] = 'dashboard_sidebar';
        $data['control_sidebar'] = 'dashboard_control_sidebar';
        $this->load->view('dashboard/dashboard_view', $data);
    }
}
