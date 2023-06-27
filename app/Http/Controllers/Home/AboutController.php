<?php

namespace App\Http\Controllers\Home;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\About;
use Intervention\Image\Facades\Image;
use App\Models\MultiImage;
use Illuminate\Support\Carbon;




class AboutController extends Controller
{
   public function AboutePageView(){
    $about = About::find(1);
    return view('admin.about_page.about_page_all',compact('about'));

   }
   //End AboutePageView method

   public function UpdateAbout(Request $request){
    $id = $request->id;


    if($request->file('about_image')){
        $image = $request->file('about_image');

        @unlink(public_path(About::find($id)->about_image));
        $name_gen = hexdec(uniqid()).'.'.$image->getClientOriginalExtension();

        Image::make($image)->resize(523,605)->save('upload/about/'.$name_gen);
        $save_url = 'upload/about/'.$name_gen;

        About::findOrFail($id)->update([
            'title' =>$request->title,
            'short_title' =>$request->short_title,
            'short_description'=>$request->short_description,
            'long_description'=>$request->long_description,
            'about_image'=>$save_url,
        ]);
        $notification = array(
            'message' => 'About Page PageUpdated with Image Successfully',
            'alert-type' => 'success'
        );
        return redirect()->back()->with($notification);

    }else
    {

        About::findOrFail($id)->update([
            'title' =>$request->title,
            'short_title' =>$request->short_title,
            'short_description'=>$request->short_description,
            'long_description'=>$request->long_description,

        ]);
        $notification = array(
            'message' => 'About Page Updated without Image Successfully',
            'alert-type' => 'success'
        );
        return redirect()->back()->with($notification);

    } //End else


}
//End UpdateSlider method

public function HomeAbout()
{
    $about = About::find(1);
    return view('frontend.about_page',compact('about'));
}
//End AboutView method

public function AboutMultiImage(){
       return view('admin.about_page.multiimage');
}
//End AboutMultiImage method

public function StoreMultiImage(Request $request)
{
    $image =$request->file('multi_image');
    foreach ($image as $multi_image ){
    $name_gen = hexdec(uniqid()).'.'.$multi_image->getClientOriginalExtension();

    Image::make($multi_image)->resize(220,220)->save('upload/multiimage/'.$name_gen);
    $save_url = 'upload/multiimage/'.$name_gen;

    MultiImage::insert([
        'multi_image'=>$save_url,
        'created_at'=>Carbon::now(),
        'updated_at'=>Carbon::now(),
    ]);
    } //End of the foreach

    $notification = array(
        'message' => 'Multi Image Inserted Successfully',
        'alert-type' => 'success'
    );
    return redirect()->back()->with($notification);
}
//End StoreMultiImage method

public function AllMultiImage(){
       $allMultiImage = MultiImage::all();
       return view('admin.about_page.all_multiimage',compact('allMultiImage'));

}
//End AllMultiImage method

}
