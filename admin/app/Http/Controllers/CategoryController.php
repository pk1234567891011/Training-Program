<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Category;
use App\Product_attributes;
use App\Product_attribute_values;
use App\Product;
use App\Product_images;
use App\Product_categories;
use App\Product_attributes_assoc;
class CategoryController extends Controller
{
/**
* Display a listing of the resource.
*
* @return \Illuminate\Http\Response
*/
public function index()
{
$category= Category::latest()->paginate();
$categories=DB::table('category as c1')
->select('c1.id','c1.name','c1.status','c1.parent_id','c2.name as parent_name')
->join('category as c2','c1.parent_id','=','c2.id')

->get();

$categorys=DB::table('category')
          ->select('*')
          ->where('parent_id','=','0')
          ->get();


return view('category.index',compact('categories','categorys','category','category'));

}

/**
* Show the form for creating a new resource.
*
* @return \Illuminate\Http\Response
*/
public function create()
{
$category=Category::all();
return view('category.create',compact('category'));
}

/**
* Store a newly created resource in storage.
*
* @param \Illuminate\Http\Request $request
* @return \Illuminate\Http\Response
*/
public function store(Request $request)
{
$request->validate([

'name'=>'required',
'status'=>'required',
'parent_id'=>'required'
]);
// $category->parent_id=$request->parent_id;
Category::create($request->all());
return redirect()->route('category.index')->with('success','Category created successfully');
}


/**
* Display the specified resource.
*
* @param int $id
* @return \Illuminate\Http\Response
*/
public function show($id)
{
//
}

/**
* Show the form for editing the specified resource.
*
* @param int $id
* @return \Illuminate\Http\Response
*/
public function edit($id)
{
   

$categories=Category::where('id','=',$id)->first();
$category = Category::find($id); 
$categoryDetails=Category::where('id',$id)->first();
$level=Category::where('parent_id',0)->get();
return view('category.edit',compact('category','categories','categoryDetails','level'));
}

/**
* Update the specified resource in storage.
*
* @param \Illuminate\Http\Request $request
* @param int $id
* @return \Illuminate\Http\Response
*/
public function update(Request $request, $id)
{
$data=$request->all();
    
$category = Category::find($id);
$request->validate([

'name'=>'required',
'status'=>'required'
]);
Category::find($id)->update($request->all());
return redirect()->route('category.index')->with('success','Category updated successfully');
}

/**
* Remove the specified resource from storage.
*
* @param int $id
* @return \Illuminate\Http\Response
*/
public function destroy($id)
{
$category_id=Product_categories::where('category_id',$id)->first();
$product=Product::where('id',$category_id->product_id)->first();
$product_attribute_assoc=Product_attributes_assoc::where('product_id',$product->id)->first();
//$product_attributes=Product_attributes::where('id',$product_attribute_assoc->product_attribute_id)->first();
//$product_attribute_value=Product_attribute_values::where('product_attribute_id',$product_attributes->id)->first();
//Product_attribute_values::where('product_attribute_id',$product_attributes->id)->delete();
//Product_attributes::where('id',$product_attribute_assoc->product_attribute_id)->delete();
Product_attributes_assoc::where('product_id',$product->id)->delete();
Product_categories::where('category_id',$id)->delete();
Product_images::where('product_id',$product->id)->delete();
Category::where('id',$id)->delete();
//Product_attributes_assoc::where('product_id',$product->id)->delete();
Product::where('id',$category_id->product_id)->delete();



return redirect()->route('category.index')->with('success','Category deleted successfully');
}
}