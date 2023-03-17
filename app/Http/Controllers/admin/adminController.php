<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\About;
use App\Models\Category;
use App\Models\Commpletedorder;
use App\Models\Order;
use App\Models\Product;
use App\Models\Shipping;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use Symfony\Component\Console\Input\Input;

class adminController extends Controller
{
    public function adminhome()
    {
        if (Auth::user()) {


            if (Auth::user()->isAdmin == 1) {
                return view('admin.adminhome');
            } else {
                return redirect('/');
            }
        } else {
            return redirect('/');
        }
    }
    public function addproduct()
    {
        //
        if (Auth::user()) {


            if (Auth::user()->isAdmin == 1) {
                $cat = Category::all();
                return view('admin.addproduct', ['cat' => $cat]);
            } else {
                return redirect('/')->with('status', 'Not permiteted');
            }
        } else {
            return redirect('/')->with('status', 'Not permiteted');
        }
    }

    public function addpro(Request $req)
    {
        $validated = $req->validate([
            'name' => 'unique:products|required',
            'cat_slug' => 'required',
            'selling_price' => 'required',

            'image' => 'required|image|mimes:jpeg,png,jpg',
        ]);
        if (Auth::user()) {


            if (Auth::user()->isAdmin == 1) {

                $slug = $req->name;
                $myslug = strtolower(preg_replace('/[^A-Za-z0-9-]+/', '-', $slug));
                $pro = new Product;
                $path = $pro->image = $req->image->store('public/products');
                $pro->name = $req->name;
                $pro->cat_slug = $req->cat_slug;
                $pro->slug = $myslug;
                $pro->selling_price = $req->selling_price;
                $pro->discount_price = $req->discount_price;
                $pro->description = $req->description;
                $pro->keywords = $req->keywords;
                $pro->qty = $req->qty;
                $pro->image = $path;
                $pro->save();
                return redirect('viewproduct');
            } else {
                return redirect('/');
            }
        } else {
            return redirect('/');
        }
    }

    public function viewproduct()
    {
        if (Auth::user()) {
            if (Auth::user()->isAdmin == 1) {
                $pro = Product::all();
                return view('admin.viewproduct', ['pro' => $pro]);
            } else {
                return redirect('/');
            }
        } else {
            return redirect('/');
        }
    }

    public function admin_addcategory()
    {
        if (Auth::user()) {
            if (Auth::user()->isAdmin == 1) {
                return view('admin.addcategory');
            } else {
                return redirect('/');
            }
        } else {
            return redirect('/');
        }
    }
    public function addcategory(Request $req)
    {
        $validated = $req->validate([
            'name' => 'unique:categories|required',
            'image' => 'required|image|mimes:jpeg,png,jpg',
        ]);
        if (Auth::user()) {
            if (Auth::user()->isAdmin == 1) {
                $cat = new Category;
                $slug = $req->name;
                $myslug = strtolower(preg_replace('/[^A-Za-z0-9-]+/', '-', $slug));
                $path = $cat->image = $req->image->store('public/categoryimg');
                $cat->name = $req->name;
                $cat->image = $path;
                $cat->slug = $myslug;
                $cat->save();
                return redirect('viewcategory');
            } else {
                return redirect('/');
            }
        } else {
            return redirect('/');
        }
    }

