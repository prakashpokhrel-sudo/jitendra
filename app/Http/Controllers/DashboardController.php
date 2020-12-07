<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Product;
use DB;
class DashboardController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $data=['category'=>Category::simplePaginate(10)
      
      ]; 
        return view('Admin.category.manage',$data);

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
    $validateData= $request->validate([
'category_name'=>'required|unique:categories|max:255',
]);

$categories= Category::where('category_name', $request->input('category_name'))->first();


   $category = new Category();

if (!$categories) 
{
    $category->category_name = $request->input('category_name');
    $category->save();
    return redirect()->back()->with('status','The'.$category->category_name.'Category has been saved successfully');
}
else
{

return redirect()->back()->with('status1','The' .$request->input('category_name').'Category already exist');

}
    }
public function deletecategory( $id)
{
DB::table('categories')->where('id',$id)->delete();
return redirect()->back();
}


  public function editcategory(Request $request, Category $category)
  {

 

 $categories=$request->input('category_name');

 $category->category_name=$categories;

 $category->save();

return redirect()->back();

  }






    public function productindex()
    {

$category1=DB::table('categories')->get();
$products= DB::table('products')
                   ->join('categories','products.category_id','categories.id')
                   ->select('products.*','categories.category_name')
                   ->simplePaginate(10);


     return view('Admin.product.manage',compact('category1','products'));
    }

public function addproduct(Request $request){



   
$data=array();
  $data['product_name']=$request->product_name;
  $data['product_price']=$request->product_price;
  $data['category_id']=$request->category_id;
  $photo=$request->file('product_image');


  if($photo)

{


$getuniquename = sha1($photo->getClientOriginalName().time());
        $getextension = $photo->getClientOriginalExtension();
        $getrealname = $getuniquename.'.'.$getextension;
        $photo->move('images/products',$getrealname);

$data['product_image']=$getrealname;
$data['status']=1;
DB::table('products')->insert($data);
return redirect()->back();

}

else
{
$data['product_image']='';
DB::table('products')->insert($data);
return redirect()->back();
    
} 



}

public function productinactive($status){

DB::table('products')->where('id',$status)->update(['status'=>0]);

return Redirect()->back();

}
public function productactive($status){

DB::table('products')->where('id',$status)->update(['status'=>1]);

return Redirect()->back();

}
public function productdelete($product){

$products=DB::table('products')->where('id',$product)->first();

$photo=$products->product_image;

if($photo)
{
unlink('images/products/'.$photo);

DB::table('products')->where('id',$product)->delete();

return redirect()->back();
}

else
{
DB::table('products')->where('id',$product)->delete();
return redirect()->back();
}  
}

public function productedit(Request $request, $product){

$data=array();
  $data['product_name']=$request->product_name;
  $data['product_price']=$request->product_price;
  $data['category_id']=$request->category_id;
  $photo=$request->file('product_image');

$productedit = DB::table('products')->where('id',$product)->first();
 
  if($photo)

{

unlink('images/products/'.$productedit->product_image);
$getuniquename = sha1($photo->getClientOriginalName().time());
        $getextension = $photo->getClientOriginalExtension();
        $getrealname = $getuniquename.'.'.$getextension;
        $photo->move('images/products',$getrealname);

$data['product_image']=$getrealname;
$data['status']=1;
DB::table('products')->where('id',$product)->update($data);
return redirect()->back();

}

else
{

DB::table('products')->where('id',$product)->update($data);
return redirect()->back();
    
} 

}
//Shop setting

public function storeinformation(){
    
$setting=DB::table('sitesetting')->first();

return view('Admin.ShopSetting.store_info',compact('setting'));

}

public function updatestoreinformation(Request $request)
{
$id=$request->id;
$data=array();
$data['phone_one'] = $request->phone_one;
$data['phone_two'] = $request->phone_two;
$data['email'] = $request->email;
$data['company_name'] = $request->company_name;
$data['company_address'] = $request->company_address;
$data['title'] = $request->title;
$data['facebook'] = $request->facebook;
$data['youtube'] = $request->youtube;
$data['instagram'] = $request->instagram;
$data['twitter'] = $request->twitter;

DB::table('sitesetting')->where('id',$id)->update($data);

return redirect()->back();


}


 public function blog_category()
 {
$blog = DB::table('post_category')->simplePaginate(10);

    return view('Admin.Content.blog.category.blog_category',compact('blog'));
 }

