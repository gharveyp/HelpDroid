<?php
namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Safezone
 *
 * @package App
 * @property string $lat
 * @property string $lng
 * @property string $address
 * @property string $place_name
*/
class Safezone extends Model
{
    
    protected $fillable = ['lat', 'lng', 'address', 'place_name'];
    

    public static function storeValidation($request)
    {
        return [
            'lat' => 'max:191|required',
            'lng' => 'max:191|required',
            'address' => 'max:191|required',
            'place_name' => 'max:191|required'
        ];
    }

    public static function updateValidation($request)
    {
        return [
            'lat' => 'max:191|required',
            'lng' => 'max:191|required',
            'address' => 'max:191|required',
            'place_name' => 'max:191|required'
        ];
    }

    

    
    
    
}
