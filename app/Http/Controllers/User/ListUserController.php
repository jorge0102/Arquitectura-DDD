<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Src\BoundedContext\User\Application\ViewModel\User\ListUsersViewModel;

class ListUserController extends Controller
{
    /**
     * @var \Src\BoundedContext\User\Infrastructure\User\ListUserController
     */
    private $listUserController;

    public function __construct(\Src\BoundedContext\User\Infrastructure\User\ListUserController $listUserController)
    {
        $this->listUserController = $listUserController;
    }

    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke()
    {
        $users =  $this->listUserController->__invoke();

        $response = new ListUsersViewModel();

        return $response->response($users);
    }
}
