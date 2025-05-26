<?php

namespace App\Http\Controllers;

class OrderStatusController extends Controller
{
    public function index()
    {
        $orders = [
            (object) [
                'name' => 'Olive Oil Soap Via',
                'is_active' => true,
            ],
            (object) [
                'name' => 'Floral soap',
                'is_active' => false,
            ],
            (object) [
                'name' => 'Lavender soap',
                'is_active' => false,
            ],
            (object) [
                'name' => 'Milk based soap',
                'is_active' => false,
            ],
            (object) [
                'name' => 'Lavender soap',
                'is_active' => false,
            ],
            (object) [
                'name' => 'Milk based soap',
                'is_active' => false,
            ],
        ];

        $progress_steps = [
            (object) [
                'title' => 'Order Confirmed',
                'icon' => 'fas fa-check',
                'is_active' => true,
                'date' => '18th Feb 2025',
                'time' => '19:47 WIB',
            ],
            (object) [
                'title' => 'Quality Assurance',
                'icon' => 'fas fa-cog',
                'is_active' => true,
                'date' => '19th Feb 2025',
                'time' => '08:00',
            ],
            (object) [
                'title' => 'Assembly',
                'icon' => 'fas fa-box',
                'is_active' => false,
                'date' => '19th Feb 2025',
                'time' => '10:03',
            ],
            (object) [
                'title' => 'Pickup',
                'icon' => 'fas fa-truck',
                'is_active' => false,
                'date' => '',
                'time' => '',
            ],
            (object) [
                'title' => 'Delivery',
                'icon' => 'fas fa-map-marker-alt',
                'is_active' => false,
                'date' => '',
                'time' => '',
            ],
        ];

        $timeline_left = [
            (object) [
                'location' => 'Jakarta (Origin Warehouse)',
                'date' => '18th Feb 2025 - 19:45 WIB',
                'desc' => 'Package departed from warehouse and is en route to transit hub.',
            ],
            (object) [
                'location' => 'Bekasi Transit Hub',
                'date' => '18th Feb 2025 - 15:47 WIB',
                'desc' => 'Package arrived at Bekasi sorting center for further routing.',
            ],
            (object) [
                'location' => 'Bandung Sorting Facility',
                'date' => '20th Feb 2025 - 09:22 WIB',
                'desc' => 'Package scanned and sorted for inter-island delivery.',
            ],
            (object) [
                'location' => 'Port of Tanjung Priok, Jakarta',
                'date' => '20th Feb 2025 - 08:10 WIB',
                'desc' => 'Package loaded onto ferry for Sumatera delivery.',
            ],
        ];

        $timeline_right = [
            (object) [
                'location' => 'Belawan Port, Medan',
                'date' => '21st Feb 2025 - 06:30 WIB',
                'desc' => 'Package arrived at Medan port and is under customs clearance.',
            ],
            (object) [
                'location' => 'Medan Central Hub',
                'date' => '21st Feb 2025 - 12:45 WIB',
                'desc' => 'Package scanned and forwarded to local delivery office.',
            ],
            (object) [
                'location' => 'Pematangsiantar Delivery Office',
                'date' => '22nd Feb 2025 - 10:05 WIB',
                'desc' => 'Package out for delivery.',
            ],
            (object) [
                'location' => 'Delivered - Sumatera Utara',
                'date' => '22nd Feb 2025 - 14:20 WIB',
                'desc' => 'Package successfully delivered to recipient.',
            ],
        ];

        return view('order-status', compact('orders', 'progress_steps', 'timeline_left', 'timeline_right'));
    }
}