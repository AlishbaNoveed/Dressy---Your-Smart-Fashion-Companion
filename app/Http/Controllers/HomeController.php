<?php

namespace App\Http\Controllers;
use App\Models\Category;
use App\Models\Product;
use App\Models\Contact;
use App\Models\Slide;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        // $slides = Slide::where('status',1)->get()->take(4);
        $slides = Slide::where('status', 1)->get(); // fetch all active slides
        $categories = Category::orderBy('name')->get();
        $sproducts = Product::whereNotNull('sale_price')->where('sale_price','<>','')->inRandomOrder()->get()->take(8);
        // $fproducts = Product::where('featured',1)->get()->take(8);
        $fproducts = Product::where('featured',1)->get();
        return view('index',compact('slides','categories','sproducts','fproducts'));
    }

     public function about()
    {
        return view('about');
    }

    public function contact()
    {
        return view('contact');
    }

    public function contact_store(Request $request)
    {
        $request->validate([
            'name'=>'required|max:100',
            'email'=>'required|email' ,
            'phone'=>'required|numeric|digits:11',
            'comment'=>'required'
        ]);

        $contact = new Contact();
        $contact->name= $request->name;
        $contact->email= $request->email;
        $contact->phone= $request->phone;
        $contact->comment= $request->comment;
        $contact->save();
        return redirect()->back()->with('success','Your message has been sent successfully');
    }

    public function search(Request $request)
    {
       $query = $request->input('query');
       $results = Product::where('name','LIKE',"%{$query}%")->get()->take(10);
       return response()->json(  $results );

    }
}
