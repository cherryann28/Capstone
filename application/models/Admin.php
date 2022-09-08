<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Model
{
    /*
		* DOCU: This function is to get all books from the database books table
		* Owned by Cherry Ann
	*/
    public function get_all_users_by_user_level()
	{
		return $this->db->query("SELECT CONCAT(first_name, ' ' , last_name) as name, school_id, email FROM users 
                                    WHERE user_level = 'student' ")->result_array();
	}

    /*
		* DOCU: This function is to get all books from the database books table
		* Owned by Cherry Ann
	*/
    public function get_all_books()
	{
		return $this->db->query("SELECT * FROM books")->result_array();
	}

    /*
		* DOCU: This function is to insert a new book into database books table.
		* Owned by Cherry Ann
	*/
    public function add_book($book)
    {
        $query = "INSERT INTO books (accesion, title, publisher, year, availability, created_at, updated_at)
                    VALUES (?,?,?,?,?,?,?)";
        $values = array($book['accesion'], $book['title'], $book['publisher'], $book['year'], $book['availability'],  
                        date("Y-m-d, H:i:s"), date("Y-m-d, H:i:s"));
        return $this->db->query($query, $values);
    }
	
	/*
		* DOCU: This function is to retrieves book filtered by id
		* Owned by Cherry Ann
	*/
	public function get_book_by_id($id)
	{
		return $this->db->query("SELECT * FROM books WHERE id = ?", array($id))->row_array();
	}

	/*
		* DOCU: This function is to update books from the database books table.
		* Owned by Cherry Ann
	*/
	public function update_book($book)
    {  
        $query = "UPDATE books SET accesion = ?, title = ?, publisher = ?, year = ?, availability = ?, updated_at = NOW()
                    WHERE id = ?";
        $values = array($book['accesion'], $book['title'], $book['publisher'], $book['year'], $book['availability'], $book['id']);
        return $this->db->query($query, $values);
        
    }	
	/*
		* DOCU: This function is to validate book.
		* Owned by Cherry Ann
	*/
	public function validate_book()
    {
        $this->load->library('form_validation');
        $this->form_validation->set_rules("accesion", "Accesion", "required");
        $this->form_validation->set_rules("title", "Title", "required");        
        $this->form_validation->set_rules("publisher", "Publisher", "required");        
        $this->form_validation->set_rules("year", "Year", "required"); 
		$this->form_validation->set_rules("availability", "Availability", "required"); 

        if(!$this->form_validation->run()){
            return validation_errors();
        }
    }

	public function search_book($book)
	{
		return $this->db->query("SELECT * FROM books WHERE accesion LIKE '%$book%' OR title LIKE '%$book%' OR publisher LIKE '%$book%' ")->result_array();
	}
	
	public function messenger($school_id)
	{
		$safe_school_id = $this->security->xss_clean($school_id);
		$query = "INSERT INTO messages (school_id, content, created_at, updated_at)
                    VALUES ( $safe_school_id, 'Your request for issue of book has been accepted', NOW(), NOW())";
					
        return $this->db->query($query);
	}

	public function validate_message()
	{
		$this->load->library('form_validation');
        $this->form_validation->set_rules("school_id", "Student ID", "required");
        $this->form_validation->set_rules("content", "Message", "required");         

        if(!$this->form_validation->run()){
            return validation_errors();
        }
	}


	public function availability($book_id)
	{
		$safe_book_id = $this->security->xss_clean($book_id);
		$query = "UPDATE books SET availability = availability - 1, updated_at = NOW()
					WHERE id = ?";
		
		return $this->db->query($query, $safe_book_id);
	}

	public function get_all_records()
	{
		$query = "SELECT books.id as book_id, records.id, users.school_id, books.accesion, books.title, books.availability,
						records.date_of_issue
					FROM records
					INNER JOIN users
						ON users.school_id = records.school_id
					INNER JOIN books
						ON books.id = records.book_id
					WHERE records.date_of_issue IS NULL";

		return $this->db->query($query)->result_array();
	}

	public function get_all_return()
	{
		$query = "SELECT returns.id, books.accesion, returns.book_id, returns.school_id, title, datediff(curdate(), due_date) as x 
			FROM returns
		LEFT JOIN books
			ON returns.book_id = books.id
		LEFT JOIN records
			ON records.book_id = books.id
		WHERE returns.book_id = books.id AND returns.book_id = records.book_id AND returns.school_id = records.school_id";

		return $this->db->query($query)->result_array();
		// $query = "SELECT  books.id as book_id, users.school_id, books.accesion, books.title, datediff(curdate(), due_date) as x, records.date_of_return
		// 			FROM records
		// 			LEFT JOIN users
		// 				ON users.school_id = records.school_id
		// 			LEFT JOIN books
		// 				ON books.id = records.book_id
		// 			LEFT JOIN returns
		// 				ON books.id = returns.book_id
		// 			WHERE returns.book_id = books.id AND returns.book_id = records.book_id AND returns.school_id = records.school_id";

		// return $this->db->query($query)->result_array();
	}

	public function accept_return_book($book_id)
	{
		$safe_book_id = $this->security->xss_clean($book_id);
		$query = "UPDATE records
					SET date_of_return = NOW(), updated_at = NOW(),
						dues =  datediff(curdate(), due_date)
					WHERE book_id = ? AND school_id = school_id" ;

		return $this->db->query($query, $safe_book_id); 
	}

	public function delete_return_book($return_id)
	{
		$safe_return_id = $this->security->xss_clean($return_id);
		$query = "DELETE FROM returns WHERE id = ? AND school_id = school_id";

		return $this->db->query($query, $safe_return_id);
	}

	public function get_all_renew()
	{
		$query = "SELECT renew.id, books.id, renew.school_id, books.title, books.accesion, records.renewals_left 
			FROM records 
		LEFT JOIN books
			ON records.book_id = books.id
		LEFT JOIN renew
			ON renew.book_id = books.id
		WHERE renew.book_id = books.id AND renew.school_id = records.school_id AND renew.book_id = records.book_id";

		return $this->db->query($query)->result_array();
	}

	public function accept_renew_book($book_id)
	{
		$safe_book_id = $this->security->xss_clean($book_id);
		$query = "UPDATE records
					SET due_date = DATE_ADD(due_date, INTERVAL 30 DAY), updated_at = NOW(),
						renewals_left = 0
					WHERE book_id = ? AND school_id = school_id" ;

		return $this->db->query($query, $safe_book_id); 
	}

	public function delete_renew_book($renew_id)
	{
		$safe_renew_id = $this->security->xss_clean($renew_id);
		$query = "DELETE FROM renew WHERE book_id = ? AND school_id = school_id";

		return $this->db->query($query, $safe_renew_id);
	}

	public function renew_message($school_id)
	{
		$safe_school_id = $this->security->xss_clean($school_id);
		$query = "INSERT INTO messages (school_id, content, created_at, updated_at)
                    VALUES ( $safe_school_id, 'Your request for renewal of book has been accepted', NOW(), NOW())";
					
        return $this->db->query($query);
	}
	

	public function return_availability($book_id)
	{
		$safe_return_id = $this->security->xss_clean($book_id);
		$query = "UPDATE books SET availability = availability + 1, updated_at = NOW()
					WHERE id = ?";
		
		return $this->db->query($query, $safe_return_id);
	}


	public function accept_book($record_id)
	{
		$safe_record_id = $this->security->xss_clean($record_id);
		$query = "UPDATE records
					SET date_of_issue = NOW(), updated_at = NOW(),
						due_date = DATE_ADD(NOW(), INTERVAL 30 DAY), renewals_left = 1
					WHERE id = ?";

		return $this->db->query($query, $safe_record_id); 
	} 
	
	public function delete_records($record_id)
	{
		$safe_record_id = $this->security->xss_clean($record_id);
		$query = "DELETE FROM records WHERE id = ?";

		return $this->db->query($query, $safe_record_id);
	}

}

?>