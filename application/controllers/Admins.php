<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admins extends CI_Controller {

	public function __construct()
	{
	  parent::__construct();
	  $this->load->model('Admin');
	  if($this->session->userdata('user_level') != 'admin')
	  {
		redirect('students');
	  }
	}

	public function index()
    {
        $data['books'] = $this->Admin->get_all_books();
		$this->load->view('admin/book_lists', $data);
    }

	public function book_list()
	{
		$data['books'] = $this->Admin->get_all_books();
		$this->load->view('admin/book_lists', $data);
	}

	public function add_book()
	{
		$this->load->view('admin/add_books');
	}

	public function search()
	{	
		$book = $this->input->post('search');
		if(empty($this->Admin->search_book($book)))
		{
			$errors[] = "No Result!";
			$this->session->set_flashdata('errors', $errors);
			redirect('admins/no_result');
		}
		else
		{
			$data['books'] = $this->Admin->search_book($book);
			$this->load->view('admin/book_lists', $data);		
		}
	}

	public function no_result()
	{
		$this->load->view('admin/no_result');
	}


	public function process_add_book()
	{
		$add_book = $this->Admin->validate_book($this->input->post());
		
		if($add_book != null)
		{
			$errors = array(validation_errors());	
			$this->session->set_flashdata("errors", $errors);
			redirect('add_book');
		}
		else
		{
			$this->Admin->add_book($this->input->post());
			$success[] = "Successfully added new book!";
			$this->session->set_flashdata('success', $success);
			redirect('book_list');
		}
	}

	public function issue_request()
	{
		$data['records'] = $this->Admin->get_all_records();
		// $data['returns'] = $this->Admin->get_all_return();
		$this->load->view('admin/issue_request', $data);
	}


	public function messenger()
	{
		$this->load->view('admin/admin_messenger');
	}
	
	public function process_message()
	{
		$message = $this->Admin->validate_message($this->input->post());
		
		if($message != null)
		{
			$errors = array(validation_errors());	
			$this->session->set_flashdata("errors", $errors);
			redirect('admins/messenger');
		}
		else
		{
			$this->Admin->messenger($this->input->post());
			$success[] = "Message Sent!";
			$this->session->set_flashdata('success', $success);
			redirect('admins/messenger');
		}
	}

	public function student_list()
	{
		$data['students'] = $this->Admin->get_all_users_by_user_level();
		$this->load->view('admin/student_list', $data);
	}

	/*
		* DOCU: This function is to display a form that allows an admin to update a book's details.
		* Owned by Cherry Ann Nepomuceno 
	*/
	public function edit($id)
	{
		$data['book'] = $this->Admin->get_book_by_id($id);
		$this->load->view('admin/update', $data);
	}

	/*
		* DOCU: This function is to process the form submitted from the edit to update that particular book's 
				details. If input fields are left blank it will promt an error else will successfully updated
		* Owned by Cherry Ann Nepomuceno 
	*/
	public function process_update($id)
	{
		
		$update_book = $this->Admin->validate_book($this->input->post());
		
		if($update_book != null)
		{
			$errors = array(validation_errors());	
			$this->session->set_flashdata("errors", $errors);
			redirect('admins/edit/' .$id);
		}
		else
		{
			$this->Admin->update_book($this->input->post());
			$success[] = "Updated successfully!";
			$this->session->set_flashdata('success', $success);
			redirect('book_list');
		}
	}

	public function process_accept($record_id, $book_id, $student_id)
	{
		$this->Admin->accept_book($record_id);
		$this->Admin->availability($book_id);
		$this->Admin->messenger($student_id);
		redirect('admins/accept_request');
		
	}

	public function accept_request()
	{
		$this->session->set_flashdata('accept', 'Accepted');	
		$data['records'] = $this->Admin->get_all_records();
		$this->load->view('admin/accept_request', $data);
	}

	public function renew_request()
	{
		$data['renews'] = $this->Admin->get_all_renew();
		$this->load->view('admin/renew_request', $data);
	}
	public function accept_renewal()
	{
		$data['renews'] = $this->Admin->get_all_renew();
		$this->load->view('admin/accept_renewal', $data);
	}

	public function process_renewal($book_id, $delete_renew, $message_id)
	{
		$this->Admin->accept_renew_book($book_id);
		$this->session->set_flashdata('renew', 'Renew Success');
		$this->Admin->delete_renew_book($delete_renew);
		$this->Admin->renew_message($message_id);
		
		redirect('admins/accept_renewal');	
	}

	public function process_return($book_id, $delete_return, $add_return)
	{
		$this->Admin->accept_return_book($book_id);
		$this->session->set_flashdata('sent', 'Return Success');
		$this->Admin->delete_return_book($delete_return);
		$this->Admin->return_availability($add_return);
		
		redirect('admins/accept_return');	
		
	}

	public function accept_return()
	{
		$data['returns'] = $this->Admin->get_all_return();
		$this->load->view('admin/accept_return', $data);
	}

	public function return_request()
	{
		$data['returns'] = $this->Admin->get_all_return();
		$this->load->view('admin/return_request', $data);
	}
	
	public function decline()
	{
		$data['records'] = $this->Admin->get_all_records();
		$this->load->view('admin/decline', $data);
	}
	

	public function decline_records($record_id)
	{
		$this->Admin->delete_records($record_id);
		$this->session->set_flashdata('success', 'Delete Success');
		redirect('admins/decline');
	}
	

}