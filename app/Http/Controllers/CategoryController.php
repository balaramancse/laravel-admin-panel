<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Category;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categorys = Category::get(); 
        return view('admin.category.index',compact('categorys'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
        return view('admin.category.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
            $categoryfile = new Category(); 
            $request->validate([
            'category_name'    =>  'required',         
            'image'        =>  'required|image|mimes:jpeg,png,jpg,gif|max:2048'
        ]);
        if ($request->hasFile('image')){
            $file = $request->file('image');
            $extension = $file->getClientOriginalExtension(); // you can also use file name
             $fileName = time().'.'.$extension;
             $path = public_path().'/upload';
             $uplaod = $file->move($path,$fileName);           
         }
         
          $category_name = Category::where('category_name', '=', $request->input('category_name'))->first();
          if ($category_name === null) {
                $categoryfile->category_name = $request->input('category_name');
                $categoryfile->category_slug = $request->input('category_slug');
                $categoryfile->category_image = $fileName;
                $categoryfile->save();
                return redirect('admin/category')->with(['message' => 'Record Inserted Successfully !!', 'alert' => 'alert-success']);
            } else {
            return redirect('admin/category')->with(['error' => 'Category name already exists !', 'alert' => 'alert-success']);
            }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return 34534;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return 1;
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
        $post = Category::find($id);
        $post->delete();
        return redirect('admin/category')->with(['error' => 'Record has been successfully deleted', 'alert' => 'alert-success']);
         
    }

    public function changeStatus(Request $request)
    {
        $user = Category::find($request->cat_id);
        $user->status = $request->status;
        $user->save();
  
        return response()->json(['success'=>'Status change successfully.']);
    }



    
}
