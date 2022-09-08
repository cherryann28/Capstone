<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Student extends CI_Model
{
    /*
		* DOCU: This function is to get all the books info from the database books table.
		* Owned by Cherry Ann
	*/
    public function get_all_books()
	{
		return $this->db->query("SELECT * FROM books")->result_array();
	}

    public function search_book($book)
	{
		return $this->db->query("SELECT * FROM books WHERE accesion LIKE '%$book%' OR title LIKE '%$book%' OR publisher LIKE '%$book%' ")->result_array();
	}

    /*
		* DOCU: This function insert data into database records
		* Owned by Cherry Ann
	*/
    public function borrow_book($book_id)
    {
        $query = "INSERT INTO records (school_id, book_id, created_at, updated_at)
                    VALUES (?, ?, NOW(), NOW())";

        $values = array(
            $this->session->userdata('school_id'),
            $this->security->xss_clean($book_id)
        );

        return $this->db->query($query, $values);
    }
    
    /*
		* DOCU: This function is to select all the info of currently borrowed books from the database records table.
		* Owned by Cherry Ann
	*/
    public function currently_borrowed_books()
    {
        $id = $this->session->userdata('school_id');
        $query = "SELECT books.id as book_id, books.accesion, books.title, records.date_of_issue, records.due_date, records.renewals_left
                    FROM records
                    INNER JOIN users
						ON users.school_id = records.school_id
					INNER JOIN books
						ON books.id = records.book_id
                    WHERE users.school_id = $id AND records.date_of_return IS NULL AND date_of_issue IS NOT NULL";

        return $this->db->query($query, $id)->result_array();
    }

    /*
		* DOCU: This function is to select all the info of previously borrowed books from the database records table.
		* Owned by Cherry Ann
	*/
    public function previously_borrowed_books()
    {
        $id = $this->session->userdata('school_id');
        $query = "SELECT books.accesion, books.title, records.date_of_issue, records.date_of_return
                    FROM records
                    INNER JOIN users
						ON users.school_id = records.school_id
					INNER JOIN books
						ON books.id = records.book_id
                    WHERE users.school_id = ? AND date_of_issue IS NOT NULL AND date_of_return IS NOT NULL AND books.id = records.book_id";

        return $this->db->query($query, $id)->result_array();
    }
    
    /*
		* DOCU: This function is to insert the data into renew table from the database.
		* Owned by Cherry Ann
	*/
    public function renew_book($book_id)
    {
        $query = "INSERT INTO renew (school_id, book_id, created_at, updated_at)
                    VALUES (?, ?, NOW(), NOW())";

        $values = array(
            $this->session->userdata('school_id'),
            $this->security->xss_clean($book_id)
        );

        return $this->db->query($query, $values);
    }

    /*
		* DOCU: This function is to insert the data into return table from the database.
		* Owned by Cherry Ann
	*/
    public function  return_book($book_id)
    {
        $query = "INSERT INTO returns (school_id, book_id, created_at, updated_at)
                    VALUES (?, ?, NOW(), NOW())";

        $values = array(
            $this->session->userdata('school_id'),
            $this->security->xss_clean($book_id)
        );

        return $this->db->query($query, $values);
    }

    /*
		* DOCU: This function is to select all the info from the database messages table.
		* Owned by Cherry Ann
	*/
    public function message()
    {
        $school_id = $this->session->userdata('school_id');
        return $this->db->query("SELECT * FROM messages 
                                    WHERE school_id = $school_id ORDER BY created_at DESC")->result_array();
    }
   
}

?>