<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Motor extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Motor_model');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $q = urldecode($this->input->get('q', TRUE));
        $start = intval($this->input->get('start'));
        
        if ($q <> '') {
            $config['base_url'] = base_url() . 'motor/index.html?q=' . urlencode($q);
            $config['first_url'] = base_url() . 'motor/index.html?q=' . urlencode($q);
        } else {
            $config['base_url'] = base_url() . 'motor/index.html';
            $config['first_url'] = base_url() . 'motor/index.html';
        }

        $config['per_page'] = 10;
        $config['page_query_string'] = TRUE;
        $config['total_rows'] = $this->Motor_model->total_rows($q);
        $motor = $this->Motor_model->get_limit_data($config['per_page'], $start, $q);

        $this->load->library('pagination');
        $this->pagination->initialize($config);

        $data = array(
            'motor_data' => $motor,
            'q' => $q,
            'pagination' => $this->pagination->create_links(),
            'total_rows' => $config['total_rows'],
            'start' => $start,
        );
        $this->load->view('motor/motor_list', $data);
    }

    public function read($id) 
    {
        $row = $this->Motor_model->get_by_id($id);
        if ($row) {
            $data = array(
		'nopol' => $row->nopol,
		'tahun' => $row->tahun,
		'merek' => $row->merek,
		'created_at' => $row->created_at,
		'created_by' => $row->created_by,
		'updated_at' => $row->updated_at,
		'updated_by' => $row->updated_by,
	    );
            $this->load->view('motor/motor_read', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('motor'));
        }
    }

    public function create() 
    {
        $data = array(
            'button' => 'Create',
            'action' => site_url('motor/create_action'),
	    'nopol' => set_value('nopol'),
	    'tahun' => set_value('tahun'),
	    'merek' => set_value('merek'),
	    'created_at' => set_value('created_at'),
	    'created_by' => set_value('created_by'),
	    'updated_at' => set_value('updated_at'),
	    'updated_by' => set_value('updated_by'),
	);
        $this->load->view('motor/motor_form', $data);
    }
    
    public function create_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
		'tahun' => $this->input->post('tahun',TRUE),
		'merek' => $this->input->post('merek',TRUE),
		'created_at' => $this->input->post('created_at',TRUE),
		'created_by' => $this->input->post('created_by',TRUE),
		'updated_at' => $this->input->post('updated_at',TRUE),
		'updated_by' => $this->input->post('updated_by',TRUE),
	    );

            $this->Motor_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('motor'));
        }
    }
    
    public function update($id) 
    {
        $row = $this->Motor_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('motor/update_action'),
		'nopol' => set_value('nopol', $row->nopol),
		'tahun' => set_value('tahun', $row->tahun),
		'merek' => set_value('merek', $row->merek),
		'created_at' => set_value('created_at', $row->created_at),
		'created_by' => set_value('created_by', $row->created_by),
		'updated_at' => set_value('updated_at', $row->updated_at),
		'updated_by' => set_value('updated_by', $row->updated_by),
	    );
            $this->load->view('motor/motor_form', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('motor'));
        }
    }
    
    public function update_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('nopol', TRUE));
        } else {
            $data = array(
		'tahun' => $this->input->post('tahun',TRUE),
		'merek' => $this->input->post('merek',TRUE),
		'created_at' => $this->input->post('created_at',TRUE),
		'created_by' => $this->input->post('created_by',TRUE),
		'updated_at' => $this->input->post('updated_at',TRUE),
		'updated_by' => $this->input->post('updated_by',TRUE),
	    );

            $this->Motor_model->update($this->input->post('nopol', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('motor'));
        }
    }
    
    public function delete($id) 
    {
        $row = $this->Motor_model->get_by_id($id);

        if ($row) {
            $this->Motor_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('motor'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('motor'));
        }
    }

    public function _rules() 
    {
	$this->form_validation->set_rules('tahun', 'tahun', 'trim|required');
	$this->form_validation->set_rules('merek', 'merek', 'trim|required');
	$this->form_validation->set_rules('created_at', 'created at', 'trim|required');
	$this->form_validation->set_rules('created_by', 'created by', 'trim|required');
	$this->form_validation->set_rules('updated_at', 'updated at', 'trim|required');
	$this->form_validation->set_rules('updated_by', 'updated by', 'trim|required');

	$this->form_validation->set_rules('nopol', 'nopol', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

}

/* End of file Motor.php */
/* Location: ./application/controllers/Motor.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2018-05-16 17:18:04 */
/* http://harviacode.com */