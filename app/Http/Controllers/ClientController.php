<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Session;
class ClientController extends Controller

{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
    return view('clientsite.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
        //
    }

    public function blog(){

        $post = DB::table('posts')
                ->join('post_category','posts.category_id','post_category.id')
                ->select('posts.*','post_category.category_name_en','post_category.category_name_np')
                ->get();
              

   return view('clientsite.blog',compact('post'));
    }

public function english()
{

 Session::get('lang'); 
 Session()->forget('lang');
 Session::put('lang','english');  
 return redirect()->back();
}
 public function nepali()
 {
Session::get('lang'); 
 Session()->forget('lang');
 Session::put('lang','nepali');  
 return redirect()->back();
 }

 public function blogsingle($id)
 {

$posts=DB::table('posts')->where('id',$id)->get();
return view('clientsite.blog.blog_single',compact('posts'));



 }

public function aboutus()
{

$page=DB::table('pages')->get();
return view('clientsite.page.aboutus',$page);

}

public function contactus()
{
    DB::table('contacts')->get();
return view('clientsite.contacts.contact');

}

public function contactusform(Request $request)
{

    $data=array();
    $data['name']=$request->name;
    $data['email']=$request->email;
    $data['subject']=$request->subject;
    $data['desc']=$request->desc;

    DB::table('contacts')->insert($data);
 return redirect()->back();


}

public function gallery()
{
    DB::table('gallery')->get();
return view('clientsite.gallery.gallery');

}
}
