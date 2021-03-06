<?php
namespace App\Services;

use App\Models\Image;
use App\Models\Product;
use CloudinaryLabs\CloudinaryLaravel\Facades\Cloudinary;
use Illuminate\Support\Facades\Storage;

class ProductService
{
    public function handleUploadProductImage($image, $productID){
        $path = $image->store('images/vcanh', 's3');
        Image::create([
            'name' => basename($path),
            'url' => Storage::disk('s3')->url($path),
            'size' => $image->getSize(),
            'imageable_id' => $productID,
            'imageable_type' => Product::class
        ]);
    }

    public function handleUploadProductImageCloud($image, $productID){
        $path = Cloudinary::upload($image->getRealPath())->getSecurePath();
        Image::create([
            'name' => basename($path),
            'url' => $path,
            'size' => $image->getSize(),
            'imageable_id' => $productID,
            'imageable_type' => Product::class
        ]);
    }

    public function handleUpdateProductImageCloud($image, $productID){
        $path = Cloudinary::upload($image->getRealPath())->getSecurePath();
        Image::create([
            'name' => basename($path),
            'url' => $path,
            'size' => $image->getSize(),
            'imageable_id' => $productID,
            'imageable_type' => Product::class
        ]);
    }

    public function handleUpdateProductImage($image, $path, $product){
        Image::create([
            'name' => basename($path),
            'url' => Storage::disk('s3')->url($path),
            'size' => $image->getSize(),
            'imageable_id' => $product,
            'imageable_type' => Product::class
        ]);
    }
}
