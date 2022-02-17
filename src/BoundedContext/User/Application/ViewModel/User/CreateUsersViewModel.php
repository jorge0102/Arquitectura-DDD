<?php

namespace Src\BoundedContext\User\Application\ViewModel\User;

use Illuminate\Http\Resources\Json\JsonResource;

class CreateUsersViewModel extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'name' => $this->name()->value(),
            'email' => $this->email()->value(),
            'emailVerifiedDate' => $this->emailVerifiedDate()->value(),
        ];
    }
}
