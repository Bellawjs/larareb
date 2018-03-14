<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model;

//电工小组
class Workergroup extends Model
{
    
    // protected $connection = 'zkcn_1';

    public $table = "workergroup1519280144_used";

    public $primaryKey = "id";
    
    public $timestamps = false;

    public $fillable = [
        'zkcn61519280002',
        'zkcn61519280021',
        'zkcn61519280074'
    ];
     
}
