<?php
namespace App\Models;
use CodeIgniter\Model;

class TagModel extends Model
{
    protected $table      = 'tags';
    protected $primaryKey = 'id';

    protected $useAutoIncrement = true;

    protected $returnType     = 'object';
    protected $useSoftDeletes = true;

    protected $allowedFields = ['tag','deleted_at'];

    // Dates
    protected $useTimestamps = true;
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
    protected $deletedField  = 'deleted_at';

    // Validation
    protected $validationRules      = ['tag'=>'required|min_length[3]'];
    protected $validationMessages   = [];
    protected $skipValidation       = false;
   
}