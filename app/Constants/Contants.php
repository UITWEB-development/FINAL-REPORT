<?php

namespace App\Constants;


class AuthStatusConstants {
    const SIGN_UP_SUCCESS = 'Sign up successfully';
    const SIGN_IN_SUCCESS = 'You have successfully signed in!';

    const INVALID_CREDENTIALS = 'Invalid credentials!';
    const AUTHENTICATION_ERROR = 'Authentication failed!';

    const INVALID_RESET_TOKEN = 'Invalid reset token!';
}

class DashboardConstants {
    const SELLER_DASHBOARD_MENU = [
        'menu' => [
            [
                'label' => 'Dashboard',
                'route_name' => 'seller.dashboard',
                'active_route' => 'seller.dashboard',
                'icon' => 'dashboard'
            ],
            [
                'label' => 'Products',
                'route_name' => 'seller.products',
                'active_route' => 'seller.products',
                'icon' => 'elusive-list-alt'
            ],
            [
                'label' => 'Orders',
                'route_name' => 'seller.orders',
                'active_route' => 'seller.orders',
                'icon' => 'order'
            ]
        ],
        'submenu' => [
            [
                'label' => 'Profile',
                'route_name' => 'seller.profile',
                'active_route' => 'seller.profile',
                'icon' => 'iconsax-bol-profile-circle'
            ],
        ]
    ];

    const ADMIN_DASHBOARD_MENU =  [
        'menu' => [
            [
                'label' => 'Dashboard',
                'route_name' => 'admin.dashboard',
                'active_route' => 'admin.dashboard',
                'icon' => 'dashboard'
            ],
            [
                'label' => 'Restaurants',
                'route_name' => '',
                'active_route' => '',
                'icon' => 'restaurant'
            ],
            [
                'label' => 'Customers',
                'route_name' => '',
                'active_route' => '',
                'icon' => 'customer'
            ],
            [
                'label' => 'Reports',
                'route_name' => '',
                'active_route' => '',
                'icon' => 'fluentui-data-bar-vertical-16'
            ]
        ],
        'submenu' => [],

    ];
}