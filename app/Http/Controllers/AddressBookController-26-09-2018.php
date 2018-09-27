<?php
/**
 * Created by PhpStorm.
 * User: A
 * Date: 20-09-2018
 * Time: 13:05
 */

namespace App\Http\Controllers;
use Validator;
use App\AddressBook;
use Illuminate\Http\Request;
//use Illuminate\Support\Facades\DB;

class AddressBookController extends Controller
{

    public function __construct()
    {
        date_default_timezone_set('Asia/Kolkata');
        header("Access-Control-Allow-Origin: *");
    }

    public function showAllAddress($id)
    {
        return response()->json(['success'=>1,'data'=>AddressBook::where('users_id',$id)->get(),'message'=>'success']);
    }

    public function showOneAuthor($id)
    {
        return response()->json(AddressBook::find($id));
    }

    public function addAddress(Request $request)
    {

        $customMessages = [
            'required' => 'Please fill :attribute',
        ];
        $validator = Validator::make($request->all(), [
            'first_name' => 'required',
            'last_name' => 'required',
            'contact_no' => 'required|numeric|size:10',
            'email_id' => 'required|email',
        ],$customMessages);

        if ($validator->fails()) {
            $errors = $validator->errors();
            return response()->json(['success'=>0,'data'=>[],'message'=>$errors]);
        } else {
            $author = AddressBook::create($request->all());
            return response()->json(['success'=>0,'data'=>$author,'message'=>"Address Added Successfully"]);
        }


        $customMessages = [
            'required' => 'Please fill attribute :attribute',
        ];

//        $rules = [
//            'first_name' => 'required',
//            'last_name' => 'required',
//            'contact_no' => 'required|numeric',
//            'email_id' => 'required|email',
//        ];

//        $customMessages = [
//            'required' => 'Please fill attribute :attribute',
//        ];
//        $validationMessage = $this->validate($request, $rules, $customMessages);
//
//        $address = new AddressBook;
//
//        $address->users_id = $request->users_id;
//        $address->first_name = $request->first_name;
//        $address->last_name = $request->last_name;
//        $address->contact_no = $request->contact_no;
//        $address->email_id = $request->email_id;
//        $address->is_active = $request->is_active;
//
//        $address->save();
//
//
//        if(count($validationMessage)>0){
//            return response()->json(['success'=>0,'data'=>[],'message'=>$validationMessage]);
//        } else {
//            $author = AddressBook::create($request->all());
//            return response()->json(['success'=>0,'data'=>$author,'message'=>"Address Added Successfully"]);
//        }



    }

    public function updateAddress($id, Request $request)
    {
		$customMessages = [
            'required' => 'Please fill :attribute',
        ];
        $validator = Validator::make($request->all(), [
            'first_name' => 'required',
            'last_name' => 'required',
            'contact_no' => 'required|numeric|size:10',
            'email_id' => 'required|email',
        ],$customMessages);

        if ($validator->fails()) {
			$errors = $validator->errors();
            return response()->json(['success'=>0,'data'=>[],'message'=>$errors]);
		} else {
			$address = AddressBook::find($id);
			$author = AddressBook::create($request->all());
            return response()->json(['success'=>0,'data'=>$author,'message'=>"Address Added Successfully"]);
		}

        

        //$address->first_name = $request->first_name;
        //$address->last_name = $request->last_name;
        //$address->contact_no = $request->contact_no;
        //$address->email_id = $request->email_id;
        //$address->is_active = $request->is_active;

        //$address->save();

        //return response()->json($address, 200);
    }

    public function delete($id)
    {
        AddressBook::find($id)->delete();
        return response('Deleted Successfully', 200);
    }
}