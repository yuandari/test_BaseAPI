<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Pegawai extends CI_Controller
{
	public function index()
	{
		$data['title'] = "Data Pegawai";
		$data['pegawai'] = $this->Pegawai_model->get_data();
		$this->load->view('template/header', $data);
		$this->load->view('Pegawai', $data);
		$this->load->view('template/footer', $data);
	}
	public function tambahPegawai()
	{
		$data['title'] = "Tambah Data Pegawai";
		$this->load->view('template/header', $data);
		$this->load->view('TambahPegawai', $data);
		$this->load->view('template/footer', $data);
	}

	public function aksi_tambahpg()
	{
		$this->form_validation->set_rules('nama', 'Nama', 'required|trim', [
			'required' => 'Bagian Nama Pegawai wajib di isi.'
		]);
		$this->form_validation->set_rules('nip', 'NIP', 'required|trim|is_unique[pegawai.nip]', [
			'required' => 'Bagian NIP wajib di isi',
			'is_unique' => 'NIP sudah terdaftar!'
		]);
		$this->form_validation->set_rules('title', 'Jabatan', 'required|trim', [
			'required' => 'Bagian Jabatan wajib di isi.'
		]);

		if ($this->form_validation->run() == FALSE) {
			$this->tambahPegawai();
		} else {
			$nip            = $this->input->post('nip');
			$nama   		= $this->input->post('nama');
			$title        	= $this->input->post('title');

			$data = array(
				'nip'           => $nip,
				'nama'  		=> $nama,
				'title'       	=> $title
			);

			$this->Pegawai_model->insert($data);
			$this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible fade show" role="alert">
			Data Pegawai berhasil ditambah !
			<button type="button" class="close" data-dismiss="alert" aria-label="Close">
			  <span aria-hidden="true">&times;</span>
			</button>
		  </div>');
			// Setelah berhasil kembali ke Data Pegawai
			redirect('Pegawai');
		}
	}

	public function updatePegawai($id)
	{
		$where = array('id_pegawai' => $id);
		$data['pegawaii'] = $this->db->query("SELECT * FROM pegawai WHERE id_pegawai='$id'")->result();
		$data['title'] = "Edit Data Pegawai";
		$this->load->view('template/header', $data);
		$this->load->view('EditPegawai', $data);
		$this->load->view('template/footer', $data);
	}

	public function aksi_editpg()
	{
		//tampilan rules
		$this->form_validation->set_rules('nip', 'NIP', 'required|trim', [
			'required' => 'Bagian Aktivasi wajib di pilih.'
		]);

		if ($this->form_validation->run() == FALSE) {
			$this->updatePegawai();
		} else {
			$id         = $this->input->post('id_pegawai');
			$nama       = $this->input->post('nama');
			$nip        = $this->input->post('nip');
			$title    = $this->input->post('title');

			$data = array(
				'nama' => $nama,
				'nip' => $nip,
				'title' => $title
			);

			$where = array(
				'id_pegawai' => $id
			);

			$this->Pegawai_model->update($data, $where);
			$this->session->set_flashdata('message', '<div class="alert alert-warning alert-dismissible fade show" role="alert">
			Data Pegawai berhasil diubah !
			<button type="button" class="close" data-dismiss="alert" aria-label="Close">
			  <span aria-hidden="true">&times;</span>
			</button>
		  </div>');
			// Setelah berhasil kembali ke Data Pegawai
			redirect('Pegawai');
		}
	}

	public function deletePegawai($id)
	{
		$where = array('id_pegawai' => $id);
		$this->Pegawai_model->delete($where);
		$this->session->set_flashdata('message', '<div class="alert alert-danger alert-dismissible fade show" role="alert">
			Data Pegawai berhasil dihapus !
			<button type="button" class="close" data-dismiss="alert" aria-label="Close">
			  <span aria-hidden="true">&times;</span>
			</button>
		  	</div>');
		// Setelah berhasil kembali ke dataUser
		redirect('Pegawai');
	}
}
