<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Nasabah extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Nasabah_model');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $q = urldecode($this->input->get('q', TRUE));
        $start = intval($this->input->get('start'));
        
        if ($q <> '') {
            $config['base_url'] = base_url() . 'nasabah/index.html?q=' . urlencode($q);
            $config['first_url'] = base_url() . 'nasabah/index.html?q=' . urlencode($q);
        } else {
            $config['base_url'] = base_url() . 'nasabah/index.html';
            $config['first_url'] = base_url() . 'nasabah/index.html';
        }

        $config['per_page'] = 10;
        $config['page_query_string'] = TRUE;
        $config['total_rows'] = $this->Nasabah_model->total_rows($q);
        $nasabah = $this->Nasabah_model->get_limit_data($config['per_page'], $start, $q);

        $this->load->library('pagination');
        $this->pagination->initialize($config);

        $data = array(
            'nasabah_data' => $nasabah,
            'q' => $q,
            'pagination' => $this->pagination->create_links(),
            'total_rows' => $config['total_rows'],
            'start' => $start,
        );
        $this->load->view('nasabah/nasabah_list', $data);
    }

    public function read($id) 
    {
        $row = $this->Nasabah_model->get_by_id($id);
        if ($row) {
            $data = array(
		'id' => $row->id,
		'sales_id' => $row->sales_id,
		'nasabah' => $row->nasabah,
		'jeniskelamin' => $row->jeniskelamin,
		'alamat' => $row->alamat,
		'notlpn' => $row->notlpn,
		'tgllahir' => $row->tgllahir,
		'created_at' => $row->created_at,
		'created_by' => $row->created_by,
		'updated_at' => $row->updated_at,
		'updated_by' => $row->updated_by,
	    );
            $this->load->view('nasabah/nasabah_read', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('nasabah'));
        }
    }

    public function create() 
    {
        $data = array(
            'button' => 'Create',
            'action' => site_url('nasabah/create_action'),
	    'id' => set_value('id'),
	    'sales_id' => set_value('sales_id'),
	    'nasabah' => set_value('nasabah'),
	    'jeniskelamin' => set_value('jeniskelamin'),
	    'alamat' => set_value('alamat'),
	    'notlpn' => set_value('notlpn'),
	    'tgllahir' => set_value('tgllahir'),
	    'created_at' => set_value('created_at'),
	    'created_by' => set_value('created_by'),
	    'updated_at' => set_value('updated_at'),
	    'updated_by' => set_value('updated_by'),
	);
        $this->load->view('nasabah/nasabah_form', $data);
    }
    
    public function create_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
		'sales_id' => $this->input->post('sales_id',TRUE),
		'nasabah' => $this->input->post('nasabah',TRUE),
		'jeniskelamin' => $this->input->post('jeniskelamin',TRUE),
		'alamat' => $this->input->post('alamat',TRUE),
		'notlpn' => $this->input->post('notlpn',TRUE),
		'tgllahir' => $this->input->post('tgllahir',TRUE),
		'created_at' => $this->input->post('created_at',TRUE),
		'created_by' => $this->input->post('created_by',TRUE),
		'updated_at' => $this->input->post('updated_at',TRUE),
		'updated_by' => $this->input->post('updated_by',TRUE),
	    );

            $this->Nasabah_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('nasabah'));
        }
    }
    
    public function update($id) 
    {
        $row = $this->Nasabah_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('nasabah/update_action'),
		'id' => set_value('id', $row->id),
		'sales_id' => set_value('sales_id', $row->sales_id),
		'nasabah' => set_value('nasabah', $row->nasabah),
		'jeniskelamin' => set_value('jeniskelamin', $row->jeniskelamin),
		'alamat' => set_value('alamat', $row->alamat),
		'notlpn' => set_value('notlpn', $row->notlpn),
		'tgllahir' => set_value('tgllahir', $row->tgllahir),
		'created_at' => set_value('created_at', $row->created_at),
		'created_by' => set_value('created_by', $row->created_by),
		'updated_at' => set_value('updated_at', $row->updated_at),
		'updated_by' => set_value('updated_by', $row->updated_by),
	    );
            $this->load->view('nasabah/nasabah_form', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('nasabah'));
        }
    }
    
    public function update_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('id', TRUE));
        } else {
            $data = array(
		'sales_id' => $this->input->post('sales_id',TRUE),
		'nasabah' => $this->input->post('nasabah',TRUE),
		'jeniskelamin' => $this->input->post('jeniskelamin',TRUE),
		'alamat' => $this->input->post('alamat',TRUE),
		'notlpn' => $this->input->post('notlpn',TRUE),
		'tgllahir' => $this->input->post('tgllahir',TRUE),
		'created_at' => $this->input->post('created_at',TRUE),
		'created_by' => $this->input->post('created_by',TRUE),
		'updated_at' => $this->input->post('updated_at',TRUE),
		'updated_by' => $this->input->post('updated_by',TRUE),
	    );

            $this->Nasabah_model->update($this->input->post('id', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('nasabah'));
        }
    }
    
    public function delete($id) 
    {
        $row = $this->Nasabah_model->get_by_id($id);

        if ($row) {
            $this->Nasabah_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('nasabah'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('nasabah'));
        }
    }

    public function _rules() 
    {
	$this->form_validation->set_rules('sales_id', 'sales id', 'trim|required');
	$this->form_validation->set_rules('nasabah', 'nasabah', 'trim|required');
	$this->form_validation->set_rules('jeniskelamin', 'jeniskelamin', 'trim|required');
	$this->form_validation->set_rules('alamat', 'alamat', 'trim|required');
	$this->form_validation->set_rules('notlpn', 'notlpn', 'trim|required');
	$this->form_validation->set_rules('tgllahir', 'tgllahir', 'trim|required');
	$this->form_validation->set_rules('created_at', 'created at', 'trim|required');
	$this->form_validation->set_rules('created_by', 'created by', 'trim|required');
	$this->form_validation->set_rules('updated_at', 'updated at', 'trim|required');
	$this->form_validation->set_rules('updated_by', 'updated by', 'trim|required');

	$this->form_validation->set_rules('id', 'id', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

}

/* End of file Nasabah.php */
/* Location: ./application/controllers/Nasabah.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2018-05-16 17:18:04 */
/* http://harviacode.com */