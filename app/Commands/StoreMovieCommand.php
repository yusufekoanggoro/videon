<?php

namespace App\Commands;

use App\Commands\Command;
use Illuminate\Contracts\Bus\SelfHandling;
use App\Movie;

class StoreMovieCommand extends Command implements SelfHandling {
	public $name;
	public $category_id;
	public $director;
	public $genre;
	public $synopsis;
	public $price;
	public $main_image;
	public $image1;
	public $image2;
	public $image3;
	public $quantity;

	public function __construct($name, $category_id, $director, $genre, $synopsis, $price, $main_image, $image1, $image2, $image3, $quantity) {
		$this->name = $name;
		$this->category_id = $category_id;
		$this->director = $director;
		$this->genre = $genre;
		$this->synopsis = $synopsis;
		$this->price = $price;
		$this->main_image = $main_image;
		$this->image1 = $image1;
		$this->image2 = $image2;
		$this->image3 = $image3;
		$this->quantity = $quantity;
	}

	public function handle() {
		return Movie::create([
				'name' => $this->name,
				'category_id' => $this->category_id,
				'director' => $this->director,
				'genre' => $this->genre,
				'synopsis' => $this->synopsis,
				'price' => $this->price,
				'main_image' => $this->main_image,
				'_image1' => $this->image1,
				'_image2' => $this->image2,
				'_image3' => $this->image3,
				'quantity' => $this->quantity
			]);
	}
}