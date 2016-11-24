<?php


/**
 * ROUTES
 */

// Public
$router->map('GET', '/', 'App\Controllers\HomeController#index');
$router->map('GET', '/quote-[a:quote_hash]', 'App\Controllers\QuotesController#displayQuoteComplete');
$router->map('GET', '/quote', 'App\Controllers\QuotesController#displayQuoteForm');

// Admin
$router->map('GET', '/admin', 'App\Controllers\AdminController#displayDashboard');
$router->map('GET', '/admin-quotes', 'App\Controllers\AdminController#displayQuotes');
$router->map('GET', '/admin-users', 'App\Controllers\AdminController#displayUsers');
$router->map('GET', '/admin-products', 'App\Controllers\AdminController#displayProducts');


/**
 * API
 */

// Quotes
$router->map('POST', '/api/quote/submit', 'App\Controllers\QuotesController#submitQuote');

// Subscriptions
$router->map('GET', '/api/products/subscriptions', 'App\Controllers\SubscriptionsController#listSubscriptions');

// Services
$router->map('GET', '/api/products/services', 'App\Controllers\ServicesController#listServices');
$router->map('GET', '/api/products/services/workdays', 'App\Controllers\ServicesController#listAvailableWorkdays');
$router->map('GET', '/api/products/services/hours', 'App\Controllers\ServicesController#listAvailableHours');

// Goods
$router->map('GET', '/api/products/goods', 'App\Controllers\GoodsController#listGoods');


/**
 * Database Builder (for development purposes only!)
 */

// Build
$router->map('GET', '/database/build', 'App\Controllers\DatabaseController#buildAll');

// Destroy
$router->map('GET', '/database/destroy', 'App\Controllers\DatabaseController#destroyAll');
