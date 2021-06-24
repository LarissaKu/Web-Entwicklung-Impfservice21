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


class VacdateController extends Controller
{
    public function index(){
        //load all vacdates and relations
        $vacdates = Vacdate::with('users', 'vacplace')->get();
        return $vacdates;
    }

    public function findById(int $id){
        $vacdate = Vacdate::where('id',$id)->with(['users', 'vacplace'])->first();
        //$vacdate = Vacdate::where('id',$id)->with(['vacplace'])->first();
        return $vacdate;
    }

    //create new Vacdate
    public function save(Request $request) : JsonResponse  {
        $request = $this->parseRequest($request);
        /*+
        *  use a transaction for saving model including relations
        * if one query fails, complete SQL statements will be rolled back
        */
        DB::beginTransaction();
        try {
            $vacdate = Vacdate::create($request->all());
            DB::commit();
            // return a vaild http response
            return response()->json($vacdate, 201);
        }
        catch (\Exception $e) {
            // rollback all queries
            DB::rollBack();
            return response()->json("Impftermin speichern fehlgeschlagen: " . $e->getMessage(), 420);
        }
    }

    //update vacdate
    public function update(Request $request, int $id) : JsonResponse
    {
        DB::beginTransaction();
        try {
            $vacdate = Vacdate::with(['users', 'vacplace'])
                ->where('id', $id)->first();
            if ($vacdate != null) {
                $request = $this->parseRequest($request);
                $vacdate->update($request->all());

                //update vacdate
                $ids = [];
                if (isset($request['users']) && is_array($request['users'])) {
                    foreach ($request['users'] as $user) {
                        array_push($ids, $user['id']);
                    }
                }
                //foreach mit ids attachen und save
                foreach ($ids as $i) {
                    $vacdate->users()->attach($i);
                    $vacdate->save();
                }
            }
            else{
                 throw new \Exception("Impftermin existiert nicht");
            }

            DB::commit();
            $vacdate1 = Vacdate::with(['vacplace', 'users'])
                ->where('id', $id)->first();
            // return a vaild http response
            return response()->json($vacdate1, 201);
        }
        catch (\Exception $e) {
            // rollback all queries
            DB::rollBack();
            return response()->json("Updaten des Impftermins ist fehlgeschlagen: " . $e->getMessage(), 420);
        }
    }

    //returns 200 if vacdate was deleted successfully, throws excpetion if not
    public function delete(int $id) : JsonResponse
    {
        try {
            $vacdate = Vacdate::where('id', $id)->first();

            if ($vacdate != null) {
                $vacdate->delete();
            } else{
                throw new \Exception("Impftermin konnte nicht gelöscht werden - er existiert nicht");
        }
        return response()->json('vaccination date (' . $id . ') successfully deleted', 200);
    }
    catch (\Exception $e){
        DB:rollBack();
        return response()->json('Löschen des Impftermins ist fehlgeschlagen: '. $e->getMessage(), 420);
        }
    }

    public function registerUser2(Request $request, int $userid) :JsonResponse {
        DB::beginTransaction();
        try {
            $vacid = $request["id"];
            $vacdate = Vacdate::where('id', $vacid)->first();
            $user = User::where('user_id', $userid)->first();
            if($user->registered == false) {
                $user->registered = $user->registered = true;
            } else {
                return response()->json("Ist bereits registriert", 201);
            }
            $vacdate->maxpersons = $vacdate->maxpersons+1;
            $vacdate->users()->attach($userid);
            $vacdate->save();
            $user->save();
            DB::commit();
            return response()->json(true, 201);
        }
        catch(\Exception $e) {
            DB::rollBack();
            return response()->json("Speichern der Registrierung ist fehlgeschlagen: ". $e->getMessage(), 420);
        }
    }

    public function registerUser(Request $request, int $id):JsonResponse{
        DB::beginTransaction();
        try{
            $vacdate = Vacdate::where('id',$id)->with(['users', 'vacplace'])->first();
            //$vacdate = Vacdate::where('id', $id)->first();

            $request = $this->parseRequest($request);
            $uid = $request['user_id'];

            $user = User::where('id', $uid)->first();

            if($vacdate != null && $user != null){
                if($user->registered == false) {
                    $user->registered = $user->registered = true;
                } else {
                    return response()->json("Ist bereits registriert", 201);
                }

                if(count($vacdate['users']) < $vacdate['maxpersons']){
                            $vacdate->users()->attach($user);
                            $vacdate->save();
                } else{
                    throw new \Exception('Die maximale Anzahl an Benutzern für das Impfdatum ist erreicht');
                }
            } else{
                throw new \Exception('Das Impfdatum existiert nicht');
            }

            DB::commit();
            $vacdate1 = Vacdate::with(['vacplace', 'users'])->where('id', $id)->first();
            return response()->json($vacdate1, 201);
        }
        catch (\Exception $e){
            DB::rollBack();
            return response()->json('Das Speichern des Impftermins ist fehlgeschlagen: '. $e->getMessage(), 420);
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
