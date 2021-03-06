<?php

namespace App\Http\Controllers;

use App\Models\Furniture;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;


class FurnitureController extends Controller
{
    public function AllFurniture(){
        $furnitures = Furniture::latest()->paginate(4);
        // $trashCat = Furniture::onlyTrashed()->latest()->paginate(3);
        return view('viewFurniture', compact('furnitures'));
    }
    public function ViewAddFurniture(){
        $furnitures = Furniture::latest()->paginate(5);

        return view('addFurniture',compact('furnitures'));
    }

    public function AddFurniture(Request $request){
        $validated = $request->validate([
            'furnitureName' => 'required|unique:furniture|max:15',
            'furniturePrice' => 'required|numeric|between:5000,10000000',
            'furnitureType' => 'required|in:Chair,Table,Sofa',
            'furnitureColor' => 'required|in:Red,Blue,Yellow',

            'furnitureImage' => 'required|mimes:jpg,jpeg,png',
        ],
        
        );
        $furnitureImage = $request->file('furnitureImage');
        $nameGen = hexdec(uniqid());
        // $imgExt = strtolower($furnitureImage->getClientOriginalExtension());
        $imgName = time().'.'.$furnitureImage->getClientOriginalExtension();
        Storage::putFileAs('public/header/', $furnitureImage, $imgName);


//        dd($product);
        // $product->save();
        // $imgName = $nameGen.'.'.$imgExt;
        $upLocation = 'header/';
        $lastImg = $upLocation.$imgName;
        $furnitureImage->move( $upLocation,$imgName);
        Furniture::insert([
            'furnitureName'=> $request -> furnitureName,
            'furniturePrice'=> $request -> furniturePrice,
            'furnitureType'=> $request -> furnitureType,
            'furnitureColor'=> $request -> furnitureColor,

            'furnitureImage' => $lastImg,
        ]);

        // $category =  new Category;
        // $category->category_name = $request -> category_name;
        // $category->user_id = Auth::user() ->id;
        // $category->save();

        // $data = array();
        // $data['category_name'] = $request->category_name;
        // $data['user_id'] = Auth::user()->id;
        // DB::table('categories')->insert($data);

        return Redirect()->back()->with('success','Furniture Inserted Succesfully');
    }

    public function Edit($id){
        $furnitures = Furniture::find($id);
        return view('updateFurniture', compact('furnitures'));
    }

    public function Update(Request $request, $id){
        $validated = $request->validate([
            'furnitureName' => 'required|unique:furniture|max:15',
            'furniturePrice' => 'required|numeric|between:5000,10000000',
            'furnitureType' => 'required|in:Chair,Table,Sofa',
            'furnitureColor' => 'required|in:Red,Blue,Yellow',

            'furnitureImage' => 'mimes:jpg,jpeg,png',
        ],
        
        );
        $furnitureImage = $request->file('furnitureImage');
        if($furnitureImage){
            $nameGen = hexdec(uniqid());
            // $imgExt = strtolower($furnitureImage->getClientOriginalExtension());
            $imgName = time().'.'.$furnitureImage->getClientOriginalExtension();
            Storage::putFileAs('public/header/', $furnitureImage, $imgName);
    
    
    //        dd($product);
            // $product->save();
            // $imgName = $nameGen.'.'.$imgExt;
            $upLocation = 'header/';
            $lastImg = $upLocation.$imgName;
            $furnitureImage->move( $upLocation,$imgName);
            Furniture::find($id)->update([
                'furnitureName'=> $request -> furnitureName,
                'furniturePrice'=> $request -> furniturePrice,
                'furnitureType'=> $request -> furnitureType,
                'furnitureColor'=> $request -> furnitureColor,
    
                'furnitureImage' => $lastImg,
            ]);
    
        
    
            return Redirect()->route('all.furniture')->with('success','Furniture Updated Succesfully');
        }
        else{
            Furniture::find($id)->update([
                'furnitureName'=> $request -> furnitureName,
                'furniturePrice'=> $request -> furniturePrice,
                'furnitureType'=> $request -> furnitureType,
                'furnitureColor'=> $request -> furnitureColor,
    
            ]);
    
        
    
            return Redirect()->route('all.furniture')->with('success','Furniture Inserted Succesfully');
        }
        
    }
    public function Delete($id){
        $image = Furniture::find($id);
        $oldImage = $image->furnitureImage;
        unlink($oldImage);
        Furniture::find($id)->delete();
        return Redirect()->back()->with('success','Furniture deleted successfully');
    }
    public function home(){
        $furnitures = Furniture::inRandomOrder()->take(4)->get();
        // $furnitures = Furniture::latest()->paginate(5);

        return view('home',compact('furnitures'));
    }
    public function Detail($id){
        $furnitures = Furniture::find($id);
        return view('furnitureDetail', compact('furnitures'));
    }
    public function search(Request $request){
        $search_query = $request->query('query');
        $furnitures = Furniture::where('furnitureName', "LIKE", "%$search_query%")->paginate(4)->appends(['query' =>$search_query]);
        return view('viewFurniture')->with('furnitures', $furnitures);
    }
    // public function search(){
    //     $furnitures = Furniture::latest()->paginate(4);
    //     $search_text = Furniture::get('search');

    //     // $search_text = $_GET['query'];
    //     // if($search_text == "") return view("viewFurniture", compact("furnitures"));

    //     $furnitures = Furniture::where('furnitureName', 'LIKE','%'.$search_text.'%')->paginate(4);
    //     $furnitures->appends(['search' => $search_text]);

    //     return view('search', compact('furnitures'));
    // }
}
