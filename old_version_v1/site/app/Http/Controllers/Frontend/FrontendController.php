<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\About\About;
use App\Models\Blogs\Blog;
use App\Models\Branch\Branch;
use App\Models\Career\Career;
use App\Models\Explore\Explore;
use App\Models\Job\Job;
use App\Models\News\News;
use App\Models\NewsList\NewsList;
use App\Models\Page\Page;
use App\Models\PageMenu\PageMenu;
use App\Models\Product\Product;
use App\Models\Promotion\Promotion;
use App\Models\Province\Province;
use App\Models\Report\Report;
use App\Models\Settings\Setting;
use App\Models\Subscriber\Subscriber;
use App\Repositories\Frontend\Pages\PagesRepository;
use Doctrine\Common\Cache\Cache;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Request;
use phpDocumentor\Reflection\Project;
use PHPMailer\PHPMailer\PHPMailer;
use PhpParser\Node\Stmt\Catch_;

/**
 * Class FrontendController.
 */
class FrontendController extends Controller
{
    /**
     * @return \Illuminate\View\View
     */
    public function index()
    {
        $settingData = Setting::first();
        $google_analytics = $settingData->google_analytics;

        return view('frontend.index', compact('google_analytics', $google_analytics));
    }

    /**
     * show page by $page_slug.
     */
    public function showPage($slug, PagesRepository $pages)
    {
        $result = $pages->findBySlug($slug);

        return view('frontend.index')
            ->withpage($result);
    }

    public function getPage($id, $slug)
    {

        if ($slug == 'home') {
            return Redirect::to(route('frontend.index'));
        } elseif ($id == 21) {
            $news = News::where('parent_id', '!=', null)->paginate(8);
            return view('frontend.news', compact('news'));
        } else {
            $page = PageMenu::whereSlug($slug)->first();
            return view('frontend.' . $page->template . '', compact('page'));
        }

    }

    public function getSubPage($id, $slug)
    {

        if ($slug == 'branch-network') {
            $parent = PageMenu::whereSlug($slug)->first();
            $page = Branch::find($id);
            return view('frontend.branch_detail', compact('page','parent'));
        } elseif ($slug == 'products-services') {
            $products = Product::where('parent_id', '!=', null)->where('parent_id',$id)->paginate(8);
            $cats = Product::where('parent_id', null)->get();
            $page = PageMenu::whereSlug($slug)->first();
            $cat = Product::find($id);
            return view('frontend.product', compact('products', 'cats','page','cat'));
        } elseif ($id == 13) {
            $news = NewsList::paginate(8);
            $new = News::find($id);
            $parent=PageMenu::whereSlug($slug)->first();
            return view('frontend.news', compact('news','parent','new'));
        } elseif ($id == 15) {
            $news = News::where('parent_id', '!=', null)->paginate(8);
            return view('frontend.photo-video', compact('news'));
        } elseif ($slug == 'report') {
            $parent=PageMenu::whereSlug($slug)->first();
            $page = Report::find($id);
            $promotions = \App\Models\Report\Report::where('parent_id','!=',null)->where('parent_id',$id)->paginate(10);
            return view('frontend.report', compact('page','promotions'));
        } elseif ($slug == 'about-company') {
            $page = PageMenu::whereSlug($slug)->first();
            $about = About::find($id);
            return view('frontend.about', compact('page','about'));
        } elseif ($slug == 'careers') {
            if ($id == 1) {
                $positions = \App\Models\JobPosition\JobPosition::all();
                $provinces = Province::all();
                $page = Career::find($id);
                $jobs = Job::where('status','active')->paginate(10);
                return view('frontend.job-opportunity',compact('page','jobs','positions','provinces'));
            } else if ($id == 2 || $id == 3) {
                $page = Career::find($id);
                return view('frontend.how-to-apply', compact('page'));
            }


        } elseif ($slug == 'news-events') {
            $page = News::find($id);
            if ($id ==16){
                $cats = Product::where('parent_id', null)->get();
                return view('frontend.partner', compact('page','cats'));
            }else{
                return view('frontend.page_default', compact('page'));
            }


        } else {

            $page = PageMenu::whereSlug($slug)->first();
            return view('frontend.page_default', compact('page'));
        }

    }

    public function promotion($id, $slug)
    {
        $promotion = Promotion::find($id);
        $page = PageMenu::find(20);
        $news = NewsList::orderBy('id', 'DESC')->take(5)->get();
        $promotions = Promotion::orderBy('id', 'DESC')->take(5)->get();
        return view('frontend.promotion_detail', compact('promotion', 'promotions', 'page', 'news'));
    }
    public function report($id, $slug)
    {
        $promotion = Report::find($id);
        $page = PageMenu::find(22);
        $news = NewsList::orderBy('id', 'DESC')->take(5)->get();
        $promotions = Report::orderBy('id', 'DESC')->where('parent_id','!=',null)->take(5)->get();
        return view('frontend.reportdetail', compact('promotion', 'promotions', 'page', 'news'));
    }


