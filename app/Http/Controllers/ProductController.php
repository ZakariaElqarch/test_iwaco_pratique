<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use Illuminate\Support\Facades\Validator;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $products = Product::all();
        return view('products.index', ['products' => $products]); // Ensure 'products' is passed to the view
    }


    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('products.create'); // Affiche le formulaire de création de produit
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Valide les données du formulaire
        $request->validate([
            'title' => 'required',
            'description' => 'required',
            'price' => 'required|numeric',
            // 'image' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048', // Exemple de validation pour les images
            'quantity' => 'required|integer'
        ]);

        // Crée un nouveau produit avec les données du formulaire
        $product = new Product();
        $product->title = $request->title;
        $product->description = $request->description;
        $product->price = $request->price;
        $product->quantity = $request->quantity;
        $product->image = $request->image;

        // // Gestion de l'image si elle est fournie
        // if ($request->hasFile('image')) {
        //     $image = $request->file('image');
        //     $imageName = time() . '_' . $image->getClientOriginalName();
        //     $image->move(public_path('images/products'), $imageName);
        //     $product->image = $imageName;
        // }

        $product->save(); // Enregistre le produit dans la base de données

        return redirect()->route('products.index')->with('success', 'Product created successfully'); // Redirige vers la liste des produits avec un message de succès

    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $product = Product::findOrFail($id); // Récupère le produit spécifié par son ID
        return view('products.show', ['product' => $product]); // Affiche la vue avec les détails du produit

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $product = Product::findOrFail($id); // Récupère le produit spécifié par son ID
        return view('products.edit', ['product' => $product]); // Affiche le formulaire de modification de produit

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        // Valide les données du formulaire
        $validator = Validator::make($request->all(), [
            'title' => 'required',
            'description' => 'required',
            'price' => 'required|numeric',
            // 'image' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'quantity' => 'required|integer'
        ]);
        // Check if validation fails
        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 422); // Return validation errors with status code 422
        }
        $product = Product::findOrFail($id); // Récupère le produit spécifié par son ID
        $product->title = $request->title;
        $product->description = $request->description;
        $product->price = $request->price;
        $product->quantity = $request->quantity;
        $product->image = $request->image;

        // Gestion de l'image si elle est fournie
        // if ($request->hasFile('image')) {
        //     $image = $request->file('image');
        //     $imageName = time() . '_' . $image->getClientOriginalName();
        //     $image->move(public_path('images/products'), $imageName);
        //     $product->image = $imageName;
        // }

        $product->save(); // Met à jour le produit dans la base de données

        return redirect()->route('products.index')->with('success', 'Product updated successfully'); // Redirige vers la liste des produits avec un message de succès

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $product = Product::findOrFail($id); // Récupère le produit spécifié par son ID
        $product->delete(); // Supprime le produit de la base de données
        return redirect()->route('products.index')->with('success', 'Product deleted successfully'); // Redirige vers la liste des produits avec un message de succès
    }
}
