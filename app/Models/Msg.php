<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model;

//消息
class Msg extends Model
{
    
    protected $connection = 'zkcn';

    public $table = "msg1516269679_used";

    public $primaryKey = "id";
    
    public $timestamps = false;

    public $fillable = [
        "zkcn61516268724",
        "zkcn61516268761",
        "zkcn61516268784",
        "zkcn61516268811",
        "zkcn61516268858",
        "zkcn61516268889",
        "zkcn61516269359",
        "zkcn61516269387"
    ];
    
}
