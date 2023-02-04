<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class PostController extends Controller
{
    //customer create page

    public function create()
    {
        // $posts = Post::orderBy('updated_at', 'desc')->paginate(3);
        // $posts=Post::where('id','<','5')->where('address','!=','Yangon')->get()->toArray();
        // $posts=Post::select('title','price')->get()->toArray();
        // $posts=Post::paginate(3)->through(function($post){
        //     $post->title=strtoupper($post->title);
        //     $post->description = strtoupper($post->description);
        //     return $post;
        // });
        // $post=Post::when(request('key'),function($p){
        //     $searchKey = request('key');
        //     $p->where('title','like','%'.$searchKey.'%');
        // })->get()->toArray();
        // dd($post);
        $posts = Post::when(request('searchkey'),function($p){
            $searchKey = request('searchkey');
            $p->orwhere('title','like','%'.$searchKey.'%')
                ->orwhere('description', 'like', '%' . $searchKey . '%');
        })->orderBy('updated_at', 'desc')->paginate(3);
        return view('create', compact('posts'));
    }

    //post create
    public function postCreate(Request $request)
    {
        $this->validationcheck($request);
        $data = $this->getdata($request);
        if($request->hasFile('image')){
            $filename=uniqid() . $request->file('image')->getClientOriginalName();
            $request->file('image')->storeAs('myImage',$filename);
            $data['image']=$filename;

        }

        Post::create($data);
        return back()->with(['insert' => 'Create Successfully']);
    }

    public function postDelete($id)
    {
        // Post::find($id)->delete();
        Post::where('id', $id)->delete();
        // return redirect()->route('post#createPage');
        return back()->with(['insert' => 'Delete Successfully']);
    }

    public function postUpdate($id)
    {
        $post = Post::where('id', $id)->get();
        //dd($post)
        return view('update', compact('post'));
    }

    //edit data
    public function postEdit($id)
    {
        $post = Post::where('id', $id)->get()->toArray()[0];
        // dd($post);
        return view('edit', compact('post'));
    }

    //update data
    public function postUpdateData(Request $request)
    {
        $this->validationcheck($request);
        $data = $this->getdata($request);
        $id = $request->id;
        Post::where('id', $id)->update($data);
        return redirect()->route('post#home')->with(['insert' => 'Update Successfully']);
    }


    //getpostdata
    private function getdata($request)
    {
        $data = [
            'title' => $request->postTitle,
            'description' => $request->postDes,
            'price'=>$request->fee,
            'address'=>$request->address,
            'rating'=>$request->rate,
        ];
        return $data;
    }

    //check validation
    private function validationcheck($request)
    {
        $validationData = [
            'postTitle' => 'required|min:3|unique:posts,title,' . $request->id,
            'postDes' => 'required',
            'fee'=>'required',
            'image'=>'mimes:jpg,jpeg,png',
            'address'=>'required',
            'rate'=>'required'
        ];

        $validationMessage = [
            'postTitle.required' => 'You Need To Fill Post Title.',
            'postDes.required' => 'You Need To Fill Post Description.',
            'postTitle.min' => 'You Need To Fill More Than 3 Characters',
            'postTitle.unique' => 'Post Title Is Already Taken.Change Another Title.',
            'fee.required' => 'You Need To Fill Fee.',
            'address.required' => 'You Need To Fill Address.',
            'rate.required' => 'You Need To Fill rate.',
        ];

        Validator::make($request->all(), $validationData, $validationMessage)->validate();
    }
}
