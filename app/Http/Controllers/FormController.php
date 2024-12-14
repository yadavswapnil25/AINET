<?php

namespace App\Http\Controllers;

use App\Models\Ppf;
use App\Models\Country;
use Illuminate\Http\Request;

class FormController extends Controller
{
    public function getPpf(){
        $countries = Country::all();
        return view('forms.ainet2025ppf',compact('countries'));
    }

    public function storePpfs(Request $request){
        $request->validate([
            'main_title'=> 'required',
            'main_name'    => 'required',
            'main_title'    => 'required',
            'main_work'    => 'required',
            'presenter_main_country_code'    => 'required',
            'main_phone'    => 'required',
            'presenter_main_email'    => 'required',
            'pr_area'=> 'required',
            'pr_nature'=> 'required',
            'pr_abstract'=>'required',
            'presenter_bio'=>'required',
            'pr_title'=>'required'

        ]);
        $ppf = new Ppf;

        $ppf->main_title = $request->main_title;
        $ppf->main_name = $request->main_name;
        $ppf->main_work = $request->main_work;
        $ppf->main_phone = $request->main_phone;
        $ppf->main_country_code = $request->presenter_main_country_code;
        $ppf->main_email = $request->presenter_main_email;
        $ppf->co1_title = $request->co1_title;
        $ppf->co1_name = $request->co1_name;
        $ppf->co1_work = $request->co1_work;
        $ppf->co1_country_code = $request->co1_country_code;
        $ppf->co1_phone = $request->co1_phone;
        $ppf->co1_email = $request->co1_email;
        
        $ppf->co2_title = $request->co2_title;
        $ppf->co2_name = $request->co2_name;
        $ppf->co2_work = $request->co2_work;
        $ppf->co2_country_code = $request->co2_country_code;
        $ppf->co2_phone = $request->co2_phone;
        $ppf->co2_email = $request->co2_email;
        
         $ppf->co3_title = $request->co3_title;
        $ppf->co3_name = $request->co3_name;
        $ppf->co3_work = $request->co3_work;
        $ppf->co3_country_code = $request->co3_country_code;
        $ppf->co3_phone = $request->co3_phone;
        $ppf->co3_email = $request->co3_email;

        $ppf->sub_theme = $request->pr_area;
        $ppf->sub_theme_other = $request->pr_area_specify;

        $ppf->pr_nature = $request->pr_nature;

        $ppf->pr_title = $request->pr_title;
        $ppf->pr_abstract = $request->pr_abstract;
        $ppf->pr1_bio = $request->presenter_bio;
        $ppf->pr2_bio = $request->co_presenter_1_bio;
        $ppf->pr3_bio = $request->co_presenter_2_bio;
        $ppf->pr4_bio = $request->pr3_bio;
        $ppf->save();

        // Mailgun configuration
        // $mailgunDomain = env('MAILGUN_DOMAIN');
        // $mailgunSecret = env('MAILGUN_SECRET');
        // $templateContent = View::make('mails.ppf')->render();
        // // Send email with Mailgun and error handling
        // try {
        //     $client = new Client();
        //     $response = $client->post("https://api.mailgun.net/v3/$mailgunDomain/messages", [
        //         'auth' => ['api', $mailgunSecret],
        //         'form_params' => [
        //             'from' => 'AINET <membership@theainet.net>',
        //             'to' => $request->presenter_main_email,
        //             'subject' => 'Presentation Proposal Registration Confirmation: 8th AINET CONFERENCE (Online) 2025',
        //             'html' => $templateContent,
        //         ],
        //     ]);
            
        //     // Check if the request was successful
        //     if ($response->getStatusCode() !== 200) {
        //         // Handle error response
        //         Log::error('Mailgun API request failed with status: ' . $response->getStatusCode());
        //         return redirect()->route('ainet2025ppf')->with('status', 'email-failed');
        //     }
        // } catch (Exception $e) {
        //     // Log the error and send a fallback notification
        //     Log::error('Mailgun API request failed: ' . $e->getMessage());

        //     return redirect()->route('ainet2025ppf')->with('status', 'email-failed');
        // }
    
       return redirect()->route('form.ppf')->with('status','success');

    }
}
