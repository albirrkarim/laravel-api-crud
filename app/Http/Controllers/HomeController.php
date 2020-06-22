<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class HomeController extends Controller
{
    public function refresh(){
        $data = User::get();
        return view("refresh",compact("data"));
    }

    public function store(Request $request){
        try {
            User::create([
                "name" => $request["name"],
                "email" => $request["email"],
            ]);

            return "true";
        } catch (QueryException $ex) {

            return "Can't create, because : ".Str::limit($ex->getMessage(),100);
        }
    }
    
    public function update(Request $request){
        try {
            User::where("id",$request["id"])->update([
                "name" => $request["name"],
                "email" => $request["email"],
            ]);
            
            return "true";
        } catch (QueryException $ex) {
            return "Can't update, because : ".Str::limit($ex->getMessage(),100);
        }
    }

    public function delete($id){
        try {
            User::where("id",$id)->delete();
            return "true";
        } catch (QueryException $ex) {
            return "Can't delete, because : ".Str::limit($ex->getMessage(),100);
        }
    }
}
