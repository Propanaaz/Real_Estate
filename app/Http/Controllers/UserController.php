<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class UserController extends Controller
{


    public function user_login(Request $request){
        return view('user_login');
    }

    public function send_user_login(Request $request){
        $incomingFields = $request->validate([
            'username'=>"required",
            "password"=>"required"
        ]);
        // $incomingFields["name"] = $request->input("username")
        if(auth()->attempt(["email"=>$incomingFields["username"],"password"=>$incomingFields["password"]])){
            $request->session()->regenerate();
            return redirect("/admin_dashboard")->with("message", "Login Successful");

        }

        return redirect("/user_login")->with("message", "Invalid Login Credential");
    }

    public function logout(){
        auth()->logout();
        return redirect("/user_login");
    }




    
    public function view_all_user(Request $request){
        if(auth()->check()){
            $user = User::all();
            $context = [
            "user"=>$user
            ];
            return view("view_all_user",$context);
        }else{
            return redirect("/user_login")->with("message","Please Login");

        }
    }



    public function edit_user(Request $request, int $id){
        if(auth()->check()){
            $user = User::where("id",$id)->get();
            $context = [
            "user"=>$user
            ];
            return view("edit_user",$context);
        }else{
            return redirect("/user_login")->with("message","Please Login");
        }
    }

    public function update_user(Request $request){
        if(auth()->check()){
            $data = $request -> validate([
                'username'=> ['required'],
                'email'=>['required','email'],
                "image"=>"required|mimes:jpeg,png",
                "designation"=>"required"
            ]);
            $user = User::where("id",$request->input("pid"))->first();
            $user->name = $request->input("username");
            $user->designation = $request->input("designation");
            $user->email = $request->input("email");
            $filename = uniqid().".".$request->image->extension();
            $user->image = $filename;
            $id = $request->input("pid");
           
            if(User::where("name",$request->input("username"))->exists()){
                return redirect("/edit_user/$id")->with("message", "Name Already Exist");
            }else{
                if(User::where("email",$request->input("email"))->exists()){
                    return redirect("/edit_user/$id")->with("message", "Email Already Exist");
                }else{
                    if($request->input("password") != ""){
                        $password = $request->input("password");
                        $password2 = $request->input("password2");
                        bcrypt($password2); 
                        bcrypt($password);
                        if($password === $password2){
                            $user->password = $request->input("password");

                        }else{
                            return redirect("/edit_user/$id")->with("message", "Password did not match");

                        }
                        
                    }
                        $user->save();
                        $request->image->move(public_path("images/employee"),$filename);
                        return redirect("/view_all_user")->with("message", "Account Updated Successfully");
                    
                }
            }
         
    
        }else{
            return redirect("/user_login")->with("message","Please Login");
        }
    }



    public function delete_user(Request $request, int $id){
        if(auth()->check()){
            $user = User::where("id",$id)->first()->delete();
            return redirect("/view_all_user");
        }else{
            return redirect("/user_login")->with("message","Please Login");
        }
    }











    public function create_user(Request $request){
        return view("create_user");
    }



    public function register_user(Request $request){
        $incomingFields = $request->validate([
            'username'=> ['required'],
            'email'=>['required','email'],
            'password'=>['required','max:15'],
            'password2'=>['required','max:15'],
            "image"=>"required|mimes:jpeg,png",
            "designation"=>"required"
    
        ]);
        $incomingFields["name"] = $request->input("username");
        $password = $incomingFields["password"];


        bcrypt($password);
        $password2 = $incomingFields["password2"]; 
        bcrypt($password2); 
        
        if($password === $password2){
            if(User::where("name",$request->input("username"))->exists()){
                return redirect("/create_user")->with("message", "Name Already Exist");

            }else{
                if(User::where("email",$request->input("email"))->exists()){
                    return redirect("/create_user")->with("message", "Email Already Exists");
                }else{
                    $filename = uniqid().".".$request->image->extension();
                    $incomingFields["image"] = $filename;
                    User::create($incomingFields);
                    $request->image->move(public_path("images/employee"),$filename);
                 
                    // auth()->login($user);
                    return redirect("/create_user")->with("message", "Account Creation Successful");
                }                   
            }
        }else{
            return redirect("/create_user")->with("message", "Password did not match");
        }
         
     
     
        return "hello from our controller";
    }


    







    
}
