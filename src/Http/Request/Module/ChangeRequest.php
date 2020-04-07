<?php
namespace Zngue\Module\Http\Request\Module;
use Zngue\User\Helper\ApiFromRequest;
class ChangeRequest extends ApiFromRequest
{

    public function rules()
    {
        return [
            'id'=>'required|numeric',
            'name'=>'required',
            'status'=>'required|numeric'
        ] ;
    }
    public function messages()
    {
        return [
            'id.required'=>':attribute 不能为空',
            'id.numeric'=>':attribute 必须为数字',
            'name.required'=>':attribute 不能为空',
            'status.required'=>':attribute 不能为空',
            'status.numeric'=>':attribute 必须为数字',
        ];
    }

}