public function storeblog(Request $request){

$validateData = $request->validate([
'category_name_en' => 'required|max:255',
'category_name_np' => 'required|max:255',


]);

$data = array();
$data['category_name_en']=$request->category_name_en;

$data['category_name_np']=$request->category_name_np;

DB::table('post_category')->insert($data);

return redirect()->back();

}
public function deleteblog($id){



DB::table('post_category')->where('id',$id)->delete();

return redirect()->back();
}

public function editblog(Request $request, $id)
{

$data=array();
$data['category_name_en']=$request->category_name_en;
$data['category_name_np']=$request->category_name_np;
DB::table('post_category')->where('id',$id)->update($data);



}

public function addblogmanage(){


$Addblog=DB::table('post_category')->get();
    return view('Admin.Content.blog.create',compact('Addblog'));
}
public function storeaddblog(Request $request)
{

$data=array();
$data['post_title_en']=$request->post_title_en;
$data['post_title_np']=$request->post_title_np;
$data['category_id']=$request->category_id;
$data['details_en']=$request->details_en;
$data['details_np']=$request->details_np;

$photo =$request->file('post_image');


//for photo
  
  if($photo){  
   $getuniquename = sha1($photo->getClientOriginalName().time());
        $getextension = $photo->getClientOriginalExtension();
        $getrealname = $getuniquename.'.'.$getextension;
        $photo->move('images/blog',$getrealname);

$data['post_image']=$getrealname;

DB::table('posts')->insert($data);
return redirect()->route('post.list');
}
else{
$data['post_image']='';
DB::table('posts')->insert($data);
return redirect()->route('post.list');
    
}

}
public function postlist()
{
$post=DB::table('posts')
          ->join('post_category','posts.category_id','post_category.id')
          ->select('posts.*','post_category.category_name_en')
           ->simplePaginate(5);


return view('Admin.Content.blog.index',compact('post'));
           // return response()->json($post);

}

public function deletepostlist($id)
{

$postdelete = DB::table('posts')->where('id',$id)->first();

$photo=$postdelete->post_image;

if($photo)
{
unlink('images/blog/'.$photo);

DB::table('posts')->where('id',$id)->delete();

return redirect()->back();
}
else
{
DB::table('posts')->where('id',$id)->delete();
return redirect()->back();
}

}

public function editpostlist($id)
{
$post=DB::table('posts')->where('id',$id)->first();
return view('Admin.Content.blog.edit', compact('post'));


}

public function updatepostlist(Request $request,$id)
{


$data=array();
$data['post_title_en']=$request->post_title_en;
$data['post_title_np']=$request->post_title_np;
$data['category_id']=$request->category_id;
$data['details_en']=$request->details_en;
$data['details_np']=$request->details_np;


$postedit = DB::table('posts')->where('id',$id)->first();
$photo =$request->file('post_image');


//for photo
  
  if($photo){ 

  unlink('images/blog/'.$postedit->post_image); 

   $getuniquename = sha1($photo->getClientOriginalName().time());
        $getextension = $photo->getClientOriginalExtension();
        $getrealname = $getuniquename.'.'.$getextension;
        $photo->move('images/blog',$getrealname);

$data['post_image']=$getrealname;

DB::table('posts')->where('id',$id)->update($data);
return redirect()->route('post.list');
}
else{

DB::table('posts')->where('id',$id)->update($data);
return redirect()->route('post.list');
    
}

}

public function ManageSlider()
{

$banner=DB::table('sliders')->get();

return view('Admin.Content.Banner.create',compact('banner'));


}

public function storebanner(Request $request)
{

$data=array();
$data['description1']=$request->description1;
$data['description2']=$request->description2;
$data['status']=1;
$photo =$request->file('slider_image');


//for photo
  
  if($photo){  
   $getuniquename = sha1($photo->getClientOriginalName().time());
        $getextension = $photo->getClientOriginalExtension();
        $getrealname = $getuniquename.'.'.$getextension;
        $photo->move('images/banner',$getrealname);

$data['slider_image']=$getrealname;

DB::table('sliders')->insert($data);
return redirect()->back();
}
else{
$data['post_image']='';
DB::table('sliders')->insert($data);
return redirect()->back();
    
} 
}



