<?php

namespace App\Http\Controllers;
use App\Models\User;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Auth;
use Illuminate\Support\Facades\Hash;
use Intervention\Image\Facades\Image;

class ProfileController extends Controller
{
    public function index(){
        return view('profile');
    }
    //change profile
   public function namechange(Request $request){
        // return $request;
    //    echo Auth::id();
    //    echo  $request->name;
    $request->validate([
        'name'=>'required'
    ]);
       User::find(Auth::id())->update([
           'name'=>$request->name
       ]);
      return  back()->with('success','Your name changed Successfully');
    }

    //change Password
     public function passwordchange(Request $request){
         $request->validate([
            'old_password'=>'required',
            'password'=>'required|size:8',
            'password_confirm'=>'required'
         ]);
        if (Hash::check($request->old_password,Auth::user()->password)){
            if($request->password==$request->password_confirm){
            //   echo bcrypt($request->password);
              User::find(Auth::id())->update([
                'password'=>bcrypt($request->password)
              ]);
              return back()->with('success_p','Your Password Changed successfully');
            }
            else{
                return back()->withErrors(" Confirm Password Does Not Match");
            }
        }
        else{
            return back()->withErrors("Old Password Does Not Match");
        }
    }

    public function photochange(Request $request){
        $request->validate([
           'new_profile_photo'=>'required|image'
        ]);
        // return $request->file('new_profile_photo');

       if (Auth::user()->profile_photo!='default.jpg'){
           unlink( base_path('public/uploads/profile_photos/'.Auth::user()->profile_photo));
       }
           $new_profile_photo = Auth::id().'.'.$request->file('new_profile_photo')->getClientOriginalExtension();
           $img = Image::make($request->file('new_profile_photo'))->resize(200,200);
           $img->save(base_path('public/uploads/profile_photos/'.$new_profile_photo));
           User::find(Auth::id())->update([
                'profile_photo'=>$new_profile_photo

           ]);
          return  back()->with('photo_sucess','photo changed successfully!');
        //    echo "done";

    }
}
