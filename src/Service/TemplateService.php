<?php
namespace Zngue\Module\Service;
use Zngue\Module\Models\TemplateModel;
use Zngue\User\Service\ConstService;
class TemplateService
{
    /**
     * @param $keywords
     * @param $field
     * @param $order
     * @param $limit
     * @return \Illuminate\Contracts\Pagination\LengthAwarePaginator
     */
    public static function getList($keywords,$field,$order,$limit){

        $list=TemplateModel::where(function ($q) use ($keywords){
            if (!empty($keywords)){
                $q->orWhere('name','like','%'.$keywords.'%');
            }
        });
        if ($field && $order){
            $list->orderBy($field,$order);
        }
        return $list->paginate(ConstService::pageNum($limit));
    }
    /**
     * @param $data
     * @return \Illuminate\Database\Eloquent\Model|TemplateModel
     */
    public static function add($data){
        return TemplateModel::create($data);
    }
    /**
     * @param $id
     * @param $data
     * @return int
     */
    public static function edit($id,$data){

        return TemplateModel::where('id',$id)->update($data);
    }
    /**
     * @param $id
     * @return \Illuminate\Database\Eloquent\Collection
     */
    public static function getOne($id){
        return TemplateModel::find($id);
    }
    /**
     * @param $id
     * @return bool
     */
    public static function del($id){
        $data =self::getOne($id);
        if ($data){
            return $data->delete();
        }
        return false;
    }
    public static function changeStatus($data){
        return TemplateModel::where('id',$data['id'])->update([$data['name']=>$data['status']]);
    }
    public static function ajaxList(){
         $res =TemplateModel::select(['id','name'])->where('status',1)->get();
         if ($res){
             return $res->toArray();
         }
         return [];
    }

}
