<?php


namespace Zngue\Module\Models;


use Illuminate\Database\Eloquent\Model;

/**
 * @mixin \Eloquent
 * Class FieldModel
 * @package Zngue\Module\Models
 * @property int $id
 * @property int $mod_id
 * @property string $name
 * @property string $type
 * @property string $name_alias
 * @property int $nullable
 * @property string $default
 * @property int $index
 * @property int $name_length
 * @property int $places
 * @property string $verify
 * @property int $status
 * @property string $verify_from
 */
class FieldModel extends Model
{

    protected $table = 'field';
    protected $fillable = [
        'mod_id',
        'name',
        'type',
        'name_alias',
        'nullable',
        'default',
        'index',
        'name_length',
        'places',
        'status',
        'temp_id',
        'verify',
        'is_show_list',
        'verify_from'
    ];
//    protected $dateFormat = 'U';
    public function template(){

        return $this->hasOne(TemplateModel::class,'id','temp_id');
    }

}
