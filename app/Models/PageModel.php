<?php 

namespace App\Models;

use CodeIgniter\Model;

class PageModel extends Model
{
    protected $DBGroup = 'default';
    protected $table = 'pages';

    public function pageList($select = '*', $where = [])
    {
        // Eğer $select parametresi belirtilmemişse tüm alanlar seçilsin
        if ($select === '*') {
            return $this->orderBy('sort', 'asc')->where($where)->findAll();
        } else {
            // Belirtilen alanları seç
            return $this->select($select)->orderBy('sort', 'asc')->where($where)->findAll();
        }
    }

    public function pageInfo($select, $where = [])
    {
        return $this->select($select)->where($where)->first();
    }
}
