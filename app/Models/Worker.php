<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model;

//工人
class Worker extends Model
{
    
    // protected $connection = 'zkcn_1';

    public $table = "worker1519278716_used";

    public $primaryKey = "id";
    
    public $timestamps = false;

    public $fillable = [
        'zkcn61519278454',
        'zkcn61519278535',
        'zkcn61519278547',
        'zkcn61519278574',
        'zkcn61519278589'
    ];
     
}
