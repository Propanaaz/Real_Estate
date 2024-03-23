<?php

namespace App\Http\Controllers;


use App\Models\User;
use App\Models\Agent;
use App\Models\Message;

use App\Models\Property;
use App\Models\Propertytype;
use Illuminate\Http\Request;

class PostController extends Controller
{



    public function index(Request $request){
        $propertytype = Propertytype::all();
        $property = Property::all();
        $gallerypost = Property::latest()->offset(0)->limit(4)->get();
        $headerimage = Property::latest()->offset(0)->limit(6)->get();
        $ceo = User::where("designation","C.E.O")->first();
        $plocation = Property::all();

        $user = User::all();
        
        $context = [
    
            "propertytype"=>$propertytype,
            "menuproperty"=>$propertytype,
            "menucategory"=>$propertytype,
            "ptype"=>$propertytype,
            "plocation"=>$plocation,
            "property"=>$property,
            "gallerypost"=>$gallerypost,
            "user"=>$user,
            "headerimage"=>$headerimage,
            "ceo"=>$ceo


        ];

        return view("index",$context);
    
}





public function propertydetail(Request $request,int $id){
    $propertytype = Propertytype::all();
    $property = Property::where("id",$id)->first();
    $gallerypost = Property::latest()->offset(0)->limit(4)->get();
    $headerimage = Property::where("id",$id)->first();
    $ceo = User::where("designation","C.E.O")->first();
    $plocation = Property::all();

    $user = User::all();
    
    $context = [

        "propertytype"=>$propertytype,
        "menuproperty"=>$propertytype,
        "menucategory"=>$propertytype,
        "ptype"=>$propertytype,
        "plocation"=>$plocation,
        "property"=>$property,
        "gallerypost"=>$gallerypost,
        "user"=>$user,
        "headerimage"=>$headerimage,
        "ceo"=>$ceo


    ];

    return view("propertydetail",$context);

}


    public function admin_dashboard(Request $request){
        if(auth()->check()){
            $property = Property::all();
            $context = [
                "property"=>$property
            ];
            return view("admin_dashboard",$context);
        }else{
            return redirect("/user_login")->with("message","Please Login");
        }
    }


    public function propertylist(Request $request,string $id){
            if($id == "all"){
                $property = Property::all();     
            }else{
                $id = Propertytype::where("property_type",$id)->first();
                $id = $id->id;
                $property = Property::where("propertytype_id",$id)->get();

            }
            $ceo = User::where("designation","C.E.O")->first();
            $gallerypost = Property::latest()->offset(0)->limit(4)->get();
            $propertytype = Propertytype::all();



            $context = [
                "property"=>$property,
                "ceo"=>$ceo,
                "gallerypost"=>$gallerypost,
                "propertytype"=>Propertytype::all(),
                "plocation" => Property::all(),
                "menucategory"=>$propertytype,

             

            ];
            return view("property-list",$context);
        }



    
        public function search(Request $request){
            if($request->input("type") == "select" || $request->input("location") == "select" || $request->input("name") == ""){
                $property = Property::all();     
            }else{
                $id = Propertytype::where("property_type",$request->input("type"))->first();
                $id = $id->id;
                $property = Property::where("propertytype_id",$id)->where("location",$request->input('location'))->where("name","LIKE","%{$request->input("name")}%")->get();
            }

            $ceo = User::where("designation","C.E.O")->first();
            $gallerypost = Property::latest()->offset(0)->limit(4)->get();
            $headerimage = Property::latest()->offset(0)->limit(1)->get();
            $menucategory = Propertytype::all();


            $context = [
                "property"=>$property,
                "headerimage"=>$headerimage,
                "menucategory"=>$menucategory,
                "ceo"=>$ceo,
                "gallerypost"=>$gallerypost,
                "ptype"=>Propertytype::all(),
                "plocation" => Property::all(),

            ];
            return view("search",$context);
        


    }    
    

    

    
    public function view_all_property(Request $request){
        if(auth()->check()){
            $property = Property::all();
            $context = [
                "property"=>$property
            ];
            return view("view_all_property",$context);
        }else{
            return redirect("/user_login")->with("message","Please Login");
        }
    }



    public function create_property(Request $request){
        if(auth()->check()){
            $propertytype = Propertytype::all();
           
            return view("create_property",["propertytype"=>$propertytype]);
        }else{
            return redirect("/user_login")->with("message","Please Login");
        }
        
    }






