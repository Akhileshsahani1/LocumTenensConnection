<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Banner;
use App\Models\OurMission;
use App\Models\AboutUs;
use App\Models\Testimonial;
use App\Models\Faq;
use App\Models\Admin;
use App\Models\ContactUs;
use Mail;
use Event;
use App\Events\SendMail;


class HomeController extends Controller
{


    public function DisplayHome(){
        $data['banner'] = Banner::first();
        $data['our_mission'] = OurMission::first();
        $data['about_us'] = AboutUs::first();
        $data['testimonial'] = Testimonial::get();
        $data['faq'] = Faq::get();
      
        return view('home')->with($data);
    }

    public function allpages(){
        $data['banner'] = Banner::first();
        $data['ourmission'] = OurMission::first();
        $data['aboutus'] = AboutUs::first();
        return view('Admin.allPages')->with($data);
    }

    public function banner(){
        $banner_data_edit = Banner::first();
        return view('Admin.Banner', compact('banner_data_edit'));
    }

    public function submitBanner(Request $request){
        $data = [
            'firstHeading' => $request->firstHeading,
            'lastHeading' => $request->lastHeading,
        ];

        $filename = rand().'_'.$request->logo->getClientOriginalName();
        $request->logo->move(public_path().'/Admin/home', $filename);  
        $fileName = $filename;
       
        $data['logo'] =  $fileName;
        
        $data_insert = Banner::create($data);

        if($data_insert){
            return redirect()->back()->with('success','Banner Added Successfully !');
        }else{
            return redirect()->back()->with('error','Banner not Added !');
        }
    }

    public function editBanner($id){
        $banner_data = Banner::where('id', $id)->first();
        return view('Admin.editBanner',compact('banner_data'));
    }
    


    public function updateBanner(Request $request, $id){
        $data = [
            'firstHeading' => $request->firstHeading,
            'lastHeading' => $request->lastHeading,
        ];
        $banner_data = Banner::find($id);
        if($banner_data){
            if($request->file('logo')) {
                $image_name = $banner_data->logo;
                $image_path = public_path('Admin/home/'.$image_name);
                if(file_exists($image_path)){
                unlink($image_path);
                }

                $filename = rand().'_'.$request->logo->getClientOriginalName();
                $request->logo->move(public_path().'/Admin/home', $filename);  
                $fileName = $filename;
                $data['logo'] =  $fileName ;
        }
        }
    $data = Banner::where('id', $id)->update($data);
        if($data){
            return redirect()->back()->with('success','Banner Successfully Updated !');
        }else{
        return redirect()->back()->with('error','Banner not Added !');
        }

    }


    public function ourMission(){
        return view('Admin.ourmission');
    }
    public function submitMission(Request $request){
        $data_insert = [
        'our_mission_contents' => $request->our_mission_contents,
        'dentalpractice_para_first' => $request->dentalpractice_para_first,
        'dentalpractice_search' => $request->dentalpractice_search,
        'dentalpractice_schedule' => $request->dentalpractice_schedule,
        'dentalpractice_book' => $request->dentalpractice_book,
        'dentalpractice_review' => $request->dentalpractice_review,
        'dentalprofessional_para_first' => $request->dentalprofessional_para_first,
        'dentalprofessional_profile' => $request->dentalprofessional_profile,
        'dentalprofessional_schedule' => $request->dentalprofessional_schedule,
        'dentalprofessional_accept' => $request->dentalprofessional_accept,
        'dentalprofessional_getpaid' => $request->dentalprofessional_getpaid,
        'dentalprofessional_review' => $request->dentalprofessional_review
        ];
            $mission_insert =  OurMission::create($data_insert);
            
            if($mission_insert){
                return redirect()->back()->with('success','Our Mission data insert Succesfully !');
            }else{
            return redirect()->back()->with('error','Our Mission data does not insert!');
            }
        
    }
    public function editMission($id){

        $displaymission_data = OurMission::find($id);
        return view('Admin.editOurMission', compact('displaymission_data'));
    }

