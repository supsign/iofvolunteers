<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController
{
    use AuthorizesRequests;
    use DispatchesJobs;
    use ValidatesRequests;

    public function setIsActive(string $modelName, int $id, Request $request)
    {
        $fullModelName = 'App\Models\\'.ucfirst($modelName);

        if (!class_exists($fullModelName)) {
            abort(404);
        }

        $model = $fullModelName::find($id);

        if (!$model) {
            abort(404);
        }

        $model->is_active = $request->is_active ?? !$model->is_active;
        $model->save();

        //  where to redirect?
    }
}
