<?php

use Fuel\Core\Controller_Template;

class Controller_Posts extends Controller_Template
{
	public function action_index()
	{
        $posts = Model_Post::find('all');
        // die('Post Index');
        $data = array('posts' => $posts);
        $this->template->title = 'Blog Post';
        $this->template->content = View::forge('posts/index', $data, false);
    }

    public function action_add()
    {
        // die('Post add');

        if (Input::post('send')) {
            $post = new Model_Post();
            $post->title = Input::post('title');
            $post->category = Input::post('category');
            $post->body = Input::post('body');
            $post->tags = Input::post('tags');
            $post->create_date = date('Y-m-d H:i:s');
            
            $post->save();

            Session::set_flash('success', 'Post added');
            Response::redirect('/');
        }
        $data = array();
        $this->template->title = 'Add Post';
        $this->template->content = View::forge('posts/add', $data);
    }

    public function action_view($id)
    {
        $post = Model_Post::find('first', array(
            'where' => array(
                'id' => $id,
            )
        ));
        $data = array('post' => $post);
        $this->template->title = $post->title;
        $this->template->content = View::forge('posts/view', $data);
    }

    public function action_edit($id)
    {
        if (Input::post('send')) {
            $post = Model_Post::find(Input::post('post_id'));
            $post->title = Input::post('title');
            $post->category = Input::post('category');
            $post->body = Input::post('body');
            $post->tags = Input::post('tags');
            $post->create_date = date('Y-m-d H:i:s');
            
            $post->save();

            Session::set_flash('success', 'Post updated');
            Response::redirect('/');
        }

        $post = Model_Post::find('first', array(
            'where' => array(
                'id' => $id,
            )
        ));
        $data = array('post' => $post);
        $this->template->title = $post->title . ' edit';
        $this->template->content = View::forge('posts/edit', $data);
    }

    public function action_delete($id)
    {
        $post = Model_Post::find($id);
        $post->delete();

        Session::set_flash('success', 'Post deleted');
        Response::redirect('/');
    }
}