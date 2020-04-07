<?php


namespace Zngue\Module\Service;


use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use  Illuminate\Support\Facades\Schema;

class TableService
{
    public static function addTable($table_name,$data){
       // if ( Schema::dropIfExists($table_name) ){
            Schema::create($table_name,function (Blueprint $blueprint) use ($data) {
                $blueprint->increments('id');
                $blueprint->dateTime('created_at');
                $blueprint->dateTime('updated_at');
                $blueprint->comment=$data['title'];
                $blueprint->engine="InnoDB";
            });
            DB::statement("alter table {$table_name} comment'{$data['title']}'");
        //}
    }
    public static function delTable($table_name){
        return Schema::dropIfExists($table_name);
    }
    public static function addTableFiled($table,$data){
        Schema::table($table,function (Blueprint $table) use($data) {
            $type = $data['type'];
            $res =self::fielTypeArr($type);
            if ($res===false) return false;
            if ($res==1){
                $connet=$table->$type($data['name']);
            }elseif($res==3){
                $connet=$table->$type($data['name'],!empty($data['name_length'])?$data['name_length']:null);
            }elseif ($res==2){
                $connet=$table->$type($data['name'],$data['name_length'],!empty($data['places'])?$data['places']:0 );
            }else{
                return false;
            }
            if (!empty($data['index'])){
                $connet->index($data['name']);
            }
            if (!empty($data['default'])){
                $connet->default($data['default']);
            }
            $connet->nullable();
            $comment =! empty($data['comment'])?$data['comment']:$data['name_alias'];
            $connet->comment($comment);
        });
    }

    public static function changeTableFieldType($table,$data){
        Schema::table($table,function (Blueprint $table) use($data) {
            $type = !empty($data['type'])?$data['type']:'';
            $res =self::fielTypeArr($type);
            if ($res===false) return false;
            if ($res==1){
                $connet=$table->$type($data['name']);
            }elseif($res==3){
                $connet=$table->$type($data['name'],!empty($data['length'])?$data['length']:null);
            }elseif ($res==2){
                $connet=$table->$type($data['name'],$data['length'],!empty($data['places'])?$data['places']:0 );
            }else{
                return false;
            }
            $connet->change();
        });
    }
    public static function changeTableFieldName($table,$old_name,$new_name){
        Schema::table($table,function (Blueprint $table) use($old_name,$new_name) {
            $table->renameColumn($old_name,$new_name);
        });
    }
    public static function delTableField($table_name,$name){
        if ( Schema::hasColumn($table_name,$name) ){
            Schema::table($table_name,function (Blueprint $blueprint) use($name){
                $blueprint->dropColumn($name);
            });
        }
    }
    public static function fielTypeArr($filedType){
        switch ($filedType){
            case 'bigInteger':
            case 'integer':
            case 'mediumInteger':
            case 'smallInteger':
            case 'time':
            case 'timeStamp':
            case 'dateTime':
            case 'date':
            case 'tinyInteger':
            case 'text':
            case 'mediumText':
            case 'longText':
                return 1;
                break;
            case 'decimal':
            case 'float':
            case 'double':
                return 2;
                break;
            case 'string':
                return 3;
                break;
            default:
                return false;
                break;
        }
    }
    public static function delFiled($table,$name){
        if (Schema::hasColumn($table,$name)){
            Schema::table($table,function (Blueprint $blueprint) use ($name) {
                $blueprint->dropColumn($name);
            });
        }
    }
    public static function saveTableName($old,$new){

        if (!Schema::hasTable($old)){
            return 2;
        }
        if (Schema::hasTable($new)){
            return 3;
        }
        return  Schema::rename($old,$new);
    }
    public static function addTableIndex($table,$clomn){
        Schema::table($table,function (Blueprint $blueprint) use ($clomn) {
            $blueprint->index($clomn);
        });
    }
    public static function delTableIndex($table,$clonm){
        $index = $table.'_'.$clonm.'_index';
        Schema::table($table,function (Blueprint $blueprint) use ($index) {
            $blueprint->dropIndex($index);
        });
    }

    /**
     * @param $table
     * @param $type
     * @param $name
     * @param $status
     * @param $name_length
     * @param int $places
     * @desc 是否为空设置
     */
    public static function nullableTableChange($table,$type,$name,$status,$name_length,$places=0){
        try {
        Schema::table($table,function (Blueprint $blueprint) use ($name,$type,$status,$name_length) {
            $res =self::fielTypeArr($type);
            if ($res===false) return false;
            if ($res==1){
                $connet=$blueprint->$type($name);
            }elseif($res==3){
                $connet=$blueprint->$type($name,$name_length?$name_length:null);
            }elseif ($res==2){
                $connet=$blueprint->$type($name,$name_length ,!empty($places)?$places:0 );
            }else{
                return false;
            }
            if ($status==true){
                $connet->nullable(true);
            }else{
                $connet->nullable(false);
            }
            $connet->change();
        });
        return true;
        }catch (\Exception $exception){
            return true;
        }
    }
}
