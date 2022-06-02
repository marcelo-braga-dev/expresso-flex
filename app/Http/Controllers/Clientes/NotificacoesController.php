<?php

namespace App\Http\Controllers\Clientes;

use App\Http\Controllers\Controller;
use App\Models\UsersNotifications;

class NotificacoesController extends Controller
{
    public function update($id)
    {
        (new UsersNotifications())->newQuery()
            ->find($id)
            ->update([
                'status' => 0
            ]);
        return redirect()->back();
    }
}
