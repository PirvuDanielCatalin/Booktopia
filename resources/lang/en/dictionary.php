<?php

return [
    'general' => [
        'shopping-cart' => 'Shopping Cart',
    ],
    'actions' => [
        'show' => 'Show',
        'edit' => 'Edit',
        'delete' => 'Delete',
        'save' => 'Save',
        'update' => 'Update',
        'checkout' => 'Checkout',
        'cancel' => 'Cancel',
    ],
    'control-panel' => [
        'users' => 'Manage users',
        'books' => 'Manage books',
        'categories' => 'Manage products categories',
        'offers' => 'Manage offers',
    ],
    'book' => [
        'title' => 'Title',
        'author' => 'Author',
        'publishing_house' => 'Publishing House',
        'description' => 'Description',
        'photo' => 'Photo',
        'price' => 'Price',
        'quantity' => 'Quantity',
        'actions' => [
            'add' => 'Add a new book',
            'add-to-cart' => 'Add to cart',
            'see-details' => 'See details',
            'exportExcel-books' => 'Export books (XLSX)',
            'exportPDF-books' => 'Export books (PDF)',
        ]
    ],
    'user' => [
        'name' => 'Name',
        'email' => 'Email',
        'role' => 'Role',
        'actions' => [
            'update-users-roles' => 'Update users roles',
            'exportExcel-users' => 'Export users (XLSX)',
            'exportPDF-users' => 'Export users (PDF)',
        ],
    ],
    'category' => [
        'categories' => 'Categories',
        'name' => 'Name',
        'actions' => [
            'add' => 'Add Category',
            'delete' => 'Delete Category',

        ],
    ],
    'offer' => [
        'offers' => 'Offers',
        'name' => 'Name',
        'old-price' => 'Old Price',
        'new-price' => 'New Price',
        'sale' => 'Sale',
        'actions' => [
            'add' => 'Add Offer',
            'delete' => 'Delete Offer',
        ],
    ],
];