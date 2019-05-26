<?php

return [
    'general' => [
        'shopping-cart' => 'Shopping Cart',
        'find-the-nearest-shop' => 'Find the nearest shop',
        'send-email' => 'Send Email',
        'like-these?' => 'You might like these as well...',
        'filters-panel' => 'Filters Panel',
        'currency' => 'RON',
        'required-field' => 'This field is required!',
        'footer' => [
            'program' => 'Program',
            'program-data' => 'Monday - Saturday: &emsp;8:00 - 18:00<br>
                               Sunday: &emsp;&emsp;&emsp;&emsp;&emsp;&emsp;Closed',
            'email' => 'Email',
            'email-data' => 'booktopia.contact@gmail.com',
            'adress' => 'Adress',
            'adress-data' => 'Bulevardul Vasile Milea 4, Bucuresti',
            'phone' => 'Phone',
            'phone-data' => '+40314 257 513  ||  +40314 257 510',
            'subject' => 'Subject',
            'text' => 'Text',
        ],
    ],
    'actions' => [
        'show' => 'Show',
        'edit' => 'Edit',
        'delete' => 'Delete',
        'save' => 'Save',
        'update' => 'Update',
        'checkout' => 'Checkout',
        'cancel' => 'Cancel',
        'send' => 'Send',
        'find' => 'Find',
        'use' => 'Use',
        'accept' => 'Accept',
        'deny' => 'Deny',
    ],
    'control-panel' => [
        'shop' => 'Go to Shop',
        'users' => 'Manage users',
        'books' => 'Manage books',
        'categories' => 'Manage products categories',
        'offers' => 'Manage offers',
        'stocks' => 'Manage stocks',
        'requirements' => 'Manage requirements',
    ],
    'book' => [
        'title' => 'Title',
        'author' => 'Author',
        'publishing_house' => 'Publishing House',
        'description' => 'Description',
        'photo' => 'Photo',
        'price' => 'Price',
        'quantity' => 'Quantity',
        'placeholders' => [
            'title' => 'Ex: title example',
            'author' => 'Ex: author example',
            'publishing_house' => 'Ex: publishing house example',
            'description' => 'Ex: description example',
            'price' => 'Ex: 99.99 Ron',
        ],
        'tooltips' => [
            'photo' => "This field is not required. You can change the cover photo later.",
            'description' => "This field is required and need to have at least 30 characters",
        ],
        'drag-and-drop' => [
            'first-part' => 'To select a book cover browse through your files',
            'second-part' => 'or drag and drop in the area on the right',
        ],
        'actions' => [
            'add' => 'Add a new book',
            'delete' => 'Delete book',
            'add-to-cart' => 'Add to cart',
            'add-to-wishlist' => 'Add to wishlist',
            'give-me-a-sample' => 'Give me a sample',
            'see-details' => 'See details',
            'exportExcel-books' => 'Export books (XLSX)',
            'exportPDF-books' => 'Export books (PDF)',
            'import-from-CSV' => 'Import from CSV',
        ],
        'forms' => [
            'create' => 'Create new book',
            'edit' => 'Edit book',
        ],
        'add-success' => 'The book was successfully created!',
        'add-error' => 'The book creation failed!',
        'edit-success' => 'The book was successfully updated!',
        'edit-error' => 'The book update failed!',
        'delete-success' => 'The book was deleted!',
        'delete-error' => 'The book deletion failed!',
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
        'add-success' => 'The category was successfully created!',
        'add-error' => 'The category creation failed!',
        'edit-success' => 'The category was successfully updated!',
        'edit-error' => 'The category update failed!',
        'delete-success' => 'The category was deleted!',
        'delete-error' => 'The category deletion failed!',
    ],
    'comment' => [
        'comments' => 'Comments',
        'actions' => [
            'add' => 'Add a comment',
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
    'profile' => [
        'profiles' => 'Profiles',
        'wishlist' => 'Wishlist',
        'wallet' => 'Booktopia points',
        'purchase_history' => 'Purchase history',
        'first_name' => 'First Name',
        'last_name' => 'Last Name',
        'phone' => 'Phone',
        'adress' => 'Adress',
        'photo' => 'Photo',
    ],
    'invoice' => [
        'payment_method' => 'Payment method',
        'date' => 'Date',
        'billing_address' => 'Billing address',
        'delivery_address' => 'Delivery address',
        'total_price' => 'Total price',
        'cancel_order_possible' => 'Mesaj cand se poate anula comanda!',
        'cancel_order_notpossible' => 'Mesaj cand NU se poate anula comanda!',
    ],
    'requirement' => [
        'requirements' => 'Requirements',
        'partner-id' => 'Partner ID',
        'partner-name' => 'Partner Name',
        'book-id' => 'Book ID',
        'book-title' => 'Book Title',
    ],
    'stock' => [
        'stocks' => 'Stocks',
        'plus-minus-quantity' => 'Value to update quantity',
        'positive-or-negative-value' => 'Positive or negative value',
        'tooltips' => [
            'positive-or-negative-value' => 'The value below will be added to the curent quantity, 
                                             meaning that this value could either decrease or increase the quantity.'
        ],
        'update-success' => 'The stock was successfully updated!',
        'update-error' => 'Error on updating stock!',
    ]
];