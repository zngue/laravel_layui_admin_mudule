<?php
namespace Zngue\Module\Http\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Zngue\Module\Http\Request\Module\AddRequest;
use Zngue\Module\Http\Request\Module\ChangeRequest;
use Zngue\Module\Http\Request\Module\SaveRequest;
use Zngue\Module\Service\ModuleService;
use Zngue\Module\Service\TableService;
use Zngue\User\Http\Controller\Controller;
use Zngue\User\Http\Request\DelRequest;

class ModuleController extends Controller
{

        public function index(Request $request){
            if ($request->ajax() ){
                $keywords=$request->input('keywords','');
                $field=$request->input('field','');
                $order=$request->input('order','');
                $limit = $request->input('limit','');
                $listObj =ModuleService::getList($keywords,$field,$order,$limit);
                $item =$listObj->items();
                $num =$listObj->total();
                return $this->layTableJson($item,$num);
            }
            return $this->zngView('module.index');
        }
        public function add(){

            return $this->zngView('module.add');
        }
        public function doAdd(AddRequest $request){
            $data = $request->all();
            $r =ModuleService::addModel($data);
            return $this->returnInfo($r);

        }
        public function  save(Request $request){

            $id = $request->input('id',0);
            if ($id==0){
                return redirect()->route('module.index');
            }
            $data=ModuleService::getOne($id);
            if (!$data){
                return redirect()->route('module.index');
            }
            $data = $data->toArray();
            return $this->zngView('module.save',compact('data'));
        }

        public function doSave(SaveRequest $request){
            $data = $request->all();
            $res =ModuleService::saveModule($data['id'],$data);
            if ($res===2){
                return $this->returnError('原表不存在');
            }elseif($res===3) {
                $this->returnError( '您修改的表名已经存在请换表名' );
            }else{
                return $this->returnInfo($res);
            }
        }
        public function del(DelRequest $request){
            $id = $request->input('id');
            $r =ModuleService::delModule($id);
            return $this->returnInfo($r);
        }
        public function changeStatus(ChangeRequest $request){
            $data =$request->only('id','name','status');
            if (!ModuleService::checkStatusName($data['name'])){
                return $this->returnError('参数错误');
            }
            $r = ModuleService::changeStatus($data);
            return $this->returnInfo($r);
        }
        public function delAll(){


        }
}
