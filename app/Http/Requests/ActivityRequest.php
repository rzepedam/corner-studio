<?php

namespace CornerStudio\Http\Requests;

use Illuminate\Routing\Route;
use Illuminate\Foundation\Http\FormRequest;

class ActivityRequest extends FormRequest
{
    /**
     * @var Route
     */
    protected $route;

    /**
     * ClientRequest constructor.
     *
     * @param Route $route
     */
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
        switch ( $this->method() )
        {
            case 'POST':
            {
                return [
                    'professional_id' => ['required'],
                    'name'            => ['required'],
                    'amount'          => ['required'],
                    'start_date'      => ['required'],
                    'end_date'        => ['required'],
                    'color'           => ['required']
                ];
            }

            case 'PUT':
            {
                return [
                    'professional_id' => ['required'],
                    'name'            => ['required', 'unique:activities,name,' . $this->route->parameter('activity')],
                    'amount'          => ['required'],
                    'start_date'      => ['required'],
                    'end_date'        => ['required'],
                    'color'           => ['required']
                ];
            }
        }
    }
}