<?php

namespace App\Controllers\AdmMaster;

use App\Controllers\BaseController;
use App\Models\ProductContentModel;

class ProductContent extends BaseController
{
    protected array $validProducts = ['lais', 'skin-test', 'earvent'];

    public function index(string $productCode = 'lais')
    {
        if (!in_array($productCode, $this->validProducts)) {
            $productCode = 'lais';
        }

        $model = new ProductContentModel();
        $contents = $model->getProductContents($productCode);

        // Map product names for title display
        $productNames = [
            'lais'      => '라이스정',
            'skin-test' => '알레르기 피부단자시험 시약',
            'earvent'   => 'EARVENT'
        ];

        return view('adm_master/product_content/form', [
            'title'       => '제품 콘텐츠 관리',
            'productCode' => $productCode,
            'productName' => $productNames[$productCode],
            'contents'    => $contents,
            'products'    => $productNames
        ]);
    }

    public function save(string $productCode)
    {
        if (!in_array($productCode, $this->validProducts)) {
            return $this->response->setJSON([
                'status'  => 'ERROR',
                'message' => '유효하지 않은 제품 코드입니다.'
            ]);
        }

        $model = new ProductContentModel();

        // 1. Save all textual / HTML fields
        $fields = $this->request->getPost();
        foreach ($fields as $key => $value) {
            // Exclude non-content fields like csrf tokens if any, or helper posts
            if (in_array($key, ['csrf_test_name', 'action'])) {
                continue;
            }
            $model->setProductContent($productCode, $key, $value);
        }

        // 2. Handle Image Upload with WebP conversion & resizing
        $imageFile = $this->request->getFile('hero_image');
        if ($imageFile && $imageFile->isValid()) {
            $imagePath = $this->processUploadedImage($imageFile, $productCode . '_hero');
            if ($imagePath) {
                // Delete old image file if it exists and is not the default placeholder
                $oldImg = $model->where('product_code', $productCode)
                                ->where('content_key', 'hero_image')
                                ->first();
                if ($oldImg && !empty($oldImg['content_value'])) {
                    $oldFilePath = ROOTPATH . 'public' . $oldImg['content_value'];
                    if (file_exists($oldFilePath) && strpos($oldImg['content_value'], '/images/product/') === 0) {
                        @unlink($oldFilePath);
                    }
                }
                
                // Save new image path
                $model->setProductContent($productCode, 'hero_image', $imagePath);
            } else {
                return $this->response->setJSON([
                    'status'  => 'ERROR',
                    'message' => '이미지 처리 중 오류가 발생했습니다. JPG, PNG, WEBP 파일만 업로드할 수 있습니다.'
                ]);
            }
        }

        if ($this->request->isAJAX()) {
            return $this->response->setJSON([
                'status'  => 'OK',
                'message' => '성공적으로 저장되었습니다.'
            ]);
        }

        return redirect()->to(base_url('AdmMaster/product/' . $productCode))
                         ->with('success', '성공적으로 저장되었습니다.');
    }

    /**
     * Resize image to max width 1200px (maintaining aspect ratio) and convert to WebP.
     * Returns the relative public path of the saved file or null on failure.
     */
    private function processUploadedImage($file, string $prefix): ?string
    {
        $tempPath = $file->getTempName();
        
        $info = getimagesize($tempPath);
        if (!$info) {
            return null;
        }
        
        $mime = $info['mime'];
        switch ($mime) {
            case 'image/jpeg':
            case 'image/jpg':
                $src = imagecreatefromjpeg($tempPath);
                break;
            case 'image/png':
                $src = imagecreatefrompng($tempPath);
                break;
            case 'image/webp':
                $src = imagecreatefromwebp($tempPath);
                break;
            default:
                return null;
        }
        
        if (!$src) {
            return null;
        }
        
        $origWidth = imagesx($src);
        $origHeight = imagesy($src);
        
        $targetWidth = 1200;
        if ($origWidth > $targetWidth) {
            $scale = $targetWidth / $origWidth;
            $targetHeight = (int)($origHeight * $scale);
        } else {
            $targetWidth = $origWidth;
            $targetHeight = $origHeight;
        }
        
        $dst = imagecreatetruecolor($targetWidth, $targetHeight);
        
        if ($mime === 'image/png' || $mime === 'image/webp') {
            imagealphablending($dst, false);
            imagesavealpha($dst, true);
            $transparent = imagecolorallocatealpha($dst, 255, 255, 255, 127);
            imagefilledrectangle($dst, 0, 0, $targetWidth, $targetHeight, $transparent);
        } else {
            $white = imagecolorallocate($dst, 255, 255, 255);
            imagefilledrectangle($dst, 0, 0, $targetWidth, $targetHeight, $white);
        }
        
        imagecopyresampled($dst, $src, 0, 0, 0, 0, $targetWidth, $targetHeight, $origWidth, $origHeight);
        
        $fileName = $prefix . '_' . time() . '.webp';
        $targetDir = ROOTPATH . 'public/images/product/';
        if (!is_dir($targetDir)) {
            mkdir($targetDir, 0755, true);
        }
        
        $destPath = $targetDir . $fileName;
        
        imagewebp($dst, $destPath, 90);
        
        imagedestroy($src);
        imagedestroy($dst);
        
        return '/images/product/' . $fileName;
    }
}