public function bannerlist()
{
    $bannerview=DB::table('sliders')->simplePaginate(8);

    return view('Admin.Content.Banner.index',compact('bannerview'));
}




public function editbannerlist
($id)
{
$slider=DB::table('sliders')->where('id',$id)->first();

return view('Admin.Content.Banner.edit', compact('slider'));


}

public function updatebannerlist(Request $request, $id)
{


$data=array();
$data['description1']=$request->description1;
$data['description2']=$request->description2;
$data['status']=1;

$banneredit = DB::table('sliders')->where('id',$id)->first();
$photo =$request->file('slider_image');


//for photo
  
  if($photo){ 

    unlink('images/banner/'.$banneredit->slider_image);
   $getuniquename = sha1($photo->getClientOriginalName().time());
        $getextension = $photo->getClientOriginalExtension();
        $getrealname = $getuniquename.'.'.$getextension;
        $photo->move('images/banner',$getrealname);

$data['slider_image']=$getrealname;

DB::table('sliders')->where('id',$id)->update($data);
return redirect()->route('banner.list');
}
else{

DB::table('sliders')->where('id',$id)->update($data);
return redirect()->route('banner.list');
    
}

}

public function deletebannerlist($id)
{

$bannerdelete = DB::table('sliders')->where('id',$id)->first();

$photo=$bannerdelete->slider_image;

if($photo)
{
unlink('images/banner/'.$photo);

DB::table('sliders')->where('id',$id)->delete();

return redirect()->back();
}
else
{
DB::table('sliders')->where('id',$id)->delete();
return redirect()->back();
}
}

public function bannerinactive($status){

DB::table('sliders')->where('id',$status)->update(['status'=>0]);

return Redirect()->back();

}
public function banneractive($status){

DB::table('sliders')->where('id',$status)->update(['status'=>1]);

return Redirect()->back();

}

public function ManagePage()

{
$page=DB::table('pages')->get();
return view('Admin.Content.pages.create',$page);

}

public function storepage(Request $request)
{

$data=array();
$data['title']=$request->title;
$data['description']=$request->description;
$data['page_image']=$request->page_image;

$data['status']=1;
$photo =$request->file('page_image');


//for photo
  
  if($photo){  
   $getuniquename = sha1($photo->getClientOriginalName().time());
        $getextension = $photo->getClientOriginalExtension();
        $getrealname = $getuniquename.'.'.$getextension;
        $photo->move('images/pages',$getrealname);

$data['page_image']=$getrealname;

DB::table('pages')->insert($data);
return redirect()->back();
}
else{
$data['page_image']='';
DB::table('pages')->insert($data);
return redirect()->back();
    
} 
}

public function pagelist()
{

 $pageview=DB::table('pages')->simplePaginate(5);

return view('Admin.Content.pages.index',compact('pageview'));

}
public function editpagelist($id)
{

$pagedit=DB::table('pages')->where('id',$id)->first();

return view('Admin.Content.pages.edit', compact('pagedit'));
 
}

public function updatepagelist(Request $request, $id)
{

    $data=array();
$data['title']=$request->title;
$data['description']=$request->description;
$data['page_image']=$request->page_image;

$data['status']=1;
$photo =$request->file('page_image');

$pageedit = DB::table('pages')->where('id',$id)->first();

//for photo
  
  if($photo){  
    unlink('images/pages/'.$pageedit->page_image);
   $getuniquename = sha1($photo->getClientOriginalName().time());
        $getextension = $photo->getClientOriginalExtension();
        $getrealname = $getuniquename.'.'.$getextension;
        $photo->move('images/pages',$getrealname);

$data['page_image']=$getrealname;

DB::table('pages')->where('id',$id)->update($data);
return redirect()->route('page.list');
}
else{

DB::table('pages')->where('id',$id)->update($data);
return redirect()->route('page.list');
}
}

public function deletepagelist($id)

{
$pagedelete = DB::table('pages')->where('id',$id)->first();

$photo=$pagedelete->page_image;

if($photo)
{
unlink('images/pages/'.$photo);

DB::table('pages')->where('id',$id)->delete();

return redirect()->back();

}
else
{
DB::table('pages')->where('id',$id)->delete();
return redirect()->back();
}
}

public function pageinactive($status){

DB::table('pages')->where('id',$status)->update(['status'=>0]);

return Redirect()->back();

}
public function pageactive($status){

DB::table('pages')->where('id',$status)->update(['status'=>1]);

return Redirect()->back();

}


