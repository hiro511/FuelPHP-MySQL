<?php
class Controller_Api extends Controller_Rest
{
    public function get_list()
    {
      return $this->response(array(
          'foo' => Input::get('foo'),
          'baz' => array(
              1, 50, 219
          ),
          'empty' => null
      ));
    }
    
    public function get_test()
    {
	    return $this->response(array(
	    	true
	    ));
    }
}
