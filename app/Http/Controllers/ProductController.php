<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProductController extends Controller
{
    private static $products = [
        ['id'=> 1,'libelle' => 'iPhone 13 Pro Max', 'marque' => 'Apple', 'prix' => '1,980.00$', 'stock' => '10', 'image'=>''],
        ['id'=> 2,'libelle' => 'iPhone 12 Pro Max', 'marque' => 'Apple', 'prix' => '1,800.00$', 'stock' => '15', 'image'=>''],
        ['id'=> 3,'libelle' => 'iPhone 11', 'marque' => 'Apple', 'prix' => '1,680.00$', 'stock' => '20', 'image'=>''],
    ];
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $products = self::$products;
        return view('products.index', compact('products'));
        // $products = Product::all();
        // dd($products);
      
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('products.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

    public function store(Request $request)
    {
        $request->validate([
            'libelle' => 'required',
            'marque' => 'required',
            'prix' => 'required',
            'stock' => 'required|integer',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048', 
        ]);
    
        $newProduct = [
            'libelle' => $request->input('libelle'),
            'marque' => $request->input('marque'),
            'prix' => $request->input('prix'),
            'stock' => $request->input('stock'),
            'image' => $request->input('image'),
        ];
    
       
        self::$products[] = $newProduct;
    
       
        return redirect()->route('products.index')->with('success', 'Product created successfully.');
    }
    


    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
{

    $product = collect(self::$products)->firstWhere('id', $id);

    if ($product) {
        return view('products.show', compact('product'));
    } else {
        return redirect()->route('products.index')->with('error', 'Product not found.');
    }
}

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
{
    $product = collect(self::$products)->firstWhere('id', $id);

    if ($product) {
        return view('products.edit', compact('product'));
    } else {
       
        return redirect()->route('products.index')->with('error', 'Product not found.');
    }
}


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
{
    $request->validate([
        'libelle' => 'required',
        'marque' => 'required',
        'prix' => 'required',
        'stock' => 'required|integer',
        'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048', 
    ]);

   
    $productKey = array_search($id, array_column(self::$products, 'id'));

    if ($productKey !== false) {
       
        self::$products[$productKey]['libelle'] = $request->input('libelle');
        self::$products[$productKey]['marque'] = $request->input('marque');
        self::$products[$productKey]['prix'] = $request->input('prix');
        self::$products[$productKey]['stock'] = $request->input('stock');
        dd(self::$products);
      
        return redirect()->route('products.index')->with('success', 'Product updated successfully.');
 
    } else {
        return redirect()->route('products.index')->with('error', 'Product not found.');
    }
}


    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
{
    $productKey = array_search($id, array_column(self::$products, 'id'));

    if ($productKey !== false) {
        array_splice(self::$products, $productKey, 1);

        return redirect()->route('products.index')->with('success', 'Product deleted successfully.');
    } else {
        return redirect()->route('products.index')->with('error', 'Product not found.');
    }
}

}
