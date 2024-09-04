<?php

namespace App\Enums;

final class Product
{
    const STATUS = [
        'available', 'out of stock', 'order',
    ];

    const STATUS_TEXT = [
        'available' => 'Còn hàng',
        'out of stock' => 'Hết hàng',
        'order' => 'Đang về hàng',
    ];

    const RANGE_PRICE = [
        'duoi-10trieu' => [
            'from' => 0,
            'to' => 10000000,
        ],
        'tu-10trieu-15trieu' => [
            'from' => 10000000,
            'to' => 15000000,
        ],
        'tu-15trieu-20trieu' => [
            'from' => 15000000,
            'to' => 20000000,
        ],
        'tu-20trieu-30trieu' => [
            'from' => 20000000,
            'to' => 30000000,
        ],
        'tu-30trieu-50trieu' => [
            'from' => 30000000,
            'to' => 50000000,
        ],
        'tu-50trieu-100trieu' => [
            'from' => 50000000,
            'to' => 100000000,
        ],
        'tren-100trieu' => [
            'from' => 100000000,
            'to' => 9999999999999999999
        ]
    ];

    const RANGE_PRICE_BUILD_PC = [
        'price-under-1m' => [
            'from' => 0,
            'to' => 1000000,
        ],
        'price-1m-to-10m' => [
            'from' => 1000000,
            'to' => 10000000,
        ],
        'price-10m-to-15m' => [
            'from' => 10000000,
            'to' => 15000000,
        ],
        'price-15m-to-20m' => [
            'from' => 15000000,
            'to' => 20000000,
        ],
        'price-20m-to-30m' => [
            'from' => 20000000,
            'to' => 30000000,
        ],
        'price-30m-to-50m' => [
            'from' => 30000000,
            'to' => 50000000,
        ],
        'price-50m-to-100m' => [
            'from' => 50000000,
            'to' => 100000000
        ],
        'price-over-100m' => [
            'from' => 100000000,
            'to' => 999999999999999999999
        ]
    ];
}
