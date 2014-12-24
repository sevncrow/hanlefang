<?php

App::bind('post',function()
{
	$post = new Post;
	$post->rules = Post::$rules;
	return $post;
});