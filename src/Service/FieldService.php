<?php


namespace Zngue\Module\Service;
use Zngue\Module\Models\FieldModel;
use Zngue\Module\Models\ModuleModels;
use Zngue\User\Service\ConstService;

/**
 * Class FieldService
 * @package Zngue\Module\Service
 */
class FieldService
{
    const CHANGE_STATUS_NAME=['nullable','index','status','is_show_list'];
    public static function getList($keywords,$field,$order,$limit,$mid){

        $list=FieldModel::where(function ($q) use ($keywords){
            if (!empty($keywords)){
                $q->orWhere('name','like','%'.$keywords.'%');
                $q->orWhere('name_alias','like','%'.$keywords.'%');
            }
        });
        if ($mid){
            $list->where('mod_id',$mid);
        }
        $list->leftjoin('template','field.temp_id','=','template.id');
        $list->select(['field.*','template.name as t_name']);
        if ($field && $order){
            $list->orderBy($field,$order);
        }
        return $list->paginate(ConstService::pageNum($limit));
    }
    public static function getOne($id){
        return FieldModel::find($id);
    }
    public static function add($data){
        $model=ModuleModels::find($data['mod_id']);
        $table_name =$model->name;
        TableService::delTableField($table_name,$data['name']);
        TableService::addTableFiled($table_name,$data);
       // print_r($data);die;
        return FieldModel::create($data);
    }
    public static function del($id){
        $file=FieldModel::find($id);
        $modle=ModuleModels::find($file->mod_id);
        if ($modle){
            TableService::delTableField($modle->name,$file->name);
        }
        return $file->delete();
    }
    public static function save($id,$data){
//        print_r($data);die;
        $filed=FieldModel::find($id);
        $model=ModuleModels::find($filed->mod_id);
        if ($filed->name!=$data['name'] ){
            TableService::changeTableFieldName($model->name,$filed->name,$data['name']);
        }
        if ($filed->type!=$data['type']){
            TableService::changeTableFieldType($model->name,$data);
        }
        return FieldModel::where('id',$id)->update($data);
//        return $filed->update($data);
    }
    public static function checkStatusName($name){

        if (!in_array($name,self::CHANGE_STATUS_NAME)){
            return false;
        }
        return true;
    }
    public static function changeStatus($data){

        $field =FieldModel::find($data['id']);
        $model=ModuleModels::find($field->mod_id);
        if ( $model&& $field &&   $data['name']=='nullable' ){
            $status=$data['status']==0?true:false;
            if ($model && $field){
                TableService::nullableTableChange($model->name,$field->type,$field->name,$status,$field->name_length,$field->places);
            }
        }elseif ($model && $field && $data['name'] =='index' ){
            if ($data['status'] == 1){
                TableService::addTableIndex($model->name,$field->name);
            }else{
                TableService::delTableIndex($model->name,$field->name);
            }
        }
        return $field->update([$data['name']=>$data['status']]);
    }

}
