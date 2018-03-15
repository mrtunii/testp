<?php

namespace App\Http\Controllers;

use App\Post;
use App\Language;
use Illuminate\Http\Request;

class PostController extends Controller
{
    protected $defaultLanguage = 1; // მთავარ ენად აყენია ქართული. როცა ენებს დაამატებ ბაზაში დარწმუნდი რო id=1 ექნება ქართულს
    public function list() {
        $posts = Post::where('language_id',1)->get();

        return view('posts.list')->with('posts',$posts);
    }

    public function new(Request $request) {
        $language_id = $request->get('language_id') != null ? $request->get('language_id') : 1;
        $display_name = $request->get('display_name');

        $languages = Language::where('id','!=',$language_id)->get();

        $post = null;
        
        if($display_name != null) {
            $post = Post::where('display_name',$display_name)->where('language_id',$language_id)->first();
        }
        return view('posts.new')
                ->with('language_id',$language_id)               
                ->with('languages',$languages)
                ->with('display_name',$display_name)
                ->with('post',$post);
    }

    public function submit(Request $request) {
        $data = $request->all();
        
        $post = new Post();
        if(!array_key_exists('display_name',$data) || $data['display_name'] == null || $data['display_name'] == '') {
            
            $data['display_name'] = $this->generateDisplayName();
            
        } else {
            $lookupPost = $post->where('display_name', $data['display_name'])->where('language_id',$data['language_id'])->first();
            
            if($lookupPost) {
                $post = $lookupPost; // doing edit
            }
        } 
        
        $post->fill($data);
        $post->save();

        return redirect('/new?language_id='.$post->language_id.'&display_name='.$post->display_name);

    }


    private function generateDisplayName() {
        return mt_rand(1000,99999999);
    }
}
