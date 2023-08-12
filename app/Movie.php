<?php

namespace App;

use Nicolaslopezj\Searchable\SearchableTrait;
use Illuminate\Database\Eloquent\Model;

class Movie extends Model
{
	use SearchableTrait;
	protected $table = 'movies';
	protected $fillable = ['name', 'category_id', 'director', 'genre', 'synopsis', 'price', 'main_image', '_image1', '_image2', '_image3', 'quantity'];

	protected $hidden = [];
	protected $searchable = [
		'columns' => [
			'name' => 10,
			'director' => 10,
			'genre' => 10,
		],
	];

	public function category() {
		return $this->belongsTo('App\Category');
	}

	public function cartItems()
	{
		return $this->hasMany('App\CartItem');
	}

}
