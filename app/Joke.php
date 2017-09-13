<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Joke extends Model
{
    public static function countAwaitingApproval()
    {
        $count = static::where('approved', '=', 0)->count();
        return $count;
        //this is a change
    }

    public static function countJokes()
    {
        $count = static::count();
        return $count;
    }

    public static function getAwaitingApproval()
    {
        return static::where('approved', '=', '0')->paginate(5);
    }

    public static function approveJoke($id)
    {
        $joke = static::where('id', '=', $id)->first();
        $joke->approved = 1;
        if ($joke->save()) {
            return true;
        } else {
            return false;
        }
    }
    public static function editJoke($request){
        $joke = static::where('id','=',$request->id)->first();
        $joke->body = $request->body;
        if ($joke->save()) {
            return true;
        } else {
            return false;
        }
    }
    public static function deleteJoke($id){
        $joke = static::where('id','=',$id)->first();
        if($joke->delete()){
            return true;
        }else{
            return false;
        }
    }
}