    public function updateMission(Request $request, $id){
        $data_update = [
        'our_mission_contents' => $request->our_mission_contents,
        'dentalpractice_para_first' => $request->dentalpractice_para_first,
        'dentalpractice_search' => $request->dentalpractice_search,
        'dentalpractice_schedule' => $request->dentalpractice_schedule,
        'dentalpractice_book' => $request->dentalpractice_book,
        'dentalpractice_review' => $request->dentalpractice_review,
        'dentalprofessional_para_first' => $request->dentalprofessional_para_first,
        'dentalprofessional_profile' => $request->dentalprofessional_profile,
        'dentalprofessional_schedule' => $request->dentalprofessional_schedule,
        'dentalprofessional_accept' => $request->dentalprofessional_accept,
        'dentalprofessional_getpaid' => $request->dentalprofessional_getpaid,
        'dentalprofessional_review' => $request->dentalprofessional_review
        ];
        $mission_update = OurMission::where('id', $id)->update($data_update);
        if($mission_update){
                    return redirect()->back()->with('success','Our Mission data Update Succesfully !');
                }else{
                return redirect()->back()->with('error','Our Mission data does not update!');
                }

        
    }
    public function aboutUs(){
        return view('Admin.aboutus');
    }

    public function submitAboutUs(Request $request){
        $data_insert = [
            'first_paragraph' => $request->first_paragraph,
            'last_paragraph' => $request->last_paragraph
        ];
        if($request->file('about_us_image')){
        $filename = rand().'_'.$request->about_us_image->getClientOriginalName();
        $request->about_us_image->move(public_path().'/Admin/home', $filename);  
        $fileName = $filename;
        $data_insert['about_us_image'] =  $fileName;
        }

        $data = AboutUs::create($data_insert);
        if($data){
            return redirect()->back()->with('success',' About Us data successfully Added !');
        }else{
        return redirect()->back()->with('error','About Us data not Added !');
        }
    }
     public function editAboutUs($id){
        $about_data_send = AboutUs::find($id);
        return view('Admin.editAboutUs',compact('about_data_send'));
     }


    public function updateAboutUs(Request $request, $id){
        $data_insert = [
            'first_paragraph' => $request->first_paragraph,
            'last_paragraph' => $request->last_paragraph
        ];
   

        $about_data = AboutUs::where('id', $id)->first();
        if($about_data){

            if($about_data) {
                if($request->about_us_image){
                $image_name_about = $about_data->about_us_image;
                $image_path_about = public_path('Admin/home/'.$image_name_about);
                if(file_exists($image_path_about)){
                unlink($image_path_about);
                }
             
                    $filename = rand().'_'.$request->about_us_image->getClientOriginalName();
                    $request->about_us_image->move(public_path().'/Admin/home', $filename);  
                    $fileName = $filename;
                    $data_insert['about_us_image'] =  $fileName;
                }else{
                    $data_insert['about_us_image'] =  $about_data->about_us_image;

                }    
            
                $data = AboutUs::where('id',  1)->update($data_insert);
                if($data){
                    return redirect()->back()->with('success',' Successfully Updated !');
                }else{
                return redirect()->back()->with('error','Banner not Added !');
                }
            }   
        }
    
    }


    public function testimonial(){

        $testimonial_data_display =Testimonial::get();
        return view('Admin.testimonial', compact('testimonial_data_display'));
    }
    

    public function addTestimonal(){
        return view('Admin.add_testimonial');
    }


    public function submitTestimonial(Request $request){
           $validated = $request->validate([
            // 'testimonial_heading' => 'required',
            'name' => 'required',
            'designation' => 'required',
            'description' => 'required',
            'testimonial_image' => 'required'
        ]);

        $testimonial_data_insert = [
            // 'testimonial_heading' => $request->testimonial_heading,
            'name' => $request->name,
            'designation' => $request->designation,
            'description' => $request->description
           
        ];

       if($request->file('testimonial_image')){
        $testimonial_image_name = rand().'_'.$request->testimonial_image->getClientOriginalName();
        $request->testimonial_image->move(public_path().'/Admin/testimonial', $testimonial_image_name);  
        $testimonial_fileName = $testimonial_image_name;
        $testimonial_data_insert['testimonial_image'] =  $testimonial_fileName;
       }

       $testimonial = Testimonial::create($testimonial_data_insert);

       if($testimonial){
        return redirect()->back()->with('success','Testimonial has been insert successfully !');
       }else{
        return redirect()->back()->with('error','Testimonial not Added !');
       }
    }


