<?php
/**
 * Created by PhpStorm.
 * User: A
 * Date: 20-09-2018
 * Time: 13:06
 */

namespace App\Http\Controllers;
use App\Users;

class UsersController extends Controller
{
    public function showAllAuthors()
    {
        return response()->json(Users::all());
    }

    public function showOneAuthor($id)
    {
        return response()->json(Users::find($id));
    }

    public function create(Request $request)
    {
        $author = Users::create($request->all());

        return response()->json($author, 201);
    }

    public function update($id, Request $request)
    {
        $author = Users::findOrFail($id);
        $author->update($request->all());

        return response()->json($author, 200);
    }

    public function delete($id)
    {
        Users::findOrFail($id)->delete();
        return response('Deleted Successfully', 200);
    }
}