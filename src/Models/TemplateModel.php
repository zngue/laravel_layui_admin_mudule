<?php
namespace Zngue\Module\Models;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
/**
* @mixin \Eloquent
*@property $name
*@property $edit_content
*@property $save_content
*@property $index_content
 * @property $ex_js_content
 * @property Carbon $created_at

 */
class TemplateModel extends Model
{
    protected $table='template';
    protected $fillable = ['name','edit_content','js_content','index_content','ex_js_content'];
//    protected $dateFormat = 'U';
}
