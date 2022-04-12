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

    public function setIsActive(string $model, int $id, Request $request)
    {
        $modelName = 'App\Models\\'.ucfirst($model);

        if (!class_exists($modelName)) {
            abort(404);
        }

        $model = $modelName::find($id);

        if (!$model) {
            abort(404);
        }

        $model->is_active = $request->is_active ?? !$model->is_active;
        $model->save();

         //  where to redirect?
    }
}
