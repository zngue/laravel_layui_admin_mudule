<?php


namespace Zngue\Module\Http\Request\Module;


use Zngue\User\Helper\ApiFromRequest;

class AddRequest extends ApiFromRequest
{

    public function rules()
    {
        return [
            'status'=>'required|numeric',
            'name'=>'required|unique:module',
            'title'=>'required',
        ] ;
    }
    public function messages()
    {
        return [
            'status.required'=>':attribute 不能为空',
            'status.numeric'=>':attribute 必须为数字',
            'name.required'=>':attribute 不能为空',
            'name.unique'=>':attribute 已存在,请更换',
            'title.required'=>':attribute 跳转地址 不能为空',
        ];
    }
}
