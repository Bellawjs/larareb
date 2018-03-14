<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Db extends Model
{
    // protected $connection = 'zkcn_1';

	public $table = "dbs";

	public $primaryKey = "id";
    
	public $timestamps = false;

	public $fillable = [
		"id",
		"db_type",
		"db_ip",
		"db_port",
		"db_user",
		"db_password",
		"db_name",
		"created_at",
		"updated_at",
		"user_id"
	];
}
