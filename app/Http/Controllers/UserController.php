<?php

namespace App\Http\Controllers;

use App\Models\Vacdate;
use App\Models\Vacplace;
use Illuminate\Http\Request;
use phpDocumentor\Reflection\Types\Integer;
use Illuminate\Http\JsonResponse;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Psy\Util\Json;

class UserController extends Controller
{
    public function changeDoseState(int $user_id):JsonResponse{

    }
}
