<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Product;
use App\Post;
use DB;
use File;
use Image;
use Illuminate\Support\Facades\Input;
class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $product=Product::join('posts', 'product.CID', '=', 'posts.id')
            ->select('product.*','posts.C_name as category')
            ->latest()->paginate(2);
          
        return view('product.index',compact('product'));
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
        $posts=Post::orderBy('C_name', 'desc')->get();
        $posts=Post::all();
        return view('product.create')->with('posts', $posts);
          
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate([
            'name'=>'required|unique:product|regex:/^[a-zA-Z\s]+$/',
            'price'=>'required|regex:/^\d+(\.\d{1,2})?$/',
            'CID'=>'required',
            'image' =>'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048'
        ]);
        $product= new Product();
        if( $request->hasFile('image')) {
            $image = $request->file('image');
            $filename = time() . rand().'.' . $image->getClientOriginalExtension();
            $path = '/product_image/'.$filename;

            $destinationpath = public_path(). '/product_image/';
            $image->move($destinationpath, $filename);
            $product->image = $path;
            $product->name = $request->name;
            $product->price = $request->price;
            $product->CID = $request->CID;
        }
        $product->save();
        
    
        return redirect()->route('product.index')->with('success','Product added successfully');
    }
    public function search(Request $request){
        $search=$request->search;
        
        $product=Product::where('name','like','%'.$search.'%')->paginate(10);
        return view('product.index',compact('product'));

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
        $posts=Post::all();
        $product = Product::find($id);
        return view('product.edit',compact('product','posts'));
      
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
        request()->validate([
            'name'=>'required|regex:/^[a-zA-Z\s]+$/',
            'price'=>'required|regex:/^\d+(\.\d{1,2})?$/',
            'CID'=>'required',
             'image' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048'
        ]);
        $product= Product::find($id);
        if($request->hasFile('image'))
        {
           
            $userImage = public_path().$product->image;
            
            
            if (File::exists($userImage)) 
            { 
                 unlink($userImage);
    
               
            }

            $image = Input::file('image');

            $filename = time() . rand().'.' . $image->getClientOriginalExtension();
            $path = '/product_image/'.$filename;

            $destinationpath = public_path(). '/product_image/';

            $image->move($destinationpath, $filename);
            $product->image = $path;
            $product->save();
        }
        $product->name = $request->name;
        $product->price = $request->price;
        $product->CID = $request->CID;
        $product->save();
        return redirect()->route('product.index')->with('success','Product updated successfully');
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $image = Product::where('id', $id)->first();
        $file= $image->image;
        $filename = public_path().$file;
        \File::delete($filename);
        Product::find($id)->delete();
        return redirect()->route('product.index')->with('success','Product deleted successfully');
    }
    public function deleteAll(Request $request)
    {
        $ids = $request->ids;
        Product::whereIn('id',explode(",",$ids))->delete();
        return response()->json(['success'=>"product deleted successfully."]);
    }
    
}

