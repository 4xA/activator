<?php

namespace App\Http\Controllers\Devices;

use App\DeviceType;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class DeviceTypeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $deviceTypes = DeviceType::all();
        return view('devices.types.index', compact('deviceTypes'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('devices.types.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), ['name' => 'required']);
        $validator->validate();

        DeviceType::create($request->all());

        return redirect()->route('admin.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\DeviceType  $deviceType
     * @return \Illuminate\Http\Response
     */
    public function show(DeviceType $deviceType)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\DeviceType  $deviceType
     * @return \Illuminate\Http\Response
     */
    public function edit(DeviceType $type)
    {
        return view('devices.types.edit', compact('type'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\DeviceType  $deviceType
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $deviceType)
    {
        $validator = Validator::make($request->all(), ['name' => 'required']);
        $validator->validate();

        $deviceType->update($request->all());

        return redirect()->route('devices.types.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\DeviceType  $deviceType
     * @return \Illuminate\Http\Response
     */
    public function destroy(DeviceType $deviceType)
    {
        //
    }
}
