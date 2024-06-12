<?php

namespace App\Constants;

class AuthStatusConstants
{
    const SIGN_UP_SUCCESS = 'Sign up successfully';
    const SIGN_IN_SUCCESS = 'You have successfully signed in!';

    const INVALID_CREDENTIALS = 'Invalid credentials!';
    const AUTHENTICATION_ERROR = 'Authentication failed!';

    const INVALID_RESET_TOKEN = 'Invalid reset token!';
}

class DashboardConstants
{
    const SELLER_DASHBOARD_MENU = [
        'menu' => [
            [
                'label' => 'Dashboard',
                'route_name' => 'seller.dashboard',
                'active_route' => 'seller.dashboard',
                'icon' => 'dashboard',
            ],
            [
                'label' => 'Products',
                'route_name' => 'seller.products',
                'active_route' => 'seller.products',
                'icon' => 'elusive-list-alt',
            ],
            [
                'label' => 'Orders',
                'route_name' => 'seller.orders',
                'active_route' => 'seller.orders',
                'icon' => 'order',
            ],
        ],
        'submenu' => [
            [
                'label' => 'Profile',
                'route_name' => 'seller.profile',
                'active_route' => 'seller.profile',
                'icon' => 'iconsax-bol-profile-circle',
            ],
        ],
    ];

    const ADMIN_DASHBOARD_MENU = [
        'menu' => [
            [
                'label' => 'Dashboard',
                'route_name' => 'admin.dashboard',
                'active_route' => 'admin.dashboard',
                'icon' => 'dashboard',
            ],
            [
                'label' => 'Restaurants',
                'route_name' => 'admin.restaurants',
                'active_route' => 'admin.restaurants',
                'icon' => 'restaurant',
            ],
            [
                'label' => 'Customers',
                'route_name' => 'admin.customers',
                'active_route' => 'admin.customers',
                'icon' => 'customer',
            ],
            [
                'label' => 'Reports',
                'route_name' => 'admin.reports',
                'active_route' => 'admin.reports',
                'icon' => 'fluentui-data-bar-vertical-16',
            ],
        ],
        'submenu' => [],
    ];
}

class OrderStateConstants
{
    const STYLES = [
        'Pending' => [
            'div' => 'flex items-center justify-center shadow-md rounded-lg bg-blue-200 shadow-blue-300',
            'span' => 'py-1 px-3 rounded-full font-bold text-sm text-blue-500',
        ],
        'Cancelled' => [
            'div' => 'flex items-center justify-center shadow-md rounded-lg bg-red-200 shadow-red-300',
            'span' => 'py-1 px-3 rounded-full font-bold text-sm text-red-500',
        ],
        'Failed' => [
            'div' => 'flex items-center justify-center shadow-md rounded-lg bg-red-200 shadow-red-300',
            'span' => 'py-1 px-3 rounded-full font-bold text-sm text-red-500',
        ],
        'Delivery' => [
            'div' => 'flex items-center justify-center shadow-md rounded-lg bg-orange-200 shadow-orange-400',
            'span' => 'py-1 px-3 rounded-full font-bold text-sm text-orange-600',
        ],
        'Unpaid' => [
            'div' => 'flex items-center justify-center shadow-md rounded-lg bg-yellow-200 shadow-yellow-400',
            'span' => 'py-1 px-3 rounded-full font-bold text-sm text-yellow-600',
        ],
        'Completed' => [
            'div' => 'flex items-center justify-center shadow-md rounded-lg bg-green-200 shadow-green-300',
            'span' => 'py-1 px-3 rounded-full font-bold text-sm text-green-600',
        ],
    ];


}

class OrderMessageConstants {
    const ORDER_STATUS_MESSAGE = [
        'Unpaid' => 'Please complete your checkout!',
        'Pending' => 'Thank you for ordering, your order will be processed by the restaurant soon!',
        'Cancelled' => 'Your order has been cancelled. If it is a mistake please place an order again or contact the restaurant!',
        'Delivery' => 'Your order is out for delivery!',
        'Completed' => 'Your order is delivered and completed!',
        'Failed' => 'Your order is mark as a failed order by the restaurant!'
    ];
}

class OrderActionConstants {
    const ORDER_ACTIONS = [
        'Pending' => [
            'Show' => 'show',
            'Cancel' => 'cancel',
            'Confirm' => 'confirm'
        ],
        'Unpaid' => [
            'Show' => 'show',
            'Cancel' => 'cancel',
        ],
        'Cancelled' => [
            'Show' => 'show',
        ],
        'Delivery' => [
            'Show' => 'show',
            'Complete' => 'complete',
            'Fail' => 'fail',
        ],
        'Completed' => [
            'Show' => 'show',
        ],
        'Failed' => [
            'Show' => 'show',
        ]
    ];

    const USER_ORDER_ACTIONS = [
        'Pending' => [
            'Show' => 'show',
            'Cancel' => 'cancel',
        ],
        'Unpaid' => [
            'Show' => 'show',
            'Cancel' => 'cancel',
        ],
        'Cancelled' => [
            'Show' => 'show',
        ],
        'Delivery' => [
            'Show' => 'show',
        ],
        'Completed' => [
            'Show' => 'show',
        ],
        'Failed' => [
            'Show' => 'show',
        ]
    ];
}
