<?php 

class Crud extends CI_Controller{

	function __construct(){
		parent::__construct();		
		$this->load->model('m_data');
                $this->load->helper('url');
	}

	function index(){
		$data['user'] = $this->m_data->tampil_data()->result();
		$this->load->view('v_tampil',$data);
	}

    function tambah(){
        $this->load->view('v_input');
    }

    function tambah_aksi(){
        $nama = $this->input->post('nama');
        $alamat = $this->input->post('alamat');
        $pekerjaan = $this->input->post('pekerjaan');

        $data = array(
            'nama' => $nama,
            'alamat' => $alamat,
            'pekerjaan' =>$pekerjaan
        );

        $this->m_data->input_data($data, 'user');
        redirect('crud/index');
    }

    function hapus($id){
        $where = array ('id' => $id);
        $this->m_data->hapus_data($where, 'user');
        redirect('crud/index');
    }

    function edit($id){
        $where = array('id' => $id);
        $data["user"] = $this->m_data->edit_data($where, 'user')->result();
        $this->load->view('v_edit', $data);
    }

    function update(){
        $id = $this->input->post('id');
        $nama = $this->input->post('nama');
        $alamat = $this->input->post('alamat');
        $pekerjaan = $this->input->post('pekerjaan');

        $data = array(
            'nama' => $nama,
            'alamat' => $alamat,
            'pekerjaan' => $pekerjaan
        );

        $where = array(
            'id' => $id
        );

        $this->m_data->update_data($where, $data, 'user');
        redirect('crud/index');
    }

    function page(){
        $this->load->database();
        $jumlah_data = $this->m_data->jumlah_data();
        $this->load->library('pagination');
        $config['base_url'] = base_url().'/crud/page';
        $config['total_rows'] = $jumlah_data;
        $config['per_page'] = 3;
        $from = $this->uri->segment(3);
        $this->pagination->initialize($config);
        $data['user'] = $this->m_data->data($config['per_page'], $from);
        $data['pagination'] = $this->pagination->create_links();
        $this->load->view('v_tampil', $data);
    }
}