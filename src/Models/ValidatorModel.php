<?php
namespace Zngue\Module\Models;
use Illuminate\Database\Eloquent\Model;
/**
* @mixin \Eloquent
*@property $name
*@property $status

 */
class ValidatorModel extends Model
{
    protected $table='validator';
    protected $fillable = ['name','status'];
}