//team------------------!

public function ManageTeam()
{

$teammanage=DB::table('teams')->first();

return view('Admin.Content.pages.team.create',compact('teammanage'));

}


public function storeteamimage(Request $request)
{

$data=array();
$data['phone_no'] = $request->phone_no;
$data['name'] = $request->name;
$data['desc'] = $request->desc;

$data['facebook'] = $request->facebook;
$data['youtube'] = $request->youtube;
$data['instagram'] = $request->instagram;
$data['twitter'] = $request->twitter;
$data['status']=1;

$photo =$request->file('team_image');
//for photo
  
  if($photo){ 

    $getuniquename = sha1($photo->getClientOriginalName().time());
        $getextension = $photo->getClientOriginalExtension();
        $getrealname = $getuniquename.'.'.$getextension;
        $photo->move('images/teams',$getrealname);


$data['team_image']=$getrealname;


DB::table('teams')->insert($data);
return redirect()->route('team.list');

}
else{
$data['team_image']='';
DB::table('teams')->insert($data);
return redirect()->route('team.list');
    
} 
}

public function teamlist()
{

$teamlist=DB::table('teams')->simplePaginate(8);
return view('Admin.Content.pages.team.index',compact('teamlist'));
}

public function deleteteamlist($id)
{

$deleteteamlist=DB::table('teams')->where('id',$id)->first();

$photo=$deleteteamlist->team_image;

if($photo)
{
unlink('images/teams/'.$photo);

DB::table('teams')->where('id',$id)->delete();

return redirect()->back();
}

else
{
DB::table('teams')->where('id',$id)->delete();
return redirect()->back();
}

}
public function editteamlist($id)
{

$teammanage=DB::table('teams')->where('id',$id)->first();

return view('Admin.Content.pages.team.edit', compact('teammanage'));
}

public function updateteamlist(Request $request, $id)

{


$data=array();
$data['phone_no'] = $request->phone_no;
$data['name'] = $request->name;
$data['desc'] = $request->desc;

$data['facebook'] = $request->facebook;
$data['youtube'] = $request->youtube;
$data['instagram'] = $request->instagram;
$data['twitter'] = $request->twitter;
$data['status']=1;
$photo =$request->file('team_image');

$pageedit = DB::table('teams')->where('id',$id)->first();

if($photo)
{

unlink('images/teams/'.$pageedit->team_image);
   $getuniquename = sha1($photo->getClientOriginalName().time());
        $getextension = $photo->getClientOriginalExtension();
        $getrealname = $getuniquename.'.'.$getextension;
        $photo->move('images/teams',$getrealname);

$data['team_image']=$getrealname;


DB::table('teams')->where('id',$id)->update($data);
return redirect()->back();
}
else{

DB::table('teams')->where('id',$id)->update($data);
return redirect()->bacK();
}
}
public function teaminactive($status){

DB::table('teams')->where('id',$status)->update(['status'=>0]);

return Redirect()->back();

}
public function teamactive($status){

DB::table('teams')->where('id',$status)->update(['status'=>1]);

return Redirect()->back();

}


public function ManageReview()
{

$reviewmanage=DB::table('reviews')->first();

return view('Admin.Content.pages.review.create',compact('reviewmanage'));


}
public function storereview(Request $request)
{

  $data=array();
  $data['name']=$request->name;
  $data['desc']=$request->desc;
  $data['profile']=$request->profile;
  $photo=$request->file('review_image');
 
  if($photo)
{

$getuniquename = sha1($photo->getClientOriginalName().time());
        $getextension = $photo->getClientOriginalExtension();
        $getrealname = $getuniquename.'.'.$getextension;
        $photo->move('images/reviews',$getrealname);

$data['review_image']=$getrealname;
$data['status']=1;
DB::table('reviews')->insert($data);
return redirect()->route('review.list');

}

else
{
$data['review_image']='';
DB::table('reviews')->insert($data);
return redirect()->route('review.list');
    
} 

}

public function reviewlist()
{
  $reviewlist=DB::table('reviews')->simplePaginate(8);

  return view('Admin.Content.pages.review.index',compact('reviewlist'));
}

