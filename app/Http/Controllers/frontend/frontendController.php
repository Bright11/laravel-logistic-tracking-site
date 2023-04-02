<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use App\Models\About;
use App\Models\Cart;
use App\Models\Commpletedorder;
use App\Models\Contact;
use App\Models\Order;
use App\Models\Product;
use App\Models\Shipping;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;

class frontendController extends Controller
{
    public function index()
    {
        $pro = Product::paginate(12);
        return view('frontend.index', ['pro' => $pro]);
    }


    public function cartpage()
    {
        //request()->ip();
        if (Auth::user()) {
            $getcart = Cart::where('user_id', Auth::user()->id)->get();

            return view('frontend.cartpage', ['getcart' => $getcart]);
        } else {
            return redirect('login');
        }
    }
    public function addtocartnow(Request $req, $id)
    {
        if(Auth::user()){


        $cart = new Cart;

        $findpro =    Product::find($id);
        $checkcart = Cart::where('product_id', $id)->where('user_id', Auth::user()->id)->first();
        //return $checkcart;
        if ($checkcart) {
            $checkcart->qty = $checkcart->qty + 1;
            $checkcart->total_price = $findpro->selling_price + $checkcart->total_price;
            $checkcart->update();
            return redirect()->back()->with('status', 'Success');
        } else {
            $cart->product_id = $findpro->id;
            $cart->total_price = $findpro->selling_price;
            $cart->user_id = Auth::user()->id;
            $cart->qty = 1;
            $cart->save();
            return redirect()->back()->with('status', 'Success');
        }
        } else {
            return redirect('login')->with('status', 'Success');
        }
    }

    public function checkoutpage()
    {
        //tracking_code
        if (Auth::user()) {
            $getcart = Cart::where('user_id', Auth::user()->id)->get();
            return view('frontend.checkoutpage', ['getcart' => $getcart]);
        } else {
            // $getcart = Cart::where('user_ip', request()->ip())->get();
            return redirect('login');
        }
    }
    public function placorder(Request $req)
    {
        $validated = $req->validate([
            'number' => 'required',
            'country' => 'required',
            'state' => 'required',
            'address' => 'required'
        ]);
        if (Auth::user()) {
            $copycart = DB::table('carts')->where('user_id', Auth::user()->id)->get();
            $getdata = [];
            foreach ($copycart as $c) {
                $getdata[] = ['product_id' => $c->product_id, 'total_price' => $c->total_price, 'qty' => $c->qty, 'user_id' => $c->user_id,'username'=>Auth::user()->name];
            }
            DB::table('orders')->insert($getdata);

            $str = "gfHUYedgohytrVHQW[plmkjhty";
        $str = str_shuffle($str);
        $str = substr($str, 10);
            $shipping = Shipping::where('user_id', Auth::user()->id)->first();


            $shipping->country = $req->country;
            $shipping->number = $req->number;
            $shipping->state = $req->state;
            $shipping->user_id = Auth::user()->id;
            $shipping->email = Auth::user()->email;
             $shipping->username = Auth::user()->name;
            $shipping->nearest_city = $req->nearest_city;
            $shipping->currnet_state = $req->country;
            $shipping->tracking_code = $str;
            $shipping->status= 'processing';
            $shipping->address=$req->address;
            $shipping->update();
            $delecart=[Auth::user()->id];
           $deletecat= Cart::whereIn('user_id', $delecart)->delete();
           if($deletecat){
            //emila sent
            $data=[
                'from'=>'brightcwebdeveloper@gmail.com',
                'sender'=> 'brightcwebdeveloper@gmail.com',
                'to'=>Auth::user()->email,
                'body'=>'testing mail',
                    'tracking' => $str,

            ];
            Mail::send('frontendemail',$data, function($sendmessage)use($data){
                    $sendmessage->from($data['from'], "Maximum Global Security");
                $sendmessage->sender($data['sender']);
                $sendmessage->to($data['to'], 'brightcwebdeveloper@gmail.com');
                    $sendmessage->replyTo('brightcwebdeveloper@gmail.com');
                    $sendmessage->subject('My order from Maximum security');
            });
            //the end
           }
            return redirect()->back()->with('status', 'Success');
        } else {
            return redirect('login');
        }
    }

    public function usercommletedorder()
    {
        $commleteorder=Commpletedorder::where('user_id',Auth::user()->id)->get();
        return view('frontend.usercommletedorder',['commleteorder'=> $commleteorder]);
    }

    public function viewdetails(String $product)
    {
        $prodetals=Product::where("slug",$product)->first();
        return view('frontend.viewdetails',['prodetals'=> $prodetals]);

    }

    public function removecart($id)
    {
        $removecart=Cart::where('id',$id)->where('user_id', Auth::user()->id)->delete();
        return redirect()->back()->with('status','success');
    }

    public function searchdata(Request $req)
    {
        $getpro = Product::where('name', 'like', "%$req->name%")->get();

        return view('frontend.search',['getpro'=> $getpro]);
    }

    public function procategory(string $slug)
    {
        $procat=Product::where('cat_slug',$slug)->get();
       // dd($procat);
       return view('frontend.procategory',['procat'=> $procat]);
    }

    public function updatecart(Request $req,$id)
    {
        $updatecart=Cart::where('id',$id)->where('user_id',Auth::user()->id)->first();
        $findpro =    Product::find($updatecart->product_id);
        $aValid = array('-', '_', '+','*','%','#','!','~','/',);
        if($req->qty==0){
            // return redirect()->back();
            return redirect()->back()->with('status', 'error');
        }elseif($req->qty<0){
            return redirect()->back()->with('status', 'error');
        }elseif(!ctype_alnum(str_replace($aValid, '', $req->qty))){
            //if (Str::contains($input, 'm'))

            return redirect()->back()->with('status', 'error');
        }else{

            $updatecart->qty= $updatecart->qty+ $req->qty;
            $updatecart->total_price= $findpro->selling_price * $updatecart->qty;
            $updatecart->update();
            return redirect()->back()->with('status', 'Success');
        }


    }

    public function about()
    {
        $about=About::all();
        return view('frontend.aboutus',['about'=> $about]);
    }

    public function contact()
    {
        return view('frontend.contact');
    }
    public function sendmessage(Request $req)
    {
        $validated = $req->validate([
            'name' => 'required',
            'email' => 'required',
            'message' => 'required',

        ]);
        $contact=new Contact;
        $contact->name=$req->name;
        $contact->email=$req->email;
        $contact->message=$req->message;
        $contact->save();
        if($contact){
            //emila sent
            $data = [
                 'fromname' => $req->name,
                'from' => $req->email,
                'sender' => 'brightcwebdeveloper@gmail.com',
                'to' => 'brightcwebdeveloper@gmail.com',
                'body' => $req->message,


            ];
            Mail::send('contactemail', $data, function ($sendmessage) use ($data) {
                $sendmessage->from($data['from'], "Maximum Global Security");
                $sendmessage->sender($data['from']);
                $sendmessage->to($data['to']);
                $sendmessage->replyTo($data['from']);
                $sendmessage->subject('Inquiry from Maximum security');
            });
            //the end

            return redirect()->back()->with('status','Thank you for your message!');
        }
    }
}
