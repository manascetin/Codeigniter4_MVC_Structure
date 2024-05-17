<?php 

namespace App\Models;
use CodeIgniter\Model;

class BlogModel extends Model
{
    protected $DBGroup = 'default';
    protected $table = 'blogs';
    protected $primaryKey = 'id';
    protected $allowedFields = ['title', 'content', 'category', 'sefLink'];

    public function blogList($select, $where = [])
    {
        return $this->select($select)
            ->join('blog_categories', 'blogs.category = blog_categories.pk')
            ->where($where)
            ->findAll();
    }

    public function blogCategories()
    {
        return $this->db->table('blog_categories')->get()->getResultArray();
    }   
}
