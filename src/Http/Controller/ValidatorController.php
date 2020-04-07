<?php
namespace Zngue\Module\Http\Controller;
use Illuminate\Http\Request;
use Zngue\Module\Service\ValidatorService;
use Zngue\Module\Http\Request\Module\ChangeRequest;
use Zngue\User\Http\Controller\Controller;
use Zngue\Module\Http\Request\Validator\AddRequest;
use Zngue\Module\Http\Request\Validator\SaveRequest;
class ValidatorController extends Controller
{
    const route_base='validator.';
    public function index(Request $request ){
        if ($request->ajax() ){
            $keywords=$request->input('keywords','');
            $field=$request->input('field','');
            $order=$request->input('order','');
            $limit = $request->input('limit','');
            $listObj =ValidatorService::getList($keywords,$field,$order,$limit);
            $item =$listObj->items();
            $num =$listObj->total();
            return $this->layTableJson($item,$num);
        }
        return $this->zngView(self::route_base.'index');
    }
    public function add(){
        return $this->zngView(self::route_base.'add');

    }
    public function doAdd(AddRequest $request){
        $data =$request->all();
//        print_r($data);die;
        $res =ValidatorService::add($data);
        return $this->returnInfo($res);
    }
    public function save(Request $request){
        $id = $request->input('id',0);
        if (!$id){
            return redirect()->route(self::route_base.'index');
        }
        $data=ValidatorService::getOne($id)->toArray();
        return $this->zngView(self::route_base.'save',compact('data'));

    }
    public function doSave(SaveRequest $request){
        $data =$request->all();
        $r=ValidatorService::edit($data['id'],$data);
        return $this->returnInfo($r);
    }
    public function del(Request $request){
        $id =$request->input('id',0);
        $r=ValidatorService::del($id);
        return $this->returnInfo($r);
    }
    public function changeStatus(ChangeRequest $request){
        $data =$request->only('id','name','status');
        $r =ValidatorService::changeStatus($data);
        return $this->returnInfo($r);
    }
    public function delAll(){


    }

}
