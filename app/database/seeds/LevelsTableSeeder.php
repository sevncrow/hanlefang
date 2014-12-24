<?php

	
class LevelsTableSeeder extends Seeder {

	public function run()
	{
		Level::create([
			'id'=>1,
			'key'=>'新闻',
			'comment'=>'新闻'
		]);
		Level::create([
			'id'=>2,
			'key'=>'活动',
			'comment'=>'活动'
		]);
		Level::create([
			'id'=>3,
			'key'=>'公告',
			'comment'=>'公告'
		]);
		Level::create([
			'id'=>4,
			'key'=>'问答',
			'comment'=>'问答'
		]);
		Level::create([
			'id'=>5,
			'key'=>'景点',
			'comment'=>'景点'
		]);
		Level::create([
			'id'=>6,
			'key'=>'体验场所',
			'comment'=>'体验场所'
		]);
		Level::create([
			'id'=>7,
			'key'=>'购物',
			'comment'=>'购物'
		]);
	}

}