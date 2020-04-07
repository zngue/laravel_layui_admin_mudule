<?php


namespace Zngue\Module\Models;


use Illuminate\Database\Eloquent\Model;

/**
 *@mixin \Eloquent
 * Class ModuleModels
 * @package Zngue\Module\Models
 * @property  $id
 * @property $title
 * @property  $name
 * @property $description
 * @property $type
 * @property $issystem
 * @property $listfields
 * @property $sort
 * @property $status
 */
class ModuleModels extends Model
{

    protected $fillable=[
      'title','name',  'description',
        'type','issystem','listfields',
        'sort','status'
    ];
    protected $table='module';

    public function field(){


    }



}
