<?php

namespace App\Http\Controllers;

use App\Models\Topicality;
use App\Http\Requests\StoreTopicalityRequest;
use App\Http\Requests\UpdateTopicalityRequest;
use App\Http\Resources\Topicality as ResourcesTopicality;


class TopicalityController extends Controller
{

    /**
     * @OA\Get(
     *      path="/topicality",
     *      operationId="getAllTopicalities",
     *       tags={"Tests 1"},

     *      summary="Get List Of Topicalities",
     *      description="Returns all Topicalities",
     *      @OA\Response(
     *          response=200,
     *          description="Successful operation",
     *          @OA\MediaType(
     *           mediaType="application/json",
     *      )
     *      ),
     *      @OA\Response(
     *          response=401,
     *          description="Unauthenticated",
     *      ),
     *      @OA\Response(
     *          response=403,
     *          description="Forbidden"
     *      ),
     *      @OA\Response(
     *          response=400,
     *          description="Bad Request"
     *       ),
     *      @OA\Response(
     *          response=404,
     *          description="not found"
     *      ),
     *  )
     */
    public function index()
    {
        //return Topicality::all();
        //$topicalities = Topicality::all();
       // return $topicalities->toJson(JSON_PRETTY_PRINT);
       return ResourcesTopicality::collection(Topicality::orderByDesc('created_at')->get());

    }

  /**
     * @OA\Post(
     *      path="/topicality",
     *      operationId="createTopicality",
     *      tags={"Tests 1"},

     *      summary="Create a new topicalty",
     *      description="Create a new topicalty",
     *      @OA\Response(
     *          response=200,
     *          description="Successful operation",
     *          @OA\MediaType(
     *           mediaType="application/json",
     *      )
     *      ),
     *      @OA\Response(
     *          response=401,
     *          description="Unauthenticated",
     *      ),
     *      @OA\Response(
     *          response=403,
     *          description="Forbidden"
     *      ),
     * @OA\Response(
     *      response=400,
     *      description="Bad Request"
     *   ),
     * @OA\Response(
     *      response=404,
     *      description="not found"
     *   ),
     *  )
     */
    public function store(StoreTopicalityRequest $request)
    {
        if (Topicality::create($request->all())) {
            return response()->json([
                'success' => 'Actualité créée avec succès'
            ], 200);
        }
    }

     /**
     * @OA\Get(
      *      path="/topicality/{topicality}",
     *       operationId="ShwTopicById",
     *       tags={"Tests 2"},
     *       summary="Get Liste des actues",
     *       description="Get Liste des actue",
     *@OA\Parameter(
     *      name="country",
     *      in="path",
     *      required=true,
     *      @OA\Schema(
     *           type="string"
     *      )
     *   ),
     *     @OA\Response(
     *          response=200,
     *          description="Successful operation",
     *          @OA\MediaType(
     *           mediaType="application/json",
     *      )
     *      ),
     *      @OA\Response(
     *          response=401,
     *          description="Unauthenticated",
     *      ),
     *      @OA\Response(
     *          response=403,
     *          description="Forbidden"
     *      ),
     * @OA\Response(
     *      response=400,
     *      description="Bad Request"
     *   ),
     * @OA\Response(
     *      response=404,
     *      description="not found"
     *   ),
     *  )
     */
    public function show(Topicality $topicality)
    {
        return new ResourcesTopicality($topicality);
    }


    /**
     * @OA\Patch(
     *      path="/topicality/{topicality}",
     *      operationId="UpdTopicById",
     *      tags={"Tests 2"},
     *      summary="Update actu",
     *      description="Update actu",
     *@OA\Parameter(
     *      name="country",
     *      in="path",
     *      required=true,
     *      @OA\Schema(
     *           type="string"
     *      )
     *   ),
     *     @OA\Response(
     *          response=200,
     *          description="Successful operation",
     *          @OA\MediaType(
     *           mediaType="application/json",
     *      )
     *      ),
     *      @OA\Response(
     *          response=401,
     *          description="Unauthenticated",
     *      ),
     *      @OA\Response(
     *          response=403,
     *          description="Forbidden"
     *      ),
     * @OA\Response(
     *      response=400,
     *      description="Bad Request"
     *   ),
     * @OA\Response(
     *      response=404,
     *      description="not found"
     *   ),
     *  )
     */
    public function update(UpdateTopicalityRequest $request, Topicality $topicality)
    {
        if ($topicality->update($request->all())) {
            return response()->json([
                'success' => 'Actualité modifiée avec succès'
            ], 200);
        }
    }

       /**
     * @OA\delete(
     *      path="/topicality/{topicality}",
     *      operationId="DeleteTopicById",
     *      tags={"Tests 2"},
     *      summary="Delete actu",
     *      description="Delete actu",
     *@OA\Parameter(
     *      name="country",
     *      in="path",
     *      required=true,
     *      @OA\Schema(
     *           type="string"
     *      )
     *   ),
     *     @OA\Response(
     *          response=200,
     *          description="Successful operation",
     *          @OA\MediaType(
     *           mediaType="application/json",
     *      )
     *      ),
     *      @OA\Response(
     *          response=401,
     *          description="Unauthenticated",
     *      ),
     *      @OA\Response(
     *          response=403,
     *          description="Forbidden"
     *      ),
     * @OA\Response(
     *      response=400,
     *      description="Bad Request"
     *   ),
     * @OA\Response(
     *      response=404,
     *      description="not found"
     *   ),
     *  )
     */
    public function destroy(Topicality $topicality)
    {
        $topicality->delete();
    }
}
