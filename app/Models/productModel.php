<?php


namespace App\Models;

use CodeIgniter\Model;
use CodeIgniter\I18n\Time;

class productModel extends Model
{
    protected $table = 'product';
    protected $table_category = 'product_category';
    protected $table_gallery = 'product_gallery';
    protected $columns = '
    product.id,
    product.name,
    product_category.name as category,
    product.price,
    product.brosur_url as url,
    product.description
    ';

    public function get_new_id()
    {
        $lastId = $this->db->table($this->table)->select('id')->orderBy('id', 'ASC')->get()->getLastRow('array');
        $count = intval($lastId['id']);
        $id =  $count + 1;
        return $id;
    }

    public function getProducts()
    {
        $query = $this->db->table($this->table)
            ->select("{$this->columns}")
            ->join('product_category', 'product_category.id = product.product_category_id')
            ->get();
        return $query;
    }
    public function getProduct($id)
    {
        $query = $this->db->table($this->table)
            ->select("{$this->columns}")
            ->join('product_category', 'product_category.id = product.product_category_id')
            ->where('product.id', $id)
            ->get();
        return $query;
    }
    public function getCategory()
    {
        $query = $this->db->table($this->table_category)->select('id,name')->get();
        return $query;
    }
    public function getCulinary()
    {
        $query = $this->db->table($this->table)
            ->select("{$this->columns}")
            ->join('product_category', 'product_category.id = product.product_category_id')
            ->where('product_category.id', '1')
            ->get();
        return $query;
    }

    public function getSouvenir()
    {
        $query = $this->db->table($this->table)
            ->select("{$this->columns}")
            ->join('product_category', 'product_category.id = product.product_category_id')
            ->where('product_category.id', '2')
            ->get();
        return $query;
    }



    // --------------------------------------Admin-------------------------------------------
    public function addProduct($data)
    {
        $query = $this->db->table($this->table)->insert($data);
        return $query;
    }
    public function updateProduct($id, $data)
    {
        $query = $this->db->table($this->table)
            ->where('product.id', $id)
            ->update($data);
        return $query;
    }

    public function deleteProduct($id)
    {
        $query = $this->db->table($this->table)->delete(array('id' => $id));
        return $query;
    }
}
