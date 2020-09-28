<?php


namespace App\Http\Controllers;


use App\Http\Controllers\Requests\SlideRequest;
use App\Category;
use App\Slide;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Str;

class SlidesController extends Controller
{
    public function slides(){
        $slides = Slide::all();
        return view('admin.slides.slides', ['slides'=>$slides]);
    }
    public function getAddSlide(){
        $categories = Category::all();
        return view('admin.slides.addSlide',['categories'=>$categories]);
    }
    public function postAddSlide(SlideRequest $request){
        $slides = new Slide();
        $slides->link = $request->link;
        $slides->category_id = $request->category_id;
        $slides->image = $request->image;
        if ($request->hasFile('image')) {
            //get file from input
            $image = $request->file('image');
            //get file name - ham time() trong php de get ra time vi du 9822828
            $name = time().'-'.$image->getClientOriginalName();
            //path - duong dan store
            $destinationPath = public_path('/uploads/brand');
            //chuyen file tạm thành file chính
            $image->move($destinationPath, $name);
            $slides->image = $image;
        }

        $slides->save();
        return Redirect::to('admin/slides');
    }
    public function getEditSlide($id){
        $slides = Slide::find($id);
        $categories = Category::all();
        return view('admin.slides.editSlide', [
            'slides'=>$slides,
            'categories'=>$categories
        ]);
    }
    public function postEditSlide(SlideRequest $request, $id){
        $slides = Slide::find($id);
        $slides->link = $request->link;
        $slides->category_id = $request->category_id;


        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $format = $file->getClientOriginalExtension();
            if ($format != 'jpg' && $format != 'png' && $format != 'jpeg') {
                return Redirect::to('admin/slides/editSlide/' . $id)->with('error', 'Định dang ảnh chỉ có thể là jpg, png, jpeg');
            }
            $name = $file->getClientOriginalName();
            $image = Str::random(4) . "_" . $name;
            while (file_exists("uploads/brand/" . $image)) {
                $image = Str::random(4) . "_" . $name;
            }
            $file->move(public_path() . '/uploads/brand/', $image);
            $slides->image = $image;
        }
        $slides->update();
        return Redirect::to('admin/slides');
    }
    public function getDelSlide($id){
        $slides = Slide::find($id);
//        $check = Category::where($id,'=','category_id')->first();
//        if($check){
//            return Redirect::to('admin/slides')->with('error','Còn sản phẩm thuộc danh mục này');
////        }
        $slides->delete();
        return Redirect::to('admin/slides')->with('success','Xóa thành công');

    }
}