    public function send_property(Request $request){
        if(auth()->check()){
            $image_complete = false;
            $name = $request->input("name");
            $data = $request -> validate([
                "name"=>"required",
                "description"=>"required",
                "propertytype"=>"required",
                "location"=>"required",
                "price"=>"required",
                "price"=>"required",
                "tag"=>"required",
                "feature1"=>"required",
                "feature1ans"=>"required",
                "feature2"=>"required",
                "feature2ans"=>"required",
                "feature3"=>"required",
                "feature3ans"=>"required",
                // "image"=>"required|mimes:jpeg,png"
            ]);
            
            $propertytype = Propertytype::where("id",$request->input("category"));
            $arrName = explode(" ",$name);
            $slugged = implode("-",$arrName);
            $data["slug"] = $slugged;





            $ext = array("jpg","jpeg","png","mp4","3gp");
            $count = 0;
            foreach($request->file("image") as $file){
                $count++;
                if(in_array($file->extension(),$ext)){
                    $filename = uniqid().".".$file->extension();
                    $file->move(public_path("images"),$filename);


                    $data["image".$count] = $filename;
                    $data["tag"] = $request->input("tag");
                 
                }else{
                    return redirect("/create_property")->with("message","Mkes sure the file types are jpg,png,mp4,3gp");

                }
                
                if($count == 4){
                    $image_complete = true;
                    break;
                }
                

                 
            }
            if($image_complete == false){
                $data["image2"] = $data["image1"];
                $data["image3"] = $data["image1"];
                $data["image4"] = $data["image1"];
            }
            $data["propertytype_id"] = $request->input("propertytype");
            $data["user_id"] = auth()->user()->id;
            Property::create($data);
            // $request->image->move(public_path("images"),$filename);
            return redirect("/create_property")->with("message","uploaded successfully");
        }else{
            return redirect("/user_login")->with("message","Please Login");
        }
    }











    public function create_propertytype(Request $request){
        if(auth()->check()){
            return view("create_propertytype");
        }else{
            return redirect("/user_login")->with("message","Please Login");
        }
    }



    public function register_propertytype(Request $request){
        if(auth()->check()){
            $data = $request->validate([
            "propertytype"=>"required",
            "description"=>"required"
            ]);
            $data["property_type"] = $request->input("propertytype");


            Propertytype::create($data);
            return redirect("/create_propertytype")->with("message","Category Created Successfully");
        }else{
            return redirect("/user_login")->with("message","Please Login");
        }
    }




    public function view_all_propertytype(Request $request){
        if(auth()->check()){
            $propertytype = Propertytype::all();
            $context = [
            "propertytype"=>$propertytype
            ];
            return view("view_all_propertytype",$context);
        }else{
            return redirect("/user_login")->with("message","Please Login");

        }
    }



    public function edit_propertytype(Request $request, int $id){
        if(auth()->check()){
            $propertytype = Propertytype::where("id",$id)->get();
            $context = [
            "propertytype"=>$propertytype
            ];
            return view("edit_propertytype",$context);
        }else{
            return redirect("/user_login")->with("message","Please Login");
        }
    }



    public function delete_propertytype(Request $request, int $id){
        if(auth()->check()){
            $propertytype = Propertytype::where("id",$id)->first()->delete();
            return redirect("/view_all_propertytype");
        }else{
            return redirect("/user_login")->with("message","Please Login");
        }
    }



    public function delete_property(Request $request, int $id){
        if(auth()->check()){
            $property = Property::where("id",$id)->first()->delete();
            return redirect("/view_all_property");
        }else{
            return redirect("/user_login")->with("message","Please Login");
        }
    }



    public function update_propertytype(Request $request){
        if(auth()->check()){
            $propertytype = Propertytype::where("id",$request->input("cid"))->first();
            $propertytype->property_type = $request->input("propertytype");
            $propertytype->description = $request->input("description");
            $propertytype->save();
            return redirect("/view_all_propertytype")->with("message","Updated successfully");
        
        }else{
            return redirect("/user_login")->with("message","Please Login");

        }
    }





public function edit_property(Request $request, int $id){
    if(auth()->check()){
        $property = Property::where("id",$id)->get();
        $propertytype = Propertytype::all();
        $context = [
            "property"=>$property,
            "propertytype"=>$propertytype
        ];
        return view("edit_property",$context);
    }else{
        return redirect("/user_login")->with("message","Please Login");
    }
}



