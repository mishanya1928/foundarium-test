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

        if(!$uid || !$cid)
            return response()->json(['message' => 'request is empty'])->setStatusCode(400);

        if(empty($uid) || empty($cid))
            return response()->json(['message' => 'user ID or car ID is empty'])->setStatusCode(400);

        if(!User::find($uid))
            return response()->json(['message' => 'user not found'])->setStatusCode(404);

        $car = Car::find($cid);
        if(!$car)
            return response()->json(['message' => 'car not found'])->setStatusCode(404);

        if($car->user_id)
            return response()->json(['message' => 'car is busy'])->setStatusCode(403);

        $car->user_id = $uid;
        if($car->save())
            return response()->json(['status' => 'success'])->setStatusCode(200);
        else
            return response()->json(['status' => 'fail'])->setStatusCode(500);
    }


    public function clear($id = NULL){

        if(!$id)
            return response()->json(['message' => 'request is empty'])->setStatusCode(400);

        $car = Car::find($id);
        if(!$car)
            return response()->json(['message' => 'car not found'])->setStatusCode(404);

        $car->user_id = NULL;
        if($car->save())
            return response()->json(['status' => 'success'])->setStatusCode(200);
        else
            return response()->json(['status' => 'fail'])->setStatusCode(500);
    }

}