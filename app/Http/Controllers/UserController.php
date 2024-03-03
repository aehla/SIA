<?php

 namespace App\Http\Controllers;

 use Illuminate\Http\Request;
 use Illuminate\Http\Response;
 use App\Traits\ApiResponser;
 use App\Models\User;

 Class UserController extends Controller {

    use ApiResponser;
    private $request;
    public function __construct(Request $request){
        $this->request = $request;
    }

    //GET USERS
    public function getUsers(){
        $users = User::all();
        return response()->json($users, 200);
    }

    //INDEX

    public function index()
    {
        $users = User::all();
        return $this->successResponse($users);
        
    }

    //ADD USER

    public function add(Request $request ){
        $rules = [
            'username' => 'required|max:20',
            'password' => 'required|max:20',
            
        ];
        $this->validate($request,$rules);
        $user = User::create($request->all());
        return $this->successResponse($user, 
Response::HTTP_CREATED);
    }
 }