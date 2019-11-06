<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Post;
use App\Product;
class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts=Post::latest()->paginate(2);
        return view('posts.index',compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('posts.create');
    }

    public function search(Request $request)
    {
        
        $search=$request->search;
        $posts=Post::where('C_name','like','%'.$search.'%')->paginate(10);
        return view('posts.index',compact('posts'));

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
          
            'C_name'=>'required|unique:posts|regex:/^[a-zA-Z\s]+$/' 

        ]);
        Post::create($request->all());
        return redirect()->route('posts.index')->with('success','category created successfully');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        
       
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $post = Post::find($id);
        return view('posts.edit',compact('post'));
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
            
            'C_name'=>'required||unique:posts|regex:/^[a-zA-Z\s]+$/'

        ]);
        Post::find($id)->update($request->all());
        return redirect()->route('posts.index')->with('success','category updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {  
        $category=Post::find($id);

        Product::whereIn('CID', $category->pluck('id'))->delete();

        Post::find($id)->delete();
        return redirect()->route('posts.index')->with('success','category deleted successfully');
    }
    public function deleteAll(Request $request)

    {

        $ids = $request->ids;
        Product::whereIn('CID',explode(",",$ids))->delete();

        Post::whereIn('id',explode(",",$ids))->delete();

        return response()->json(['success'=>"category Deleted successfully."]);

    }
}
