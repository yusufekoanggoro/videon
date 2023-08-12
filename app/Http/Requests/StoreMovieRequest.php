<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class StoreMovieRequest extends Request {
	public function authorize()
	{
		return true;
	}

	public function rules()
	{

		return [
			'name' => 'required',
			'category_id' => 'required',
		];
	}
}