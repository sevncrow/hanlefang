<?php

Event::listen('post.create',function()
{
	Log::info('Add a post');
});
Event::listen('post.update',function()
{
	Log::info('Update a post');
});
Event::listen('post.remove',function()
{
	Log::info('Remove a post');
});

