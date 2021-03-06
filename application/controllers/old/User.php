<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('m_user');
	}
	
	public function index()
	{
		$this->load->view('user/form_user');
	}

	public function simpan()
	{
		if ($_POST) {
			//proses
			$data = array(
				'username' => $this->input->post('username'),
				'nama' => $this->input->post('nama'),
				'email' => $this->input->post('email'),
				'password' => $this->input->post('password')
				);
			$eksekusi = $this->m_user->create_data($data);
			if ($eksekusi == TRUE) {
				echo '<script>alert("Simpan data berhasil"); window.location="lists"</script>';
			} else {
				echo '<script>alert("Simpan data gagal"); window.location="lists"</script>';
			}
		}
	}

	public function lists()
	{
		$dt['user'] = $this->m_user->read_data();
		$this->load->view('user/list_user',$dt);
	}

	public function edit($id = '')
	{
		//$id = $this->uri->segment(3);
		$dt['user'] = $this->m_user->get_data($id);
		$this->load->view('user/edit_user', $dt);
	}

	public function update()
	{
		if ($_POST) {
			//proses
			$data = array(
				'nama' => $this->input->post('nama'),
				'email' => $this->input->post('email'),
				'password' => $this->input->post('password')
				);
			$eksekusi = $this->m_user->update_data($data, $this->input->post('username'));
			if ($eksekusi == TRUE) {
				echo '<script>alert("Update data berhasil"); window.location="lists"</script>';
			} else {
				echo '<script>alert("Update data gagal"); window.location="lists"</script>';
			}
		}
	}

	public function delete($id = '')
	{
		//$id = $this->uri->segment(3);
		$eksekusi = $this->m_user->delete_data($id);
		if ($eksekusi == TRUE) {
			echo '<script>alert("Delete data berhasil"); window.location="'.base_url('user/lists').'"</script>';
		} else {
			echo '<script>alert("Delete data gagal"); window.location="'.base_url('user/lists').'"</script>';
		}
	}
}
