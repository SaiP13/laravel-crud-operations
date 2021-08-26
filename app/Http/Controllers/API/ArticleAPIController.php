<?php

namespace App\Http\Controllers\API; 

use Illuminate\Http\Request;
use App\Http\Controllers\API\APIBaseController as APIBaseController;
use App\ArticleModel;
use Validator;

class ArticleAPIController extends APIBaseController 
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __contruct()
    {

    }
    public function index()
    {
        //$articles = ArticleModel::all();
        //1) using another class    //return $this->sendResponse($articles->toArray(), 'Articles are displayed successfully.');
        //2) direct -return         //return $articles;
        
        //3) using exception and json
        try{
            $articles = ArticleModel::all();
            return response()->json(['status'=>'Success','message'=>'List of Artcles','data'=>$articles],200);
        } 
        catch(\Exception $e){
            return response()->json(['status'=>500,'message'=>'Somthing went wrong'],500);
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $input = $request->all();
        $rules = array(
            'title' => 'required',
            'body' => 'required'
         );

        $validator = Validator::make($input, $rules);
        if($validator->fails()) {
            $error_reasons = $validator->messages()->all();
            //$error_reasons = $validator->messages()->first();
            //$error_reasons = $validator->messages();
            return response()->json(['status'=>'error','message'=>'enter mandatory fields','errors'=>$error_reasons],500);
            //return prepareResponse($this->error_reason,$this->success_message,$this->data);
        } else{
            try{
                ArticleModel::create($input);
                return response()->json(['status'=>'Success','message'=>'New Artcile Created','data'=>$input],200);
            } 
            catch(\Exception $e){
                return response()->json(['status'=>500,'message'=>'Somthing went wrong'],500);
            }
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
        
            $data = ArticleModel::find($id);
            if($data != "")
            {
                return response()->json(['status'=>'Success','message'=>'Article Deatils','data'=>$data],200);
            } else {
                return response()->json(['status'=>'error','message'=>'Article not found'],404);
            }
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
        $article = ArticleModel::find($id);
        
        if($article != ""){
            $input = $request->all();
            $rules = array(
                'title' => 'required',
                'body' => 'required'
            );

            $validator = Validator::make($input, $rules);
            
            if($validator->fails()) {
                $error_reasons = $validator->messages()->all();
                return response()->json(['status'=>'error','message'=>'enter mandatory fields','errors'=>$error_reasons],500);
            } else{
                $article->title = $request['title'];
                $article->body = $request['body'];
                $article->save();
                return response()->json(['status'=>'success','message'=>' Artcile Successfully Updated','data'=>$input],200);
            } 
        } 
        else 
        {
            return response()->json(['status'=>'error','message'=>'Article not found'],404);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data = ArticleModel::find($id);
        if($data != ""){
            $data->delete();
            return response()->json(['status'=>'Success','message'=>'Article Sucessfully Deleted'],200);
        } else {
            return response()->json(['status'=>'error','message'=>'Article not found'],404);
        }
    }
}