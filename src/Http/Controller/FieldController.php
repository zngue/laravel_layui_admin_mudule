<?php
namespace Zngue\Module\Http\Controller;
use Illuminate\Http\Request;
use Zngue\Module\Service\FieldService;
use Zngue\Module\Service\TemplateService;
use Zngue\Module\Service\ValidatorService;
use Zngue\User\Http\Controller\Controller;
use Zngue\User\Http\Request\DelRequest;
use Zngue\User\Http\Request\StatusRequest;

class FieldController extends Controller
{
    const ROUTE_BASE='field.';
    public function index(Request $request){
        $mid = $request->input('mid',0);
        if ($request->ajax() ){
            $keywords=$request->input('keywords','');
            $field=$request->input('field','');
            $order=$request->input('order','');
            $limit = $request->input('limit','');
            $listObj =FieldService::getList($keywords,$field,$order,$limit,$mid);
            $item =$listObj->items();
            $num =$listObj->total();
            return $this->layTableJson($item,$num);
        }
        return $this->zngView('field.index',compact('mid'));
    }
    public function add(Request $request){
        $list_valid =ValidatorService::verifyListAll();
        if ($list_valid){
            $list_valid=$list_valid->toArray();
        }else{
            $list_valid=[];
        }
        $mid = $request->input('mid',0);
        return $this->zngView(self::ROUTE_BASE.'add',compact('mid','list_valid'));
    }
    public function doAdd(Request $request){
        $data  =$request->all();
        if (!empty($data['verify'])){
            $data['verify']=implode('|',$data['verify']);
        }
        if (!empty($data['verify_from'])){
            $data['verify_from']=implode('|',$data['verify_from']);
        }
        $r=FieldService::add($data);
        return $this->returnInfo($r);
    }
    public function save(Request $request){
        $list_valid =ValidatorService::verifyListAll();
        if ($list_valid){
            $list_valid=$list_valid->toArray();
        }else{
            $list_valid=[];
        }
        $id = $request->input('id',0);
        if ($id==0){
            return redirect()->route('field.index');
        }
        $data=FieldService::getOne($id);
        if (!$data){
            return redirect()->route('field.index');
        }
        $data = $data->toArray();
        $mid = $data['mod_id'];
        return $this->zngView('field.save',compact('data','mid','list_valid'));
    }
    public function doSave(Request $request){
        $data = $request->all();
       // $data['verify']=implode('|',$data['verify']);
        if (!empty($data['verify'])){
            $data['verify']=implode('|',$data['verify']);
        }
        if (!empty($data['verify_from'])){
            $data['verify_from']=implode('|',$data['verify_from']);
        }
        $r=FieldService::save($data['id'],$data);
        return $this->returnInfo($r);
    }
    public function del(DelRequest $request){
        $id =$request->input('id',0);
        $r=FieldService::del($id);
        return $this->returnInfo($r);
    }
    public function changeStatus(StatusRequest $request){
        $data =$request->only('id','name','status');
        if (!FieldService::checkStatusName($data['name'])){
            return $this->returnError('参数错误');
        }
        $r = FieldService::changeStatus($data);
        return $this->returnInfo($r);
    }
    public function delAll(){

    }
    public function tempAjaxList(){
        return TemplateService::ajaxList();
    }

}
