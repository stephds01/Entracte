<?php namespace App\Http\Requests;

use App\Http\Requests\Request;

/**
 * @property mixed day
 * @property mixed week
 * @property mixed monthYearPicker
 * @property mixed check
 * @property mixed year
 */
class StatRequest extends Request {

	/**
	 * Determine if the user is authorized to make this request.
	 *
	 * @return bool
	 */
	public function authorize()
	{
		return true;
	}

	/**
	 * Get the validation rules that apply to the request.
	 *
	 * @return array
	 */
	public function rules()
	{
		return [
			//
		];
	}

}
