<?php

namespace App\Http\Controllers\Devices;

use App\Device;
use App\DeviceToggles;
use App\DeviceType;
use App\Http\Controllers\Controller;
use App\Http\Requests\DeviceRequest;
use App\Http\Requests\DeviceTogglesRequest;
use Illuminate\Support\Facades\View;

class DeviceController extends Controller
{
    public function __construct()
    {
        $this->middleware('log')->except(['create', 'show', 'edit']);
        $this->middleware(function($request, \Closure $next) {
            if (\strtolower(\Auth::user()->first_name) == 'bob') {
                return redirect()->route('index')->with([
                    'status' => 'danger',
                    'message' => 'We do not serve Bobs around here.'
                ]);
            }
            return $next($request);
        });
    }

    public function precede()
    {
        return redirect()->route('index')->with([
            'status' => 'success',
            'message' => 'A preceding route to resource'
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $types = DeviceType::orderBy('name')->get();
        if (View::exists('devices.create')) {
            return view('devices.create', compact('types'));
        } else {
            return redirect()->route('index');
        }
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
        $types = DeviceType::orderBy('name')->get();
        return view('devices.edit', compact('device', 'types'));
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

    public function panel(Device $device)
    {
        $type = strtolower($device->type->name);
        $data = $device->togglesArray();
        return view()->first(["devices.panels.$type", 'devices.panels.generic'], compact('device', 'data'));
    }

    public function toggle(DeviceTogglesRequest $request, Device $device)
    {
        $togglesArray = [];
        foreach ($request->input('toggles') as $toggle) {
            $toggle = DeviceToggles::firstOrCreate(['device_id' => $device->id]);
            $toggleArray = [
                'key' => $toggle->key,
                'value' => $request->input('toggles')[$toggle->key]
            ];
            $togglesArray[] = $toggleArray;
            $toggle->update($toggleArray);
            $device->toggles()->save($toggle);
        }
        return response()->json(['status' => 'success', 'toggles' => $togglesArray]);
    }
}
