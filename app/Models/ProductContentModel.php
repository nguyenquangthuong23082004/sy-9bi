<?php

namespace App\Models;

use CodeIgniter\Model;

class ProductContentModel extends Model
{
    protected $table = 'tbl_product_contents';
    protected $primaryKey = 'id';
    protected $returnType = 'array';
    protected $allowedFields = [
        'product_code', 'content_key', 'content_value', 'updated_at'
    ];

    /**
     * Get all content for a specific product mapped as key => value.
     */
    public function getProductContents(string $productCode): array
    {
        $rows = $this->where('product_code', $productCode)->findAll();
        $contents = [];
        foreach ($rows as $row) {
            $contents[$row['content_key']] = $row['content_value'];
        }
        return $contents;
    }

    /**
     * Save a content key-value pair for a product.
     */
    public function setProductContent(string $productCode, string $key, ?string $value)
    {
        $existing = $this->where('product_code', $productCode)
                         ->where('content_key', $key)
                         ->first();

        if ($existing) {
            $this->update($existing['id'], ['content_value' => $value]);
        } else {
            $this->insert([
                'product_code' => $productCode,
                'content_key'  => $key,
                'content_value' => $value
            ]);
        }
    }
}
