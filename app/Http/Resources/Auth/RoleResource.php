<?php
/**
 * Created by PhpStorm.
 * User: mouedhen
 * Date: 25/03/18
 * Time: 23:32
 */

namespace App\Http\Resources\Auth;


use Illuminate\Http\Resources\Json\Resource;

class RoleResource extends Resource
{
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'name' => $this->name,
            'display_name' => $this->display_name,
            'description' => $this->description,
        ];
    }
}