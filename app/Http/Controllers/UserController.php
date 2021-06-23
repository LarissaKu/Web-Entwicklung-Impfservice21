<?php

namespace App\Http\Controllers;

use App\Models\Vacdate;
use App\Models\Vacplace;
use http\Env\Response;
use Illuminate\Http\Request;
use phpDocumentor\Reflection\Types\Integer;
use Illuminate\Http\JsonResponse;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Psy\Util\Json;

class UserController extends Controller
{
    public function getUsersById(int $user_id){
        $users = User::with('vacdate')->where('id', $user_id)->first();
        return $users;
    }


    public function changeVacState(Request $request, int $user_id):JsonResponse{
        DB::beginTransaction();

        try{
            $user = User::where('id', $user_id)->first();

            if($user != null){
                $request = $this->parseRequest($request);
                $user->update($request->all());

                $user->save();
            } else {
                throw new \Exception('Benutzer existiert nicht');
            }

            DB::commit();
            $user1 = User::where('id', $user_id)->first();
            return response()->json($user1, 201);
        }
        catch (\Exception $e){
            DB::rollBack();
            return response()->json('Impfstatus konnte nicht geändert werden: '. $e->getMessage(), 420);
        }
    }

    //modify / convert values if needed
    private function parseRequest(Request $request):Request{
        //get date and convert it - its in ISO 8601, e.g. "2018-01-01T23:00:00.00Z"
        $date = new \DateTime($request->published);
        $request['published'] = $date;
        return $request;
    }
}
