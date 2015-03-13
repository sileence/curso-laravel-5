<?php namespace Course\Http\Requests;

use Course\Http\Requests\Request;
use Illuminate\Routing\Route;

class EditUserRequest extends Request {

    /**
     * @var Route
     */
    private $route;

    public function __construct(Route $route)
    {
        $this->route = $route;
    }

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
            'first_name' => 'required',
            'last_name' => 'required',
            'email' => 'required|unique:users,email,' . $this->route->getParameter('users'),
            'password' => '',
            'type' => 'required|in:user,admin'
        ];
	}

}
