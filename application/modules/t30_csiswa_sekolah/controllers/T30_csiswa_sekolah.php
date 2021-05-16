<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class T30_csiswa_sekolah extends CI_Controller
{

    function __construct()
    {
        parent::__construct();
        $this->load->model('T30_csiswa_sekolah_model');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $q = urldecode($this->input->get('q', TRUE));
        $start = intval($this->input->get('start'));

        if ($q <> '') {
            $config['base_url'] = base_url() . 't30_csiswa_sekolah?q=' . urlencode($q);
            $config['first_url'] = base_url() . 't30_csiswa_sekolah?q=' . urlencode($q);
        } else {
            $config['base_url'] = base_url() . 't30_csiswa_sekolah';
            $config['first_url'] = base_url() . 't30_csiswa_sekolah';
        }

        $config['per_page'] = 10;
        $config['page_query_string'] = TRUE;
        $config['total_rows'] = $this->T30_csiswa_sekolah_model->total_rows($q);
        $t30_csiswa_sekolah = $this->T30_csiswa_sekolah_model->get_limit_data($config['per_page'], $start, $q);

        $this->load->library('pagination');
        $this->pagination->initialize($config);

        $data = array(
            't30_csiswa_sekolah_data' => $t30_csiswa_sekolah,
            'q' => $q,
            'pagination' => $this->pagination->create_links(),
            'total_rows' => $config['total_rows'],
            'start' => $start,
        );
        // $this->load->view('t30_csiswa_sekolah/t30_csiswa_sekolah_list', $data);
        $data['content'] = 't30_csiswa_sekolah/t30_csiswa_sekolah_list';
        $data['caption'] = 'Pendaftaran';
        $data['header'] = 'dashboard_header';
        $data['sidebar'] = 'dashboard_sidebar';
        $data['control_sidebar'] = 'dashboard_control_sidebar';
        $this->load->view('dashboard/dashboard_view', $data);
    }

    public function read($id)
    {
        $row = $this->T30_csiswa_sekolah_model->get_by_id($id);
        if ($row) {
            $data = array(
				'idcsiswasekolah' => $row->idcsiswasekolah,
				'idcsiswa' => $row->idcsiswa,
				'idsekolah' => $row->idsekolah,
			);
            $this->load->view('t30_csiswa_sekolah/t30_csiswa_sekolah_read', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('t30_csiswa_sekolah'));
        }
    }

    public function create()
    {
        $data = array(
            'button' => 'Simpan',
            'action' => site_url('t30_csiswa_sekolah/create_action'),
			'idcsiswasekolah' => set_value('idcsiswasekolah'),
			'idcsiswa' => set_value('idcsiswa'),
			'idsekolah' => set_value('idsekolah'),
		);
        // $this->load->view('t30_csiswa_sekolah/t30_csiswa_sekolah_form', $data);
        $data['content'] = 't30_csiswa_sekolah/t30_csiswa_sekolah_form';
        $data['caption'] = 'Pendaftaran';
        $data['header'] = 'dashboard_header';
        $data['sidebar'] = 'dashboard_sidebar';
        $data['control_sidebar'] = 'dashboard_control_sidebar';
        $this->load->view('dashboard/dashboard_view', $data);
    }

    public function create_action()
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
				'idcsiswa' => $this->input->post('idcsiswa',TRUE),
				'idsekolah' => $this->input->post('idsekolah',TRUE),
			);
            // $this->T30_csiswa_sekolah_model->insert($data);
            $last_id = $this->T30_csiswa_sekolah_model->insert($data); //echo pre($last_id == FALSE); exit;
            if ($last_id == FALSE) {
                $this->session->set_flashdata('message', 'Data Sudah Ada !');
                $this->create();
            } else {
                $this->session->set_flashdata('message', 'Create Record Success');
                redirect(site_url('t30_csiswa_sekolah'));
            }
        }
    }

    public function update($id)
    {
        $row = $this->T30_csiswa_sekolah_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Simpan',
                'action' => site_url('t30_csiswa_sekolah/update_action'),
				'idcsiswasekolah' => set_value('idcsiswasekolah', $row->idcsiswasekolah),
				'idcsiswa' => set_value('idcsiswa', $row->idcsiswa),
				'idsekolah' => set_value('idsekolah', $row->idsekolah),
			);
            // $this->load->view('t30_csiswa_sekolah/t30_csiswa_sekolah_form', $data);
            $data['content'] = 't30_csiswa_sekolah/t30_csiswa_sekolah_form';
            $data['caption'] = 'Pendaftaran';
            $data['header'] = 'dashboard_header';
            $data['sidebar'] = 'dashboard_sidebar';
            $data['control_sidebar'] = 'dashboard_control_sidebar';
            $this->load->view('dashboard/dashboard_view', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('t30_csiswa_sekolah'));
        }
    }

    public function update_action()
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('idcsiswasekolah', TRUE));
        } else {
            $data = array(
				'idcsiswa' => $this->input->post('idcsiswa',TRUE),
				'idsekolah' => $this->input->post('idsekolah',TRUE),
			);
            $this->T30_csiswa_sekolah_model->update($this->input->post('idcsiswasekolah', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('t30_csiswa_sekolah'));
        }
    }

    public function delete($id)
    {
        $row = $this->T30_csiswa_sekolah_model->get_by_id($id);

        if ($row) {
            $this->T30_csiswa_sekolah_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('t30_csiswa_sekolah'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('t30_csiswa_sekolah'));
        }
    }

    public function _rules()
    {
		$this->form_validation->set_rules('idcsiswa', 'idcsiswa', 'trim|required');
		$this->form_validation->set_rules('idsekolah', 'idsekolah', 'trim|required');
		$this->form_validation->set_rules('idcsiswasekolah', 'idcsiswasekolah', 'trim');
		$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

    public function excel()
    {
        $this->load->helper('exportexcel');
        $namaFile = "t30_csiswa_sekolah.xls";
        $judul = "t30_csiswa_sekolah";
        $tablehead = 0;
        $tablebody = 1;
        $nourut = 1;
        //penulisan header
        header("Pragma: public");
        header("Expires: 0");
        header("Cache-Control: must-revalidate, post-check=0,pre-check=0");
        header("Content-Type: application/force-download");
        header("Content-Type: application/octet-stream");
        header("Content-Type: application/download");
        header("Content-Disposition: attachment;filename=" . $namaFile . "");
        header("Content-Transfer-Encoding: binary ");
        xlsBOF();
        $kolomhead = 0;
        xlsWriteLabel($tablehead, $kolomhead++, "No");
		xlsWriteLabel($tablehead, $kolomhead++, "Idcsiswa");
		xlsWriteLabel($tablehead, $kolomhead++, "Idsekolah");
		foreach ($this->T30_csiswa_sekolah_model->get_all() as $data) {
            $kolombody = 0;
            //ubah xlsWriteLabel menjadi xlsWriteNumber untuk kolom numeric
            xlsWriteNumber($tablebody, $kolombody++, $nourut);
			xlsWriteNumber($tablebody, $kolombody++, $data->idcsiswa);
			xlsWriteNumber($tablebody, $kolombody++, $data->idsekolah);
			$tablebody++;
            $nourut++;
        }
        xlsEOF();
        exit();
    }

    public function word()
    {
        header("Content-type: application/vnd.ms-word");
        header("Content-Disposition: attachment;Filename=t30_csiswa_sekolah.doc");
        $data = array(
            't30_csiswa_sekolah_data' => $this->T30_csiswa_sekolah_model->get_all(),
            'start' => 0
        );
        $this->load->view('t30_csiswa_sekolah/t30_csiswa_sekolah_doc',$data);
    }

}

/* End of file T30_csiswa_sekolah.php */
/* Location: ./application/controllers/T30_csiswa_sekolah.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2021-05-16 03:48:18 */
/* http://harviacode.com */
