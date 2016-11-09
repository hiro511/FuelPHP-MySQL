<?php
class Controller_Article extends Controller_Rest
{
    // public function get_list()
    // {
    //   return $this->response(array(
    //       'foo' => Input::get('foo'),
    //       'baz' => array(
    //           1, 50, 219
    //       ),
    //       'empty' => null
    //   ));
    // }

    public function get_article()
    {
      $article = new Model_Article();
      $article->title = Input::get('title');
      $article->body = Input::get('body');
      $article->user_id = Input::get('user_id');
      $article->save();

      return $this->response(array(true));
    }

    public function get_list()
    {
      $articles = Model_Article::find('all');

      $articles_ary = array();
      foreach ($articles as $article) {
        array_push($articles_ary, $article->to_array());
      }

      return $this->response($articles_ary);
    }

    public function get_update()
    {
      
    }


}
