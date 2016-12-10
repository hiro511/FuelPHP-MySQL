<?php
class Controller_Book extends Controller_Rest
{
	// validate integer
    public function get_intTest()
    {
	    $input = "0";
	    $result = intval($input);
	    if ($result === 0 && $input !== '0') {
		    var_dump(false);
	    }else{
		    var_dump(true);
		}
    }
    
    // validate string
    public function get_strTest()
    {
	    $input = "hoge";
	    if (!is_string($input) && strlen($input) < 100) {
		    var_dump(false);
	    }
	    var_dump(mb_strlen($input));
    }
    
    // encode object to json format and echo it
    private function echo_json($object) {
	    $this->response->set_header('Content-Type', 'application/json');
	    $this->response->set_status(201);
	  	echo json_encode($object, JSON_UNESCAPED_UNICODE);
    }
    
    public function get_list()
    {
	    $books = Model_Book::find('all');
	    
	    $books_ary = array();
		foreach ($books as $book) {
        	array_push($books_ary, $book->to_array());
      	}

		$this->echo_json($books_ary);
	  	return;
    }
    
    private function error($reason)
    {
	    return $this->response(array(
		   'status' => false,
		   'reason' => $reason
	    ));
    }
    
    public function get_hoge()
    {
	    return $this->error();
    }
    
    private function validateAddQuery() {
	    $title = Input::get('title');
	    if (!is_string($title) || strlen($title) > 50) {
		    return $this->error("too long title");
	    }
	    $author = Input::get('author');
	    if (!is_string($author) || strlen($author) > 50) {
		    return $this->error("invalid author");
	    }
	    $year = intval(Input::get('year'));
	    if ($year === 0) {
		    return $this->response(array(
			   'status' => true 
		    ));
	    }
    }
    
    public function get_add()
    {
	    $title = Input::get('title');
	    if (!is_string($title) || strlen($title) > 50) {
		    return $this->error("too long title");
	    }
	    $author = Input::get('author');
	    if (!is_string($author) || strlen($author) > 50) {
		    return $this->error("invalid author");
	    }
	    $year = intval(Input::get('year'));
	    if ($year === 0) {
		    return $this->error("invalid year");
	    }
	    	    
	    $book = new Model_Book();
	    $book->title = $title;
	    $book->author = $author;
	    $book->year = $year;
	    $book->save();
	    
	    return $this->response(array(
		    'status' => true
	    ));
    }
    
    public function get_remove()
    {
	    // Convert into integer
	    $id = intval(Input::get('id'));
	    if ($id === 0) {
		    return $this->response(array(
			   'status' => false 
		    ), 303);
	    }
	    
	    // Find a book from an ID
	    $book = Model_Book::find(100);
	    if (is_null($book)) {
		    return $this->response(array(
			   'status' => false 
		    ), 303);
	    }
	    
	    // Delete the book
	    $book->delete();
		
		return $this->response(array(
			'status' => true
		));
    }
    
    public function get_update()
    {
	    $id = intval(Input::get('id'));
	    $title = Input::get('title');
	    
	    $books = Model_Book::find('all', array(
		    'where' => array(
			    array('title', 'aa'),
		    ),
		    'order_by' => array('created_at' => 'desc'),
	    ));
	    
	    $books_ary = array();
	    foreach ($books as $book) {
        	array_push($books_ary, $book->to_array());
      	}
		
		$this->echo_json($books_ary);
	    return;
    }
}