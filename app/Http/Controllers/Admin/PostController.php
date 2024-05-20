<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\PostRequest;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\PostCategory;
use Carbon\Carbon;
use Illuminate\Support\Facades\Storage;
use League\CommonMark\Extension\CommonMark\Node\Inline\Strong;

class PostController extends Controller
{
    public function index()
    {
        $datas = Post::withCount('categories')->oldest()->paginate();

        return view('admin.post.index', ['datas' => $datas]);
    }

    public function create()
    {
        $category = Category::all();
        return view('admin.post.create',compact('category'));
    }

    public function store(PostRequest $request)
    {
        $uploadedFile = $request->file('image');
        $imageFileName = $uploadedFile->hashName();
        $uploadedFile->move('posts', $imageFileName);

        $id = Post::insertGetId([
            'title' => $request->title,
            'price' => $request->price,
            'description' => $request->description,
            'color' => $request->color,
            'size' => $request->size,
            'image' => $imageFileName,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),

        ]);
        $this->addToPostCategory($request,$id);

        return redirect()->back()->with(['msg' => 'بەسەرکەوتوی زیادکرا']);
    }

    public function edit(string $id)
    {
        $datas = Post::where('id',$id)->firstOrFail();
        $category = Category::all();

        $arrID = [];

        foreach (PostCategory::where('post_id',$id)->get() as $value) {
            $arrID[] = $value->category_id;
        }
        return view('admin.post.edit', compact('datas','category','arrID'));
    }

    public function update(PostRequest $request, string $id)
    {
        $post = Post::findOrFail($id);

        PostCategory::where('post_id',$id)->delete();

        if ($request->hasFile('image')) {
            $oldImagePath = 'posts/' . $post->image;

            // Verify file existence
            if (file_exists($oldImagePath)) {
                // Delete old image
                unlink($oldImagePath);
            } else {
                return with(['msg' => 'وێنە کۆنەکە نە دۆزراوەتەوە']);
            }

            // Upload new image
            $image = $request->file('image');
            $imageFileName = $image->hashName();
            $image->move('posts', $imageFileName);

            // Update post with new image
            $post->image = $imageFileName;
        }
        // Update other fields
        $post->title = $request->input('title');
        $post->price = $request->input('price');
        $post->description = $request->input('description');
        $post->color = $request->input('color');
        $post->size = $request->input('size');
        $post->discount = $request->input('discount');
        $post->save();

        //update بەشەکان
        $this->addToPostCategory($request,$id);
        return redirect()->back()->with(['msg' => 'بەسەرکەوتوی تازەکرایەوە']);
    }
    public  function addToPostCategory($request,$id){
        if(count($request->category)>0){
            foreach($request->category as $value){
                if(Category::find($value)){
                    PostCategory::create([
                        'post_id' =>$id,
                        'category_id' => $value,
                    ]);
                }
            }
        }
    }

    public function destroy(string $id)
    {
        $post = Post::findOrFail($id);
        $path = public_path('posts/' . $post->image);
        if(file_exists($path)){
            unlink($path);
        }
        $post->delete();
        return redirect()->route('post.index');
    }
}
