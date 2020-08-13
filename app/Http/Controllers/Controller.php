<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller as BaseController;
use Symfony\Component\HttpFoundation\Response;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    protected function actionSuccess()
    {
        return toast('تمت العملية بنجاح', 'success')->position('top-start');
    }

    protected function canAccess(string $action, string $model)
    {
        return abort_if(auth()->user()->cannot(app('roleHelper')->crudsToName($action), $model), Response::HTTP_FORBIDDEN, '403 FORBIDDEN');
    }

    protected function storeImg(Request $request, string $input, string $folder)
    {
        if ($request->hasFile($input)) {
            $request['img'] = 'storage/' . $request->file($input)->store($folder, 'public');
        }
    }
}
