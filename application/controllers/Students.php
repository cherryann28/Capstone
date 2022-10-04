<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Students extends CI_Controller {

	public function __construct()
	{
	  parent::__construct();
	  $this->load->model('Student');
	}

    	public function index()
    	{
		$data['books'] = $this->Student->get_all_books();
		// $data['use'] = $this->Student->get_all_users_by_faculty();
		$data['count'] = $this->Student->count_book_by_1();
		$data['total_borrowed'] = $this->Student->count_borrow_books();
        	$this->load->view('students/books', $data);
    	}

	public function more_than_5()
	{
		$this->session->set_flashdata('sent', 'This request not sent to admin!');
		redirect('students/request_sent');
	}

	public function search()
	{	
		$book = $this->input->post('search');
		if(empty($this->Student->search_book($book)))
		{
			$errors[] = "No Result!";
			$this->session->set_flashdata('errors', $errors);
			redirect('students/no_result');
		}
		else
		{
			$data['books'] = $this->Student->search_book($book);
			$data['total_borrowed'] = $this->Student->count_borrow_books();
			$this->load->view('students/books', $data);		
		}
	}

	public function no_result()
	{
		$this->load->view('students/no_result');
	}

	public function messages()
	{	
		$data['messages'] = $this->Student->message();
		$this->load->view('students/messages', $data);
	}

	public function process_borrow_book($book_id)
	{
		$this->Student->borrow_book($book_id);
		$this->session->set_flashdata('sent', 'This request sent to admin!');
		redirect('students/request_sent');
		
	}

	public function borrowed_books()
	{	
		$data['borrows'] = $this->Student->currently_borrowed_books();
		$this->load->view('students/borrowed_books', $data);
	}

	public function process_previously_borrowed_books()
	{
		$data['previously_borrowed'] = $this->Student->previously_borrowed_books();
		$this->load->view('students/previously_borrowed', $data);
	}
	
	public function request_sent()
	{
		$data['books'] = $this->Student->get_all_books();
		$this->load->view('students/request_sent', $data);
	}

	public function process_return_book($book_id)
	{
		$this->Student->return_book($book_id);
		$this->session->set_flashdata('sent', 'This request sent to admin!');
		redirect('students/sent_return_book');
	}

	public function sent_return_book()
	{
		$data['borrows'] = $this->Student->currently_borrowed_books();
		$this->load->view('students/sent_return_book', $data);
	}

	public function process_renew_book($book_id)
	{
		$this->Student->renew_book($book_id);
		$this->session->set_flashdata('sent', 'This request sent to admin!');
		redirect('students/sent_renew_book');
	}

	public function sent_renew_book()
	{
		$data['borrows'] = $this->Student->currently_borrowed_books();
		$this->load->view('students/sent_renew_book', $data);
	}

}