    public function news($id, $slug)
    {

        $new = NewsList::find($id);
        $page = PageMenu::find(21);

        $news = NewsList::orderBy('id', 'DESC')->take(5)->get();
        $promotions = Promotion::orderBy('id', 'DESC')->take(5)->get();
        return view('frontend.news_detail', compact('new', 'promotions', 'page', 'news'));
    }

    public function productDetail($id, $slug)
    {
        $product = Product::find($id);
        $related = Product::where('parent_id', $product->parent_id)->where('id', '!=', $product->id)->take(5)->get();

        return view('frontend.product_detail', compact('product', 'related'));
    }

    public function jobdetail($id,$slug)
    {
        $job = Job::find($id);
        $jobs = Job::where('status','Active')->get();
        return view('frontend.jobdetail',compact('job','jobs'));
    }

    public function onlineapplication()
    {
        return view('frontend.onlineapplication');
    }

    public function search_product_by_key(){
        $keyword= Request::get('t-search');
        $products=Product::where('parent_id','!=',null)
            ->where('title', 'LIKE', "%$keyword%")
            ->orWhere('title_eng', 'LIKE', "%$keyword%")
            ->paginate(10);
        $cats = Product::where('parent_id', null)->get();
        return view('frontend.search_product_by_key',compact('products','cats'));
    }

    public function searchproduct()
    {
        $queryString = Request::get('price');
        $category = Request::get('category');
        $keyword= Request::get('t-search');


        if ($queryString == 1) {
            $products=Product::where('parent_id','!=',null)
                ->where('parent_id',$category)
                ->orderBy('id', 'desc')
                ->paginate(10);
        }else  if ($queryString == 2) {
            $products=Product::where('parent_id','!=',null)
                ->where('parent_id',$category)
                ->orderBy('views', 'DESC')
                ->paginate(10);
        }else  if ($queryString == 3) {
            $products=Product::where('parent_id','!=',null)
                ->where('parent_id',$category)
                ->orderBy('price', 'asc')
                ->paginate(10);
        }else  if ($queryString == 4) {
            $products=Product::where('parent_id','!=',null)
                ->where('parent_id',$category)
                ->orderBy('price', 'desc')
                ->paginate(10);
        }



        $cats = Product::where('parent_id', null)->get();
        $cat = Product::find($category);
        $all = '';
        return view('frontend.search_product',compact('products','cats','cat'));
    }

    public function subscribe()
    {
        $email = Request::get('t-email');

        $count = Subscriber::where('email',$email)->count();
        if ($count == 0) {
            Subscriber::create([
                'email'=>$email
            ]);
        }
        return \redirect()->back();
    }

    public function searchjob()
    {
        $position = Request::get('position');
        $province = Request::get('province');

         if ($position == 'all') {
            $jobs = Job::where('status','Active')
                ->where('province_id',$province)
                ->paginate(10);
        }else if ($province == 'all') {
            $jobs = Job::where('status','Active')
                ->where('position_id',$position)
                ->paginate(10);
        }else{
             $jobs = Job::where('status','Active')

                 ->paginate(10);
         }
        $positions = \App\Models\JobPosition\JobPosition::all();
        $provinces = Province::all();

        return view('frontend.job-search',compact('jobs','positions','provinces'));
    }


    public function jobapplication(Request $request)
    {
        $postData = $uploadedFile = $statusMsg = '';
        $msgClass = 'errordiv';
        if($request)
        {
            $tname = Request::get('tname');
            $temail = Request::get('temail');
            $tphone = Request::get('tphone');
            $tmessage = Request::get('tmessage');
            $tposition = Request::get('tposition');

            $setting = Setting::find(1);

            
        }



    }

    public function explore($id,$slug)
    {
        $page = Explore::find($id);

        if ($page->id == 1) {
            $cats = Product::where('parent_id', null)->get();
            $products = Product::where('parent_id', '!=', null)->where('parent_id',$id)->paginate(8);
            return view('frontend.'.$page->view,compact('page','cats','products'));

        }else{
            return view('frontend.'.$page->view,compact('page'));
        }

    }

    public function calculate_interest()
    {
        return view('frontend.calculate-interest');
    }

    public function contactSendMail(Request $request)
    {


        if($request)
        {
            $tname = Request::get('tname');
            $temail = Request::get('temail');
            $tphone = Request::get('tphone');
            $tmessage = Request::get('tmessage');

            $setting = Setting::find(1);

            $to = $setting->from_email;
            $subject = $setting->from_name."| Contact";
// Get HTML contents from file
            $htmlContent = view('frontend.contact.contact',compact('tname','temail','tphone','tmessage'));

// Set content-type for sending HTML email
            $headers = "MIME-Version: 1.0" . "\r\n";
            $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";

// Additional headers
            $headers .= 'From: '.$tname.'<'.$temail.'>' . "\r\n";
//            $headers .= 'Cc: davy@nealika.com' . "\r\n";

// Send email
            if(mail($to,$subject,$htmlContent,$headers))
            {
                return \redirect()->back()->with(['message'=>'Email has sent successfully.']);
            }
            else{

                echo 'Some problem occurred, please try again.';
                return \redirect()->back();
            }
        }
    }