public function deletereviewlist($id)
{

$deletereviewlist=DB::table('reviews')->where('id',$id)->first();

$photo=$deletereviewlist->review_image;

if($photo)
{
unlink('images/reviews/'.$photo);

DB::table('reviews')->where('id',$id)->delete();

return redirect()->back();
}

else
{
DB::table('reviews')->where('id',$id)->delete();
return redirect()->back();
}

}

public function editreviewlist($id)
{

  $reviewedit=DB::table('reviews')->where('id',$id)->first();

  return view('Admin.Content.pages.review.edit',compact('reviewedit'));
}


public function updatereviewlist(Request $request,$id)
{
   
 $data=array();
  $data['name']=$request->name;
  $data['desc']=$request->desc;
  $data['profile']=$request->profile;
  $photo=$request->file('review_image');

  $reviewupdate = DB::table('reviews')->where('id',$id)->first();

  if($photo)

{

unlink('images/reviews/'.$reviewupdate->review_image);
$getuniquename = sha1($photo->getClientOriginalName().time());
        $getextension = $photo->getClientOriginalExtension();
        $getrealname = $getuniquename.'.'.$getextension;
        $photo->move('images/reviews',$getrealname);

$data['review_image']=$getrealname;
$data['status']=1;
DB::table('reviews')->where('id',$id)->update($data);
return redirect()->route('review.list');

}

else
{

DB::table('reviews')->where('id',$id)->update($data);
return redirect()->route('review.list');
    
} 
}


public function reviewinactive($status){

DB::table('reviews')->where('id',$status)->update(['status'=>0]);

return Redirect()->back();

}
public function reviewactive($status){

DB::table('reviews')->where('id',$status)->update(['status'=>1]);

return Redirect()->back();

}

public function contactindex()
{
   $contact =DB::table('contacts')->simplePaginate();
return view('Admin.Content.pages.contact.index',compact('contact'));

}

public function viewdetails($id)
{
  $viewdetail=DB::table('contacts')->where('id',$id)->first();

  return view('Admin.Content.pages.contact.view',compact('viewdetail'));
}

public function contactdelete($id)
{

  DB::table('contacts')->where('id',$id)->delete();
  return redirect()->back();

}






public function gallerymanage()
    {

$gallerymanage=DB::table('gallery')->simplePaginate(8);


 return view('Admin.Content.pages.gallery.gallery',compact('gallerymanage'));

    }

public function addgalleryimage(Request $request){

$data=array();
 
 $data['title']=$request->title;
 
$photo=$request->file('gallery_image');
$data['status']=1;

if($photo)

{

$getuniquename = sha1($photo->getClientOriginalName().time());
        $getextension = $photo->getClientOriginalExtension();
        $getrealname = $getuniquename.'.'.$getextension;
        $photo->move('images/gallery',$getrealname);

$data['gallery_image']=$getrealname;

DB::table('gallery')->insert($data);
return redirect()->back();

}

else
{
$data['gallery_image']='';
DB::table('gallery')->insert($data);
return redirect()->back();
    
} 

}

public function galleryimagedelete($id){

$gallery=DB::table('gallery')->where('id',$id)->first();

$photo=$gallery->gallery_image;

if($photo)
{
unlink('images/gallery/'.$photo);

DB::table('gallery')->where('id',$id)->delete();

return redirect()->back();
}

else
{
DB::table('gallery')->where('id',$id)->delete();
return redirect()->back();
}  
}



public function galleryinactive($status){

DB::table('gallery')->where('id',$status)->update(['status'=>0]);

return Redirect()->back();

}
public function galleryactive($status){

DB::table('gallery')->where('id',$status)->update(['status'=>1]);

return Redirect()->back();

}


public function galleryupdate(Request $request, $id){



$data=array();
  $data['title']=$request->title;
 
  $photo=$request->file('gallery_image');

$galleryedit = DB::table('gallery')->where('id',$id)->first();
 
  if($photo)

{

unlink('images/gallery/'.$galleryedit->gallery_image);
$getuniquename = sha1($photo->getClientOriginalName().time());
        $getextension = $photo->getClientOriginalExtension();
        $getrealname = $getuniquename.'.'.$getextension;
        $photo->move('images/gallery',$getrealname);

$data['gallery_image']=$getrealname;
$data['status']=1;
DB::table('gallery')->where('id',$id)->update($data);
return redirect()->back();

}

else
{

DB::table('gallery')->where('id',$id)->update($data);
return redirect()->back();
    
} 

}
}



