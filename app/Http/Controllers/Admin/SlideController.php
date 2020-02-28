<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Slides\CreateRequest;
use App\Models\Slide;
use Illuminate\Http\Request;

class SlideController extends Controller
{

    protected Slide $slide;
    protected string $imagePath;

    public function __construct()
    {
        $this->slide = new Slide();
        $this->imagePath='images/slides/';
    }

    public function formatRequest(Request $request):array
    {
        $data=$request->all();

        return $data;
    }

    public function index(Request $request)
    {
        $status=$request->input('status');
        $slides=$this->slide->search($status);
        $slideShow=$this->slide->countSlideShow();
        $slideNotShow=$this->slide->countSlideNotShow();

        return view('admins.slides.index',compact('slides','slideShow','slideNotShow'));
    }


    public function create()
    {
        return view('admins.slides.create');
    }


    public function store(CreateRequest $request)
    {
        $data=$this->formatRequest($request);
        $data['image']=$this->slide->saveImage($data['image'],$this->imagePath);
        $this->slide->create($data);

        return redirect()->route('slides.create')->with('message','Thêm mới slide thành công');
    }


    public function show($id)
    {
        //
    }


    public function edit($id)
    {
        $slide= $this->slide->findOrFail($id);

        return view('admins.slides.edit',compact('slide'));
    }


    public function update(Request $request, $id)
    {
        $slide= $this->slide->findOrFail($id);
        $data=$this->formatRequest($request);
        $image =$data['image']??null;
        $data['image']=$this->slide->updateImage($image,$this->imagePath,$slide->image);
        $slide->update($data);

        return redirect()->route('slides.index')->with('message','Cập nhật  slide thành công');
    }


    public function destroy($id)
    {
        $slide=$this->slide->findOrFail($id);
        $image=$slide->image;
        $slide->delete();
        $this->slide->deleteImage($image,$this->imagePath);

        return response()->json([
            'status'=>200,
            'message'=>'Xóa thành công ',
        ]);
    }
}
