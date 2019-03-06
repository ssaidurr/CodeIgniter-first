<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin_model extends CI_Model {

	public function admin_model_info($email_address,$password)
	{
		$this->db->select('*');
		$this->db->from('tbl_admin');
		$this->db->where('email_address',$email_address);
		$this->db->where('password',md5($password));
		$query_result = $this->db->get();
		$result       = $query_result->row();
		return $result;
	}

	public function save_student_info()
	{
		$data = array();
		$data['student_name']  = $this->input->post('student_name',true);
		$data['student_phone'] = $this->input->post('student_phone',true);
		$data['student_roll']  = $this->input->post('student_roll',true);
		$this->db->insert('student',$data);
	}

	public function all_student_info()
	{
		$this->db->select('*');
		$this->db->from('student');
		$query_result = $this->db->get();
		$student_info = $query_result->result();
		return $student_info;
	}

	public function all_admin_info()
	{
		$this->db->select('*');
		$this->db->from('tbl_admin');
		$query_result = $this->db->get();
		$admin_info = $query_result->result();
		return $admin_info;
	}

	public function all_student_info_by_id($student_id)
	{
		$this->db->select('*');
		$this->db->from('student');
		$this->db->where('student_id',$student_id);
		$query_result = $this->db->get();
		$result = $query_result->row();
		return $result;
	}

	public function update_student_info()
	{
		$data = array();
		$student_id = $this->input->post('student_id',true);
		$data['student_name'] = $this->input->post('student_name',true);
		$data['student_roll'] = $this->input->post('student_roll',true);
		$data['student_phone'] = $this->input->post('student_phone',true);
		$this->db->where('student_id',$student_id);
		$this->db->update('student',$data);
	}

	public function delete_student_by_id($student_id)
	{
		$this->db->where('student_id',$student_id);
		$this->db->delete('student');
	}

	public function save_admin_info()
	{
		$data = array();
		$data['email_address'] = $this->input->post('email_address',true);
		$data['password'] = $this->input->post('password',true);

		$sdata = array();
		$error="";
		$config['upload_path'] 		= 'image/';
		$config['allowed_types'] 	= 'gif|jpg|png';
		$config['max_size'] 		= 100000;
		$config['max_width'] 		= 2048;
		$config['max_height'] 		= 1024;
		$this->load->library('upload',$config);

		if (!$this->upload->do_upload('admin_image')) {
			$error = $this->upload->display_errors();
		} else {
			$sdata = $this->upload->data();
			$data['admin_image'] = $config['upload_path'].$sdata['file_name'];
		}

		$this->db->insert('tbl_admin',$data);
	}
}
