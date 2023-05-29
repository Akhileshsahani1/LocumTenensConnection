<?php

namespace App\Http\Controllers\Provider\Auth;
// use App\Mail\VerifyEmail;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Provider;
use App\Models\PasswordReset;
use Mail;
use DB;
use Illuminate\Support\Str;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\URL;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use validate;
class ForgotPasswordController extends Controller
{
    //
    public function forgetPasswordLoad()
    {
        return view("Provider.forgetPassword");
    }

    /**
     * Write code on Method
     *
     * @return response()
     */
    public function forgetPassword(Request $request)
    {
        try {
            $user = Provider::where("email", $request->email)->get();
            if (count($user) > 0) {
                $token = Str::random(40);
                $domain = URL::to("/");
                $url =
                    $domain .
                    "/provider/resetPassword?token=" .
                    $token;

                $data["url"] = $url;
                $data["email"] = $request->email;
                $data["title"] = "Password Reset";
                $data["body"] =
                    "Please click on below link to reset your password";

                Mail::send("Provider.mailforget", ["data" => $data], function (
                    $message
                ) use ($data) {
                    $message->to($data["email"])->subject($data["title"]);
                });

                $datatime = Carbon::now()->format("Y-m-d H:i:s");

                $result = PasswordReset::updateOrCreate(
                    ["email" => $request->email],
                    [
                        "email" => $request->email,
                        "token" => $token,
                        "created_at" => $datatime,
                    ]
                );
                return back()->with(
                    "success",
                    "Please check your mail to reset your password"
                );
            } else {
                return back()->with("error", "Email is Not Exists!");
            }
        } catch (Exception $e) {
            //echo 'Message: ' .$e->getMessage();
            return back()->with("error", $e->getMessage());
        }
    }
    /**
     * Write code on Method
     *
     * @return response()
     */
    public function resetPasswordLoad(Request $request)
    {
        $resetdata = PasswordReset::where("token", $request->token)->get();
        if (isset($request->token) && count($resetdata) > 0) {
            $user = Provider::where("email", $resetdata[0]["email"])->get();
            return view("Provider.resetPassword", compact("user"));
        } else {
            return abort(404);
        }
    }

    /**
     * Write code on Method
     *
     * @return response()
     */
    public function resetPassword(Request $request)
    {
        $request->validate([
            
            'password' => 'required|min:8 | max:25',
            'regex:/[A-Z]/',
            'regex:/[0-9]/',
            'regex:/[@$!%*#?&]/',  
            'password_confirmation' => 'required | ',
            
        ]);

        $request->validate([
            
            "password" => "required | min:6 |max:100",
            "password_confirmation" => "required |same:password",
        ]);


        $user = Provider::find($request->id);
        $user->password = Hash::make($request->password);
        $user->save();

        PasswordReset::where("email", $user->email)->delete();
        //return redirect('/provider-resetPasswordSuccess');
        return redirect()->route("provider-resetPasswordSuccess");
        //dd($user);
    }

    public function forgetPasswordSuccess()
    {
        return view("Provider.passwordSuccess");
    }
}
