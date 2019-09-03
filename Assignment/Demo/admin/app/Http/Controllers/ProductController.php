<?php

namespace App\Http\Controllers;

use App\Product;
use App\Product_images;
use DB;
use Illuminate\Http\Request;
use App\Product_attributes;
use App\Product_attribute_values;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $product = Product::latest()->paginate(2);
        $multiple = Product::has('imgs')->get();
        return view('product.index', compact('product', 'multiple'))->with('i', (request()->input('page', 1) - 1) * 2);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $product = Product::all();
        $attributes = DB::table('product_attributes')->pluck("name","id");
        return view('product.create',compact('attributes'));
    }
    public function myformAjax($id){
        $values = DB::table("product_attribute_values")->where("product_attribute_id",$id)->pluck("attribute_value","id");

        return json_encode($values);

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

            'name' => 'required',
            'sku' => 'required',
            'short_description' => 'required',
            'long_description' => 'required',
            'price' => 'required',
            'special_price' => 'required',
            'special_price_from' => 'required',
            'special_price_to' => 'required',
            'status' => 'required',
            'quantity' => 'required',
            'meta_description' => 'required',
            'meta_title' => 'required',
            'meta_keywords' => 'required',
            'is_featured' => 'required',
        ]);
// $category->parent_id=$request->parent_id;

        Product::create($request->all());
        $user = auth()->user();
        // $rules = [];
        $product = DB::table('product')
            ->select('*')
            ->orderBy('id', 'DESC')->first();

        /*foreach($request->hasFile('names') as $key => $value) {
        $rules["names.{$key}"] = 'required';
        } */
        if ($request->hasFile('names')) {
            $file = $request->file('names');
            foreach ($file as $image) {
                $object = new Product_images();
                $filename = $image->getClientOriginalName();

                $image->move(public_path() . '/products/', $filename);
                $object->image_name = $filename;
                $object->status = $product->status;
                $object->created_by = $user->id;
                $object->product_id = $product->id;
                $object->save();
            }
        }
        /*$validator = Validator::make($request->all(), $rules);

        if ($validator->passes()) {

        foreach($request->input('names') as $key => $value) {

        Product_images::create(['image_name'=>$value,'status'=>$product->status,'created_by'=>$user->id,'product_id'=>$product->id]);
        }

        return redirect()->route('product.index')->with('success', 'Product created successfully');
        }

        return response()->json(['error'=>$validator->errors()->all()]);
         */
        return redirect()->route('product.index')->with('success', 'Product created successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $image = \DB::table('product')->where('id', $id)->first();
        $trial = \DB::table('product_images')->where('product_id', $id)->get();

        foreach ($trial as $image) {

            $file = $image->image_name;
            $filename = public_path() . '/products/' . $file;
            \File::delete($filename);

        }
        Product_images::whereIn('id', $trial->pluck('id'))->delete();
        Product::find($id)->delete();
        return redirect()->route('product.index')->with('success', 'Product deleted successfully');
    }
}
