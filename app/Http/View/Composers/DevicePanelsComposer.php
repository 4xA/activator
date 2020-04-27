<?php

namespace App\Http\View\Composers;

use App\DeviceToggles;
use Illuminate\View\View;

class DevicePanelsComposer {
    public function compose(View $view)
    {
        $view->with(['toggles' => DeviceToggles::getTypes()]);
    }
}