    public function customerFeedBack(Request $request)
    {

        if($request)
        {
            $tname = Request::get('tname');
            $temail = Request::get('temail');
            $tphone = Request::get('tphone');
            $tmessage = Request::get('tmessage');
            $taddress = Request::get('taddress');
            $t_pro_category = Request::get('t_pro_category');
            $tproblem = Request::get('tproblem');

            $setting = Setting::find(1);

            $to = $setting->from_email;
            $subject = $setting->from_name."| Customer Feedback";
            $htmlContent = view('frontend.contact.feedback',compact('tname','temail','tphone','tmessage','taddress','t_pro_category','tproblem'));
            $headers = "MIME-Version: 1.0" . "\r\n";
            $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";

            $headers .= 'From: '.$tname.'<'.$temail.'>' . "\r\n";
//            $headers .= 'Cc: davy@nealika.com' . "\r\n";

            if(mail($to,$subject,$htmlContent,$headers))
            {
                return \redirect()->back()->with(['message'=>'Email has sent successfully.']);
            }
            else{

                echo 'Some problem occurred, please try again.';
                return \redirect()->back();
            }
        }
    }
    public function onlineapplicationsubmit(Request $request)
    {

        if($request)
        {
            $tname = Request::get('tname');
            $temail = Request::get('temail');
            $tphone = Request::get('tphone');
            $tmessage = Request::get('tmessage');
            $taddress = Request::get('taddress');
            $tjob = Request::get('tjob');
            $tproduct = Request::get('product');

            $setting = Setting::find(1);

            $to = $setting->from_email;
            $subject = $setting->from_name." | Online Application";
            $htmlContent = view('frontend.contact.application',compact('tname','temail','tphone','tmessage','taddress','tjob','tproduct'));
            $headers = "MIME-Version: 1.0" . "\r\n";
            $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";

            $headers .= 'From: '.$tname.'<'.$temail.'>' . "\r\n";
//            $headers .= 'Cc: davy@nealika.com' . "\r\n";

            if(mail($to,$subject,$htmlContent,$headers))
            {
                return \redirect()->back()->with(['message'=>'Email has sent successfully.']);
            }
            else{

                echo 'Some problem occurred, please try again.';
                return \redirect()->back();
            }
        }
    }
    public function jobSubmit(Request $request)
    {

        if($request)
        {
            $tname = Request::get('tname');
            $temail = Request::get('temail');
            $tphone = Request::get('tphone');
            $tmessage = Request::get('tmessage');
            $taddress = Request::get('taddress');
            $tjob = Request::get('tjob');
            $tposition = Request::get('tposition');

            $setting = Setting::find(1);

            $to = $setting->from_email;
            $subject = $setting->from_name." | Online Application";
            $htmlContent = view('frontend.contact.job',compact('tname','temail','tphone','tmessage','taddress','tjob','tposition'));
            $headers = "MIME-Version: 1.0" . "\r\n";
            $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";

            $headers .= 'From: '.$tname.'<'.$temail.'>' . "\r\n";
//            $headers .= 'Cc: davy@nealika.com' . "\r\n";

            if(mail($to,$subject,$htmlContent,$headers))
            {
                return \redirect()->back()->with(['message'=>'Email has sent successfully.']);
            }
            else{

                echo 'Some problem occurred, please try again.';
                return \redirect()->back();
            }
        }
    }
    public function sendPartner(Request $request)
    {

        if($request)
        {
            $tname = Request::get('tname');
            $temail = Request::get('temail');
            $tphone = Request::get('tphone');
            $tmessage = Request::get('tmessage');
            $taddress = Request::get('taddress');
            $tjob = Request::get('tjob');
            $tproduct = Request::get('product');

            $setting = Setting::find(1);

            $to = $setting->from_email;
            $subject = $setting->from_name." | Online Application";
            $htmlContent = view('frontend.contact.application',compact('tname','temail','tphone','tmessage','taddress','tjob','tproduct'));
            $headers = "MIME-Version: 1.0" . "\r\n";
            $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";

            $headers .= 'From: '.$tname.'<'.$temail.'>' . "\r\n";
//            $headers .= 'Cc: davy@nealika.com' . "\r\n";

            if(mail($to,$subject,$htmlContent,$headers))
            {
                return \redirect()->back()->with(['message'=>'Email has sent successfully.']);
            }
            else{

                echo 'Some problem occurred, please try again.';
                return \redirect()->back();
            }
        }
    }
}
