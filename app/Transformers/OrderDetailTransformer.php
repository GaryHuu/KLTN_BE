<?php

namespace App\Transformers;

use App\Models\OrderDetail;
use Flugg\Responder\Transformers\Transformer;

class OrderDetailTransformer extends Transformer
{
    /**
     * List of available relations.
     *
     * @var string[]
     */
    protected $relations = [
        'product' => ProductTransformer::class
    ];

    /**
     * List of autoloaded default relations.
     *
     * @var array
     */
    protected $load = [];

    /**
     * Transform the model.
     *
     * @param OrderDetail $orderDetail
     * @return array
     */
    public function transform(OrderDetail $orderDetail)
    {
        return [
            'product_quantity' => (int) $orderDetail->product_quantity,
        ];
    }
}
