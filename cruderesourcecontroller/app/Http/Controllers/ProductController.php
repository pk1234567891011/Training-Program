<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
use App\Post;
use DB;
class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       $product=DB::table('product')
            ->join('posts', 'product.CID', '=', 'posts.id')
            ->select('product.*','posts.C_name as category')
             ->latest()->paginate(2);
            // return view('product.index', compact('products'));
        // $product=Product::latest()->paginate(2);
        return view('product.index',compact('product'))->with('i',(request()->input('page',1)-1)*2);
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
          return view('product.create')
                ->with('posts', $posts);
            // return view('product.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        request()->validate([
            'name'=>'required|unique:product|regex:/^[a-zA-Z\s]+$/',
             'price'=>'required|regex:/^\d+(\.\d{1,2})?$/',
             'CID'=>'required'
             // 'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048'
             ]);
            $product = new Product($request->input()) ;
     
         if($file = $request->hasFile('image')) {
            
            $file = $request->file('image') ;
            
            $fileName = $file->getClientOriginalName() ;
            $destinationPath = public_path().'/images/' ;
            $file->move($destinationPath,$fileName);
            $product->image = $fileName ;
        }
        // else
        // {
            // return view('product.create');
            // $product->image='';
        // }
        Product::create($request->all());
        return redirect()->route('product.index')->with('success','Product created successfully');
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
    {         $product = Product::find($id);
        request()->validate([
            'name'=>'required',
            'price'=>'required|numeric',
            'CID'=>'required',
            'image'=>''

    ]);
            $product = new Product($request->input()) ;
     
         if($file = $request->hasFile('image')) {
            
            $file = $request->file('image') ;
            
            $fileName = $file->getClientOriginalName() ;
            $destinationPath = public_path().'/images/' ;
            $file->move($destinationPath,$fileName);
            $product->image = $fileName ;
        }
        else
        {
           
        }
        Product::find($id)->update($request->all());
        return redirect()->route('product.index')->with('success','product updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
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
