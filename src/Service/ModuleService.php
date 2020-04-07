<?php


namespace Zngue\Module\Service;


use Illuminate\Support\Facades\DB;
use Zngue\Module\Models\FieldModel;
use Zngue\Module\Models\ModuleModels;
use Zngue\User\Service\ConstService;

class ModuleService
{
    const CHANGE_STATUS_NAME=['status'];

    public static function getOne($id){
       return  ModuleModels::find($id);
    }
    public static function getList($keywords,$field,$order,$limit){

        $list=ModuleModels::where(function ($q) use ($keywords){
            if (!empty($keywords)){
                $q->orWhere('name','like','%'.$keywords.'%');
                $q->orWhere('title','like','%'.$keywords.'%');
            }
        });
        if ($field && $order){
            $list->orderBy($field,$order);
        }
        return $list->paginate(ConstService::pageNum($limit));
    }


    public static function addModel($data){
        try {
            DB::transaction(function () use ($data) {
                TableService::delTable($data['name']);
                TableService::addTable($data['name'],$data);
                $data_module=ModuleModels::where('name',$data['name'])->first();
                if ($data_module){
                    ModuleModels::where('name',$data['name'])->update($data);
                }else{
                    ModuleModels::create($data);
                }
            });
            $statusType = true;
        }catch (\Exception $exception){
            print_r($exception->getMessage());
            $statusType =  false;
        }
        if ($statusType==false){
            TableService::delTable($data['name']);
        }
        return $statusType;
    }

    /**
     * @param $id
     * 删除模型
     * @return bool
     * @throws \Throwable
     */
    public static function delModule($id){
        try {
            DB::transaction(function () use ($id){
                $module=ModuleModels::find($id);
                $table_name = $module->name;
                FieldModel::where('mod_id',$id)->delete();
                $module->delete();
                TableService::delTable($table_name);
            });
            return true;
        }catch (\Exception $exception){
            return false;
        }
    }
    /**
     * @param $id
     * @param $data
     * @return bool
     * @throws \Throwable
     */
    public static function saveModule($id,$data){
        try {
            $model =ModuleModels::find($id);
            if ($model->name!=$data['name']){
                $change=TableService::saveTableName($model->name,$data['name']);
                if ($change){
                    return $change;
                }
            }
            ModuleModels::where('id',$id)->update($data);
            return true;
        }catch (\Exception $exception){
            return false;
        }
    }
    public static function checkStatusName($name){

        if (!in_array($name,self::CHANGE_STATUS_NAME)){
            return false;
        }
        return true;
    }
    public static function changeStatus($data){
        return ModuleModels::where('id',$data['id'])->update([$data['name']=>$data['status']]);
    }
}