    public function viewcategory()
    {
        if (Auth::user()) {
            if (Auth::user()->isAdmin == 1) {
                $cat = Category::all();
                return view('admin.viewcategory', ['cat' => $cat]);
            } else {
                return redirect()->back();
            }
        } else {
            return redirect('/');
        }
    }
    public function viewusers()
    {
        if (Auth::user()) {
            if (Auth::user()->isAdmin == 1) {
                $users = User::all();
                return view('admin.viewusers', ['users' => $users]);
            } else {
                return redirect()->back();
            }
        } else {
            return redirect('/');
        }
    }
    public function neworder()
    {
        if (Auth::user()) {
            if (Auth::user()->isAdmin == 1) {
                $order = Order::where('order_status', 'new')->get();
                // $order = DB::table('orders')
                // ->join('users', 'orders.user_id', '=', 'users.id')->join('products','orders.product_id','=','products.id')
                // ->select('users.name', 'orders.order_date')
                //->get();
                return view('admin.neworder', ['order' => $order]);
            } else {
                return redirect('/');
            }
        } else {
            return redirect('/');
        }
    }
    public function orderontheway()
    {
        if (Auth::user()) {
            if (Auth::user()->isAdmin == 1) {
                $orderway = Order::where('order_status', 'On the way')->get();
                return view('admin.orderontheway', ['orderway' => $orderway]);
            } else {
                return redirect()->back();
            }
        } else {
            return redirect('/');
        }
    }
    public function orderdelayed()
    {
        if (Auth::user()) {
            if (Auth::user()->isAdmin == 1) {
                $orderdlayed = Order::where('order_status', 'Order delayed')->get();
                return view('admin.orderdelayed', ['orderdlayed' => $orderdlayed]);
            } else {
                return redirect()->back();
            }
        } else {
            return redirect('/');
        }
    }
    public function updateorder($id)
    {
        if (Auth::user()) {
            if (Auth::user()->isAdmin == 1) {
                $order = Order::where('user_id', $id)->first();
                $shipping = Shipping::where("user_id", $id)->first();

                return view('admin.updateorder', ["shipping" => $shipping, 'order' => $order]);
            } else {
                return redirect()->back();
            }
        } else {
            return redirect('/');
        }
    }
    public function oredrlocation(Request $req, $id)
    {
        if (Auth::user()) {
            if (Auth::user()->isAdmin == 1) {
                $shipping = Shipping::where('user_id', $id)->first();
                $order = Order::where('user_id', $id)->first();

                $shipping->currnet_state = $req->currnet_state;
                $shipping->status = $req->status;
                $shipping->message = $req->message;

                if ($req->status == 'Order Delivered') {
                    // $order->order_status="Delivered";
                    // $order->update();
                    Order::where('user_id', $id)
                        ->update(['order_status' => 'Delivered']);
                    //commpletedorders
                    //    DB::table('orders')->where('user_id',$id)->get()->each(function($row){DB::table('commpletedorders')->insert((array)$row);});
                    $copycart = DB::table('orders')->where('user_id', $id)->get();
                    $getdata = [];
                    foreach ($copycart as $c) {
                        $getdata[] = ['product_id' => $c->product_id, 'total_price' => $c->total_price, 'qty' => $c->qty, 'user_id' => $c->user_id, 'username' => $c->username, 'order_status' => $c->order_status];
                    }
                    DB::table('commpletedorders')->insert($getdata);
                    ///mover order to xommpleted table ends here

                    //$record->delete();
                    $ids = [$id]; // array of IDs to delete

                    // Delete records with the specified IDs
                    Order::whereIn('user_id', $ids)->delete();
                    //emila sent
                    $data = [
                        'from' => 'brightcwebdeveloper@gmail.com',
                        'sender' => 'brightcwebdeveloper@gmail.com',
                        'to' =>  $shipping->email,
                        'body' =>  $req->message,
                        'current_location'=> $req->currnet_state,
                        // 'tracking' => $str,

                    ];
                    Mail::send('backendemail', $data, function ($sendmessage) use ($data) {
                        $sendmessage->from($data['from'], "Maximum Global Security");
                        $sendmessage->sender($data['sender']);
                        $sendmessage->to($data['to']);
                        $sendmessage->replyTo('brightcwebdeveloper@gmail.com');
                        $sendmessage->subject('Order Information from Maximum security');
                    });
            //the end
                }
                $shipping->update();
                if ($shipping) {
                    Order::where('user_id', $id)
                        ->update(['order_status' => $req->status]);
                }
                return redirect('neworder');
            } else {
                return redirect()->back();
            }
        } else {
            return redirect('/');
        }
    }

    public function deletepro($id)
    {
        if (Auth::user()) {
            if (Auth::user()->isAdmin == 1) {
                $checkpro = Product::find($id);
                $checkorder = Order::where('product_id', $id)->first();
                $checkcompeletorder = Commpletedorder::where('product_id', $id)->first();
                if ($checkpro) {
                    if ($checkorder || $checkcompeletorder) {
                        return redirect()->back()->with('status', 'Product are on demand');
                    } else {
                        Product::destroy($id);
                        return redirect()->back()->with('status', 'success');
                    }
                }
                return redirect()->back()->with('status', 'success');
            } else {
                return redirect()->back();
            }
        } else {
            return redirect('/');
        }
    }
    public function editpro($id)
    {
        if (Auth::user()) {
            if (Auth::user()->isAdmin == 1) {
                $cat = Category::all();
                $pro = Product::find($id);
                return view('admin.editpro', ['cat' => $cat, 'pro' => $pro]);
            } else {
                return redirect('/');
            }
        } else {
            return redirect('/');
        }
    }

    public function uodatenow(Request $req, $id)
    {
        if (Auth::user()) {


            if (Auth::user()->isAdmin == 1) {

                $pro = Product::where('id', $id)->first();

                if ($req->hasFile('image')) {
                    $path = $pro->image = $req->image->store('public/products');
                    $pro->image = $path;
                }

                $slug = $req->name;
                $myslug = strtolower(preg_replace('/[^A-Za-z0-9-]+/', '-', $slug));
                $pro->name = $req->name;
                $pro->cat_slug = $req->cat_slug;
                $pro->slug = $myslug;
                $pro->selling_price = $req->selling_price;
                $pro->discount_price = $req->discount_price;
                $pro->description = $req->description;
                $pro->qty = $req->qty;
                $pro->update();
                return redirect('viewproduct');
            } else {
                return redirect('/');
            }
        } else {
            return redirect('/');
        }
    }

    public function addaboutus()
    {
        if (Auth::user()) {
            if (Auth::user()->isAdmin == 1) {
                return view('admin.addaboutus');
            } else {
                return redirect('/');
            }
        } else {
            return redirect('/');
        }
    }

    public function insertabout(Request $req)
    {
        if (Auth::user()) {
            if (Auth::user()->isAdmin == 1) {
                //  return 'yrs';
                $about = new About;
                $about->name = $req->name;
                $about->about = $req->about;
                $about->save();
                return redirect('viewaboutus');
            } else {
                return redirect('/');
            }
        } else {
            return redirect('/');
        }
    }

    public function viewaboutus()
    {
        $about=About::all();
        return view('admin.viewaboutus',['about'=> $about]);
    }
    public function deleteabout($id)
    {
        About::destroy($id);
        return redirect()->back();
    }

    public function commpletedorder()
    {
        if(Auth::user()){

            if(Auth::user()->isAdmin == 1){


        $allcommlete=Commpletedorder::all();
        return view('admin.commpletedorder',['allcommlete'=> $allcommlete]);
            }else{
                return redirect('/');
            }
        }else{
            return redirect()->back();
        }
    }
}
