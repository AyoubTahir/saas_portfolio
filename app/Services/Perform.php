<?php

namespace App\Services;

use App\Support\SaveModel\SaveModel;
use Illuminate\Support\Facades\Auth;

class Perform
{
    public static function index($Modal, $relation = null, $all = false)
    {
        $data = $Modal::where('user_id', Auth::id());

        if ($relation) {
            $data->with($relation);
        }

        if (!$all) {
            return $data->first();
        } else {
            return $data->get();
        }
    }

    public static function update($Modal, $request)
    {
        $row =  $Modal::where('user_id', Auth::id())->first();

        $request['user_id'] = Auth::id();

        $data = $request->only(array_keys((new $Modal())->saveableFields()));

        if ($row) {
            (new SaveModel($row, $data))->execute();
        } else {
            (new SaveModel(new $Modal(), $data))->execute();
        }
    }

    public static function store($Modal, $secModal, $request, $idString = null)
    {
        $row =  $Modal::where('user_id', Auth::id())->first();

        if ($row) {

            if ($idString) {
                $request[$idString] = $row->id;
            }

            $data = $request->only(array_keys((new $secModal())->saveableFields()));

            (new SaveModel(new $secModal(), $data))->execute();
        }
    }

    public static function createOrUpdate($Model, $request, $id = null)
    {
        $request['user_id'] = Auth::id();

        $data = $request->only(array_keys((new $Model())->saveableFields()));

        if ($id) {

            $row = $Model::where('id', $id)->where('user_id', Auth::id())->firstOrFail();

            if ($row) {
                $obj = (new SaveModel($row, $data))->execute();
            }
        } else {
            $obj = (new SaveModel(new $Model(), $data))->execute();
        }

        return $obj;
    }

    public static function findFirstOrFail($Model, $id, $relation = null)
    {
        $row =  $Model::where('id', $id)->where('user_id', Auth::id());

        if ($relation) {
            $row = $row->with($relation);
        }

        return $row->firstOrFail();
    }
}
