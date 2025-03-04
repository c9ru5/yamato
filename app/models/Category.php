<?php
namespace App\Models;

use App\Core\Model;

class Category
{
    private $id;
    private $name;
    private $icon;
    private $db;

    public function __construct()
    {
        $this->db = new Model();
    }
    public function setId($id)
    {
        return $this->id = $id;
    }
    public function getId()
    {
        return $this->id;
    }
    public function setName($name)
    {
        return $this->name = $name;
    }
    public function getName()
    {
        return $this->name;
    }
    public function setIcon($icon)
    {
        return $this->icon = $icon;
    }
    public function getIcon()
    {
        return $this->icon;
    }

    public function getAllCategory()
    {
        $sql = "SELECT * FROM categories";
        return $this->db->getAll($sql);
    }
    public function getOneCategory(Category $category)
    {
        $sql = "SELECT * FROM categories WHERE id = ?";
        return $this->db->getOne($sql, $category->getId());
    }
    public function paginationCategory($limit, $offset)
    {
        $sql = "SELECT * FROM categories"; 
        $sql .= " LIMIT $limit OFFSET $offset";
        return $this->db->getAll($sql);
    }
    public function getTotalCategory()
    {
        $sql = "SELECT COUNT(*) as total FROM categories";
        $result = $this->db->getOne($sql);
        return $result['total'] ?? 0;
    }
    public function addCategory(Category $category) {
        $sql = "INSERT INTO categories(name, icon) VALUES (?, ?)";
        return $this->db->insert($sql, $category->getName(), $category->getIcon());
    }
    public function deleteCategory(Category $category) {
        $sql = "DELETE FROM categories WHERE id = ?";
        return $this->db->delete($sql, $category->getId());
    }
    public function updateCategory(Category $category) {
        $sql = "UPDATE categories SET name = ?, icon = ? WHERE id = ?";
        return $this->db->update($sql, $category->getName(), $category->getIcon(), $category->getId());
    }
}
