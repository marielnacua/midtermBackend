<?php

namespace App\Http\Controllers;

use App\Models\Phone;
use Exception;
use Illuminate\Http\Request;

class PhoneController extends Controller
{
    //
    public function show(Phone $phone) {
        return response()->json($phone,200);
    }

    public function search(Request $request) {
        $request->validate(['key'=>'string|required']);

        $phones = Phone::where('phone_name','like',"%$request->key%")
            ->orWhere('description','like',"%$request->key%")->get();

        return response()->json($phones, 200);
    }

    public function store(Request $request) {
        $request->validate([
            'phone_name' => 'string|required',
            'description' => 'string|required',
            'ram' => 'string|required',
            'battery' => 'string|required',
            'price' => 'numeric|required',
            'acquired_on' => 'date|required',
        ]);

        try {
            $phone = Phone::create($request->all());
            return response()->json($phone, 202);
        }catch(Exception $ex) {
            return response()->json([
                'message' => $ex->getMessage()
            ],500);
        }

    }

    public function update(Request $request, Asset $phone) {
        try {
            $phone->update($request->all());
            return response()->json($phone, 202);
        }catch(Exception $ex) {
            return response()->json(['message'=>$ex->getMessage()], 500);
        }
    }

    public function destroy(Phone $phone) {
        $phone->delete();
        return response()->json(['message'=>'Phone deleted.'],202);
    }

    public function index() {
        $phones = Phone::orderBy('phone_name')->get();
        return response()->json($phones, 200);
    }
}
