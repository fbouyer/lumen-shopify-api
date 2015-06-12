<?php namespace App\Http\Controllers;

/**
 * Created by PhpStorm.
 * User: francoisbouyer
 * Date: 4/24/15
 * Time: 3:20 PM
 */

use Illuminate\Http\Request;
use Illuminate\Http\Response;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use phpish\shopify;

class ExampleController extends Controller
{

    public function createProducts(Request $request)
    {
        // Initialize the Shopify API Client
        $shopify = shopify\client(env('SHOPIFY_SHOP'), env('SHOPIFY_API_KEY'), env('SHOPIFY_PASSWORD'), true);

        # Making an API request can throw an exception
        try {

            // Product and its variants data
            $productData = [
                'product' => [
                    "title" => 'T-Shirt',
                    "body_html" => 'This is a great T-Shirt!',
                    "vendor" => 'Awesome Company',
                    "options" => [
                        ['name' => 'Color'],
                        ['name' => 'Size']
                    ],
                    "published" => true,
                    "variants" => [
                        [
                            'price' => 35,
                            'sku' => 'blue-tshirt',
                            'inventory_management' => 'shopify',
                            'inventory_quantity' => 10,
                            'option1' => 'Blue',
                            'option2' => 'Large'
                        ],
                        [
                            'price' => 30,
                            'sku' => 'red-small-tshirt',
                            'inventory_management' => 'shopify',
                            'inventory_quantity' => 10,
                            'option1' => 'Red',
                            'option2' => 'Small'
                        ]
                    ]
                ]
            ];

            // Make a POST call to the Products endpoint of the Shopify API
            // with our product data automatically JSON encoded.
            // It will return a JSON response of the product created or an error
            $product = $shopify('POST /admin/products.json', [], $productData);

            return $product;

        } catch (shopify\ApiException $e) {
            # HTTP status code was >= 400 or response contained the key 'errors'
            Log::error('Product creation error - Shopify ApiException: ' . $e->getMessage() . ' ||| ' . print_r($e->getRequest(), true));
        } catch (shopify\CurlException $e) {
            # cURL error
            Log::error('Product creation error - Shopify CurlException: ' . $e->getMessage() . ' ||| '. print_r($e->getRequest(), true) . ' ||| ' . print_r($e->getResponse(), true));
        } catch (Exception $e) {
            Log::error('Product creation error - Error: ' . $e->getMessage());
        }

    }
}