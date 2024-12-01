<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Trainer;

use App\Http\Resources\PostResources;
use Illuminate\Support\Facades\Validator;

class TrainerController extends Controller
{
     /**
     * @OA\Get(
     *     path="/trainer",
     *     tags={"Trainer"},
     *     operationId="listTrainer",
     *     summary="Trainer - Get All",
     *     description="Mengambil Data Trainer",
     *     security={{"bearerAuth":{}}},
     *     @OA\Response(
     *         response=200,
     *         description="Success",
     *         @OA\JsonContent(
     *             example={
     *                 "success": true,
     *                 "message": "Berhasil Mengambil Data Trainer",
     *                 "data": {
     *                     {
     *                         "id": "1",
     *                         "nama": "Satrio Andika",
     *                         "email": "satrio@gmail.com",
     *                         "password": "123",
     *                         "no_hp": "0876543219",
     *                         "status": "1"
     *                     }
     *                 }
     *             }
     *         )
     *     )
     * )
     */
    public function listTrainer(){
        $success = true;
        $message = 'Berhasil mengambil Data Trainer';
        $data = Trainer::all();

        return response()->json([
            'success' => $success,
            'message' => $message,
            'data' => $data
        ], 200)->header('Access-Control-Allow-Origin', '*');
    }

    /**
     * @OA\Get(
     *     path="/trainer/{id}",
     *     tags={"Trainer"},
     *     operationId="listTrainerById",
     *     summary="Trainer - Get By ID",
     *     description="Mengambil Data Trainer Berdasarkan ID",
     *     security={{"bearerAuth":{}}},
     *     @OA\Parameter(
     *         name="id",
     *         in="path",
     *         required=true,
     *         @OA\Schema(
     *             type="string",
     *             default="1",
     *             description="Masukan ID",
     *             example="1"
     *         ),
     *         description="ID Trainer"
     *     ),
     *     @OA\Response(
     *         response=200,
     *         description="Ok",
     *         @OA\JsonContent(
     *             example={
     *                 "success": true,
     *                 "message": "Berhasil mengambil Data Trainer",
     *                 "data": {
     *                     {
     *                         "id": "1",
     *                         "nama": "Satrio Andika",
     *                         "email": "satrio@gmail.com",
     *                         "password": "123",
     *                         "no_hp": "0876543219",
     *                         "status": "1"
     *                     }
     *             }
     *         }),
     *     ),
     * )
     */
    public function listTrainerById($id){
        $success = true;
        $message = 'Berhasil mengambil Data Trainer';
        $data = Trainer::find($id);

        return response()->json([
            'success' => $success,
            'message' => $message,
            'data' => $data
        ], 200);
    }

    /**
     * @OA\Post(
     *     path="/trainer/create",
     *     operationId="insertTrainer",
     *     tags={"Trainer"},
     *     summary="Trainer Insert",
     *     description="Post data Trainer",
     *     security={{"bearerAuth":{}}},
     *     @OA\RequestBody(
     *         required=true,
     *         description="Request Body Description",
     *         @OA\JsonContent(
     *             example={
     *                 "id": "1",
     *                 "nama": "Satrio Andika",
     *                 "email": "satrio@gmail.com",
     *                 "password": "123",
     *                 "no_hp": "0876543219",
     *                 "status": "1"
     *             }
     *         )
     *     ),
     *     @OA\Response(
     *         response=200,
     *         description="Success",
     *         @OA\JsonContent(
     *             example={
     *                 "success": true,
     *                 "message": "Berhasil menambahkan Data Trainer",
     *                 "data": {
     *                     {
     *                         "id": "1",
     *                         "nama": "Satrio Andika",
     *                         "email": "satrio@gmail.com",
     *                         "password": "123",
     *                         "no_hp": "0876543219",
     *                         "status": "1"
     *                     }
     *             }
     *         }),
     *     ),
     * )
     */
    public function insertTrainer(Request $request){
        $validator = Validator::make($request->all(), [
            'id' => 'required',
            'nama' => 'required',
            'email' => 'required',
            'password' => 'required',
            'no_hp' => 'required',
            'status' => 'required',
        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors(), 400);
        }
        
        $success = true;
        $message = 'Data berhasil disimpan';
        $result = Trainer::create($request->all());
        $data = $result;

            return response()->json([
                'success' => $success,
                'message' => $message,
                'data' => $data
            ], 200);
    }


/**
 * @OA\Put(
 *     operationId="updateTrainer",
 *     tags={"Trainer"},
 *     summary="Trainer - Update",
 *     description="Update data Trainer",
 *     path="/trainer/update",
 *     security={{"bearerAuth":{}}},
 *     @OA\RequestBody(
 *         description="Request Body Description",
 *         required=true,
 *         @OA\JsonContent(
 *             example={
 *                "id": "1",
 *                 "nama": "Satrio Andika",
 *                 "email": "satrio@gmail.com",
 *                 "password": "123",
 *                 "no_hp": "0876543219",
 *                 "status": "1"
 *             }
 *         ),
 *     ),
 *     @OA\Response(
 *         response=200,
 *         description="Ok",
 *         @OA\JsonContent(
 *             example={
 *                 "success": true,
 *                 "message": "Data berhasil diubah"
 *             }
 *         ),
 *     ),
 * )
 * 
 * 
 */

 public function updateTrainer(Request $request)
 {
     // Define validation rules
     $validator = Validator::make($request->all(), [
            'id' => 'required',
            'nama' => 'required',
            'email' => 'required',
            'password' => 'required',
            'no_hp' => 'required',
            'status' => 'required',
     ]);

     // Check if validation fails
     if ($validator->fails()) {
         return response()->json($validator->errors(), 422);
     }

     $success = true;
     $message = 'Data berhasil diubah';

     $data = array(
       "nama" =>$request->input("nama"),
       "email" =>$request->input("email"),
       "password" =>$request->input("password"),
       "no_hp" =>$request->input("no_hp"),
       "status" =>$request->input("status")
     );

     $id = $request->input("id");
     $result = Trainer::where([
       ['id', '=', $id]
     ])->update($data);

     // Make response JSON
     return response()->json([
         'success' => $success,
         'message' => $message,
         'data' => $data,
     ], 200);
 }

/**
* @OA\Delete(
*     operationId="deleteTrainer",
*     tags={"Trainer"},
*     summary="Trainer - Delete By ID",
*     description="Delete data Trainer",
*     path="/trainer/delete",
*     security={{ "bearerAuth": {} }},
*     @OA\RequestBody(
*         required=true,
*         description="Request Body Description",
*         @OA\JsonContent(
*             example={
*                "id": "1",
*                 "nama": "Satrio Andika",
*                 "email": "satrio@gmail.com",
*                 "password": "123",
*                 "no_hp": "0876543219",
*                 "status": "1"
*             },
*         ),
*     ),
*     @OA\Response(
*         response="200",
*         description="Ok",
*         @OA\JsonContent(
*             example={
*                 "success": true,
*                 "message": "Berhasil menghapus Data Trainer",
*             }),
*     ),
* )
*/
public function deleteTrainer(Request $request)
{
    $validator = Validator::make($request->all(), [
      "id"   => 'required'
    ]);

    if (!$validator) {
        return response()->json($validator->errors(), 422);
    }

    $success = true;
    $message = 'Data berhasil dihapus';

    $id = $request->input("id");
    $result = Trainer::where([
        ['id', '=', $id]
    ])->delete();

    return response()->json([
        'success' => $success,
        'message' => $message,
        'data'
    ], 200);
}
}
?>