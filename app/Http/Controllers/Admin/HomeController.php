<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;
class HomeController extends Controller
{
    public function dashboard(){
        $data = count(DB::table('books')->get());
        return view('admin/home')->with('data', $data);
    }
    public function book(){
        $data = DB::table('books')->get();
        return view('admin/books')->with('data', $data);
    }
    public function add_books(Request $request){
        $request->validate([
            'title'=>'required',
            'author'=>'required', 
            'price'=>'required', 
            'isbn'=>'required', 
            'language'=>'required',
            'genre'=>'required',
            'description'=>'required',
            'freechapter'=>'required',
            'image'=>'required|mimes:jpg,jpeg,gif,svg,png',
        ]);

        if($request->hasFile('image')){
            $image = $request->file('image');
            $filename = md5(time()).'.'.$image->getClientOriginalExtension();
            $image->move(public_path('book_images'),$filename);

            $save = DB::table('books')->insert([
                'title'=>$request->title,
                'book_code'=>'BOOK_'.rand(111111,999999),
                'category_id'=>rand(11111,99999),
                'author'=>$request->author,
                'price'=>$request->price,
                'isbn'=>$request->isbn, 
                'language'=>$request->language,
                'genre'=>$request->genre,
                'description'=>$request->description,
                'free_chapter'=>$request->freechapter,
                'format'=>$request->format,
                'cover_image'=>$filename,
            ]);
            
            if($save){
                return back()->with('message', 'Book Added Successfully');
            }
        }
 
    }
    public function edit($id){
        $data = DB::table('books')->where('book_id', $id)->get();
        return view('admin/edit-book')->with('data', $data);
    }
    
    public function update(Request $request){ 
        

        $request->validate([
            'title'=>'required',
            'author'=>'required', 
            'price'=>'required', 
            'isbn'=>'required', 
            'language'=>'required',
            'genre'=>'required',
            'description'=>'required',
            'freechapter'=>'required',
             
        ]);

           $id = $request->id;

        if($request->hasFile('image')){
            $image = $request->file('image');
            $filename = md5(time()).'.'.$image->getClientOriginalExtension();
            $image->move(public_path('book_images'),$filename);

            $save = DB::table('books')->where('book_id', $id)->update([
                'title'=>$request->title,
                 
                'category_id'=>rand(11111,99999),
                'author'=>$request->author,
                'price'=>$request->price,
                'isbn'=>$request->isbn, 
                'language'=>$request->language,
                'genre'=>$request->genre,
                'description'=>$request->description,
                'free_chapter'=>$request->freechapter,
                'format'=>$request->format,
                'cover_image'=>$filename,
            ]);
            
            if($save){
                return back()->with('message', 'Book Updated Successfully');
            } else {
                echo 0;
            }
        }
    }

    public function delete($id){
        $data = DB::table('books')->where('book_id', $id)->delete();
        return back()->with('message', 'Book Deleted Successfully');
    }
}