    public function testimonialEdit($id){
        $testim = Testimonial::find($id);
        return view('Admin.editTestimonial', compact('testim'));
    }


    public function updateTestimonial(Request $request, $id){

        $validated = $request->validate([
            // 'testimonial_heading' => 'required',
            'name' => 'required',
            'designation' => 'required',
            'description' => 'required',
        ]);



       $update_data = Testimonial::where('id', $id)->first();

       $data_update = [
        'name' => $request->name,
        'designation' => $request->designation,
        'description' => $request->description
       ];

       if($request->file('testimonial_image')){
            $image_name_testimonial = $update_data->testimonial_image;
            $image_path_testimonial = public_path('Admin/testimonial/'.$image_name_testimonial);
            if(file_exists($image_path_testimonial)){
            unlink($image_path_testimonial);
            }

            $filename_testim = rand().'_'.$request->testimonial_image->getClientOriginalName();
            $request->testimonial_image->move(public_path().'/Admin/testimonial', $filename_testim);  
            $fileName_testim = $filename_testim;
            $data_update['testimonial_image'] =  $fileName_testim;

       }
    //   $data_update['testimonial_image'] =  $update_data->testimonial_image;

       $data_update_testimonial = Testimonial::where('id', $id)->update($data_update);

       if($data_update_testimonial){
        return redirect()->back()->with('success','Testimonial update successfully !');
       }else{
        return redirect()->back()->with('error','Testimonial not Update !');
       }

    }


    public function loadFqa()
    {
        return view('Admin.addFaq');
    }

    public function faqSubmit(Request $request){

        $validated = $request->validate([
            'fqa_heading' => 'required',
            'faq_description' => 'required|max:1000'
        ]);

        $faq_insert = [
            'fqa_heading' => $request->fqa_heading,
            'faq_description' => $request->faq_description
        ];

        $faq_data = Faq::create($faq_insert);

        if($faq_data){
            return redirect()->back()->with('success','FAQ Insert successfully !');
        }else{
            return redirect()->back()->with('error','FAQ not Insert !');
        }
    }

    public function faqList(){
        $faqlist = Faq::get();
        return view('Admin.faq-list', compact('faqlist'));
    }

    public function faqEdit($id){
        $faqedit = Faq::find($id);
        return view('Admin.editFaq', compact('faqedit'));
    }

    public function faqUpdate(Request $request, $id){

        $validated = $request->validate([
            'fqa_heading' => 'required',
            'faq_description' => 'required|max:1000'
        ]);


        
        $faq_update = Faq::where('id', $id)->first();

        $update_fqa = [
            'fqa_heading' => $request->fqa_heading,
            'faq_description' => $request->faq_description
        ];

        $faq = Faq::where('id', $id)->update($update_fqa);

        if($faq){
            return redirect()->back()->with('success','FAQ Update successfully !');
        }else{
            return redirect()->back()->with('error','FAQ not update !');
        }
        
    }


    public function contactSubmit(Request $request){

        // $validated = $request->validate([
        //     'name' =>  'required|max:30',
        //     'email' =>   'required',
        //     'message' =>   'required|max:1000'
        // ]);

        $data = [
        'name' =>  $request->name,
        'email' =>   $request->email,
        'message' =>   $request->message
        ];
        $contact_submit = ContactUs::create($data);
        $admin_data = Admin::where('id', 1)->first();

        if($contact_submit){

            $data["email"] =   $admin_data->email;
            $data["name"] =   $request->name;
            $data["message"] =  $request->message;
            $data["title"] = "Contact Us";
            
            Mail::send("eventMail", ["data" => $data], function (
                $message
            ) use ($data) {
                $message->to($data["email"])->subject($data["title"]);
            });

            return response()->json([
                    'message' => 'Your data submit successfully, Team will contact you soon!'
            ],200);
        }else{
             return response()->json([
                    'message' => 'Your data not submited!'
            ],401);
        }
    }



    
}