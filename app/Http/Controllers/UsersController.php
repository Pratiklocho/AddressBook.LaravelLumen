<?php
/**
 * Created by Visual Studio Code.
 * User: Yp
 * Date: 27-09-2018
 * Time: 10:00
 */

namespace App\Http\Controllers;
use App\Users;
use Validator;
use DB;
use Illuminate\Http\Request;
use Auth; 

class UsersController extends Controller
{
    public function __construct()
    {
        date_default_timezone_set('Asia/Kolkata');
        header("Access-Control-Allow-Origin: *");
       
    }
    public function showAllUsers()
    {
        return response()->json(['success'=>1,'data'=>Users::all(),'message'=>'success']);
    }
    /**
     * Login User in the System  Check Email id and password without any encryption.
     * Created by : yp at 27-09-2018
     */
    public function loginUser(Request $request) 
    {
        $customMessages = [
            'required' => 'Please fill :attribute',
        ];
        $validator = Validator::make($request->all(), [
            'email_id' => 'required|email',
            'password' => 'required',
        ], $customMessages);

        if($validator->fails()) {
            $errors = $validator->errors();
            return response()->json(['success'=> 0, 'data' => [] , 'message' => $errors]);
        } else {
            $user = Users::where('email_id', $request->email_id)->where('password',$request->password)->first();
            print_r(DB::getQueryLog()); 
            if ($user === null) {
                return response()->json(['success' => 0, 'data'=> $request->email_id , 'messsage' => 'Invalid EmailId or Password.']);
            } else{
                return response()->json(['success' => 1, 'data'=> $request->email_id , 'messsage' => 'User Login Successfully']);   
            }
        }
    }
    /**
     * Testing Only
     */
    public function login(){ 
        if(Auth::attempt(['email' => request('email'), 'password' => request('password')])) { 
            $user = Auth::user(); 
            $success['token'] =  $user->createToken('MyApp')-> accessToken; 
            return response()->json(['success' => $success], $this-> successStatus); 
        } else { 
            return response()->json(['error'=>'Unauthorised'], 401); 
        } 
    }
    /**
     * Register new User in the System with Unique Email id wothout any encryption.
     * Created by : yp at 27-09-2018
     */
    public function registerUser(Request $request)
    {    
        $customMessages = [
            'required' => 'Please fill :attribute',
        ];
        $validator = Validator::make($request->all(), [
            'first_name' => 'required',
            'last_name' => 'required',
            'email_id' => 'required|email|unique:users',
            'password' => 'required',
            'c_password' => 'required|same:password', 
        ], $customMessages);

        if($validator->fails()){
            $errors = $validator->errors();
            return response()->json(['success'=> 0, 'data'=>[] , 'message'=>$errors]);
        } else {
            $data = [];
            $data = $request->all();
            $data['is_active'] = '1';
            $user = Users::create($data);
            return response()->json(['success' => 1, 'data'=> $user , 'messsage' => 'User Register Successfully']);
        }
    }
}