<?php

namespace App\Http\Controllers\Devices;

use App\Device;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\DeviceRequest;

class DeviceController extends Controller
{
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('devices.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(DeviceRequest $request)
    {
        $data = $request->validated();
        $data['user_id'] = \Auth::user()->id;

        $device = Device::create($data);

        if ($request->hasFile('image')) {
            $id = $device->id;
            $upload = $request->file('image');
            $extention = $upload->extension();
            $path = $upload->storeAs("devices/$id/images", "device_image.$extention", 'public');

            $data['image_path'] = $path;
        }


        $device->update($data);

        return redirect()->route('index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Device  $device
     * @return \Illuminate\Http\Response
     */
    public function show(Device $device)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Device  $device
     * @return \Illuminate\Http\Response
     */
    public function edit(Device $device)
    {
        return view('devices.edit', compact('device'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Device  $device
     * @return \Illuminate\Http\Response
     */
    public function update(DeviceRequest $request, Device $device)
    {
        if (strtolower($request->input('action')) === "delete") {
            return $this->destroy($device);
        }

        $data = $request->validated();
        $data['user_id'] = \Auth::user()->id;

        if ($request->hasFile('image')) {
            $id = $device->id;
            $upload = $request->file('image');
            $extention = $upload->extension();
            $path = $upload->storeAs("devices/$id/images", "device_image.$extention", 'public');

            $data['image_path'] = $path;

            logger($request->file('image')->path());
            logger($request->file('image')->extension());
        }

        $device->update($data);

        return redirect()->route('index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Device  $device
     * @return \Illuminate\Http\Response
     */
    public function destroy(Device $device)
    {
        $device->delete();
        return redirect()->route('index');
    }
}