    public function update_property(Request $request){
    if(auth()->check()){

        

        $name = $request->input("name");
        $data = $request -> validate([
            "name"=>"required",
            "description"=>"required",
            "propertytype"=>"required",
            "location"=>"required",
            "price"=>"required",
            "tag"=>"required",
            "feature1"=>"required",
            "feature1ans"=>"required",
            "feature2"=>"required",
            "feature2ans"=>"required",
            "feature3"=>"required",
            "feature3ans"=>"required",
            // "image"=>"required|mimes:jpeg,png"
        ]);
    if($request->input("propertytype") == "Choose a Category"){
        return redirect("/edit_property"."/".$request->input("pid"))->with("message","Please Choose a category");
    }
    
    $property = Property::where("id",$request->input("pid"))->get();
    foreach($property as $property){
        $user_id = $property['user_id'];
    }

    $property->name = $request->input("name");
    $property->description = $request->input("description");
    $property->user_id = auth()->user()->id;
    $property->propertytype_id = $request->input("propertytype");
    $property->location = $request->input("location");
    $property->price = $request->input("price");
    $property->tag = $request->input("tag");
    $property->feature1 = $request->input("feature1");
    $property->feature2 = $request->input("feature2");
    $property->feature3 = $request->input("feature3");
    $property->feature1ans = $request->input("feature1ans");
    $property->feature2ans = $request->input("feature2ans");
    $property->feature3ans = $request->input("feature3ans");


    $arrName = explode(" ",$request->input("name"));
    $slugged = implode("-",$arrName);
    $property->slug = $slugged;

    
        

    $ext = array("jpg","jpeg","png","mp4","3gp");
    $count = 0;
        
    
        foreach($request->file("image") as $file){
            $count++;
            if(in_array($file->extension(),$ext)){
                $filename = uniqid().".".$file->extension();
                $file->move(public_path("images"),$filename);
    
                $tag = "image".$count; 
                // $data["image".$count] = $filename;
                $property->$tag = $filename; 
            }else{
                return redirect("/create_property")->with("message","Mkes sure the file types are jpg,png,mp4,3gp");
    }
    

    if($count == 4){
        $property->save();
        return redirect("/create_property")->with("message","Property Altered successfully");
        break;
    }
    }
    
    
}else{
    return redirect("/user_login")->with("message","Please Login");
}

}




public function delete_post(Request $request, int $id){
    if(auth()->check()){
        $post = Post::where("id",$id)->first()->delete();
    return redirect("/view_all_post");
    }else{
        return redirect("/user_login")->with("message","Please Login");

    }
}








    public function read_article(Request $request, int $id,string $slug){
        $post = Post::where("id","=",$id)->get();
        $allcategory = Category::all();
        $tag = Tag::all();
        $getcategory = Post::where("id","=",$id)->get();
        $latestads1 = Advert::latest()->offset(0)->limit(1)->get();
        $latestads2 = Advert::latest()->offset(1)->limit(4)->get();
        $context = [
            "post"=>$post,
            "category"=>$allcategory,
            "tag"=>$tag,
            "latestads1"=>$latestads1,
            "latestads2"=>$latestads2
        ];
        return view("read_article",$context);
        
    }



    public function contact(Request $request){
        $category = Propertytype::all();
        $plocation = Property::all();
        $gallerypost = Property::latest()->offset(0)->limit(4)->get();
        $headerimage = Property::latest()->offset(0)->limit(1)->get();



        $context = [
        "category"=>$category,
        "menucategory"=>$category,
        "ptype"=>$category,
        "plocation"=>$plocation,
        "gallerypost"=>$gallerypost,
        "headerimage"=>$headerimage,
        ];
        return view("contact",$context);
    }


public function sendcontact(Request $request){

        $data = $request -> validate([
            "name"=>"required",
            "email"=>"required",
            "subject"=>"required",
            "message"=>"required"
        ]);
Message::create($data);
        return redirect("/contact")->with("message","Request Sent successfully, You will be Communicated Soon");
    
}



    public function user_message(Request $request){
        if(auth()->check()){
            $message = Message::all();
            $context = [
            "message"=>$message
            ];
            return view("message",$context);
        }else{
            return redirect("/user_login")->with("message","Please Login");
        }
    }

    public function view_message(Request $request, int $id){
        if(auth()->check()){
            $message = Message::where("id",$id)->first();
            $context = [
            "message"=>$message
            ];
            return view("view_message",$context);
        }else{
            return redirect("/view_login")->with("message","Please Login");
        }
    }



    

    public function delete_message(Request $request, int $id){
        if(auth()->check()){
            Message::where("id",$id)->first()->delete();
            return redirect("/user_message")->with("message","Message Deleted");
        }else{
            return redirect("/user_login")->with("message","Please Login");
        }
    }


    public function about(Request $request){
        $category = Propertytype::all();
        $plocation = Property::all();
        $gallerypost = Property::latest()->offset(0)->limit(4)->get();
        $headerimage = Property::latest()->offset(0)->limit(1)->get();
        $aboutimage = Property::latest()->offset(1)->limit(1)->get();

        $ceo = User::where("designation","C.E.O")->first();
        $user = User::all();

        $context = [
        "category"=>$category,
        "menucategory"=>$category,
        "ptype"=>$category,
        "plocation"=>$plocation,
        "gallerypost"=>$gallerypost,
        "headerimage"=>$headerimage,
        "aboutimage"=>$aboutimage,
        "ceo"=>$ceo,
        "user"=>$user,
        ];
        return view("about",$context);
    }
}