<?php


namespace Zngue\Module\Http\Request\Module;


use Zngue\User\Helper\ApiFromRequest;

class SaveRequest extends ApiFromRequest
{
    public function rules()
    {
        return [
            'status'=>'required|numeric',
            'id'=>'required|numeric',
            'name'=>'required',
            'title'=>'required',
        ] ;
    }
    public function messages()
    {
        return [
            'status.required'=>':attribute 不能为空',
            'id.required'=>':attribute 不能为空',
            'status.numeric'=>':attribute 必须为数字',
            'id.numeric'=>':attribute 必须为数字',
            'name.required'=>':attribute 不能为空',
            'title.required'=>':attribute 跳转地址 不能为空',
        ];
    }
}
