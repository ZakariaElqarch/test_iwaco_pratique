<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use GuzzleHttp\Client;
use App\Models\Product;

class ShopifyController extends Controller
{
    public function index(Request $request)
    {
        // Replace with your Shopify store credentials
        $shopifyStore = env('SHOPIFY_STORE');
        $accessToken = env('ACCESS_TOKEN'); // Replace this with your actual API access token

        // Make a request to Shopify's API to get products
        $client = new Client();
        $response = $client->get("https://$shopifyStore/admin/api/2024-04/products.json", [
            'headers' => [
                'X-Shopify-Access-Token' => $accessToken
            ]
        ]);

        $products = json_decode($response->getBody(), true)['products'];

        // Store each product in the database
        foreach ($products as $shopifyProduct) {
            $product = new Product();
            $product->title = $shopifyProduct['title'];
            $product->description = strip_tags($shopifyProduct['body_html']); // Remove HTML tags from description
            $product->price = $shopifyProduct['variants'][0]['price'];
            $product->quantity = 0; // You might want to set a default quantity or leave it as 0
            $product->image = $shopifyProduct['image']['src'];

            $product->save();
        }

        return redirect()->route('products.index')->with('success', 'Products fetched and stored successfully');
    }
}
