<?php
namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Broadcast
 *
 * @package App
 * @property string $message
 * @property enum $severity
*/
class Broadcast extends Model
{
    use SoftDeletes;

    
    protected $fillable = ['message', 'severity'];
    

    public static $enum_severity = ["LOW" => "LOW", "MEDIUM" => "MEDIUM", "HIGH" => "HIGH"];

    public static function storeValidation($request)
    {
        return [
            'message' => 'max:191|required',
            'severity' => 'in:LOW,MEDIUM,HIGH|nullable'
        ];
    }

    public static function updateValidation($request)
    {
        return [
            'message' => 'max:191|required',
            'severity' => 'in:LOW,MEDIUM,HIGH|nullable'
        ];
    }

    

    
    
    
}
