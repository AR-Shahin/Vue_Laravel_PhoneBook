<?php

namespace App\Http\Controllers;

use App\Models\Phone;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Requests\PhoneRequest;

class PhoneController extends Controller
{
    public function getAllPhoneBook()
    {
        $data = Phone::orderBy('name', 'ASC')->get();
        //$data = Phone::paginate(3);
        return response()->json($data);
    }

    public function getAllCategoryForPagination()
    {
        $data = Category::paginate(5);
        return response()->json($data);
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PhoneRequest $request)
    {
        $data = $request->validated();
        $phone = Phone::create($data);
        return $phone;
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Phone  $phone
     * @return \Illuminate\Http\Response
     */
    public function show(Phone $phone)
    {
        return ($phone)->toArray();
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Phone  $phone
     * @return \Illuminate\Http\Response
     */
    public function edit(Phone $phone)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Phone  $phone
     * @return \Illuminate\Http\Response
     */
    public function update(PhoneRequest $request)
    {
        Phone::find($request->input('id'))->update($request->validated());
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Phone  $phone
     * @return \Illuminate\Http\Response
     */
    public function destroy(Phone $phone)
    {
        Phone::find($phone->id)->delete();
    }
}
