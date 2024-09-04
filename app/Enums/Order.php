<?php

namespace App\Enums;

final class Order
{
    const TYPE = [
        'thanh-toan-truc-tuyen' => 'Thanh toán trực tuyến'
    ];
    
    const STATUS = [
        '0' => 'Chưa xác nhận',
        '1' => 'Đã xác nhận'
    ];
    
}
