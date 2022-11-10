<?php


namespace App\Http\Controllers;


use App\Models\Car;
use App\Models\User;
use Illuminate\Http\Request;

class IndexController extends Controller
{
    public function index(){
        return view('welcome',[
            'users' => User::all(),
            'cars' => Car::where('user_id', null)->get()
        ]);
    }

    public function free_cars(){
        return response()->json(Car::where('user_id', null)->select('brand', 'model')->get());
    }

    public function link(Request $request){
        $uid = $request->input('uid');
        $cid = $request->input('cid');

        if(empty($uid) || empty($cid))
            return response()->json(['message' => 'user ID or car ID is empty'])->setStatusCode(403);

        if(!User::find($uid))
            return response()->json(['message' => 'user not found'])->setStatusCode(403);

        $car = Car::find($cid);
        if(!$car)
            return response()->json(['message' => 'car not found'])->setStatusCode(403);

        if($car->user_id)
            return response()->json(['message' => 'car is busy'])->setStatusCode(403);

        $car->user_id = $uid;
        if($car->save())
            return response()->json(['status' => 'success'])->setStatusCode(200);

    }


    public function clear( $id ){
        $car = Car::find($id);
        $car->user_id = NULL;
        if($car->save())
            return response()->json(['status' => 'success'])->setStatusCode(200);
    }

}