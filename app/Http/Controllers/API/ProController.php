<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Controllers\API\BaseController as BaseController;
use App\Models\Pro;
use Validator;
use App\Http\Resources\ProResource;
use Illuminate\Http\JsonResponse;
   
class ProController extends BaseController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(): JsonResponse
    {
        $pros = Pro::all();
    
        return $this->sendResponse(ProResource::collection($pros), 'Pros retrieved successfully.');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request): JsonResponse
    {
        $input = $request->all();
   
        $validator = Validator::make($input, [
            'name' => 'required',
            'detail' => 'required'
        ]);
   
        if($validator->fails()){
            return $this->sendError('Validation Error.', $validator->errors());       
        }
   
        $pro = Pro::create($input);
   
        return $this->sendResponse(new ProResource($pro), 'Pro created successfully.');
    } 
   
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id): JsonResponse
    {
        $pro = Pro::find($id);
  
        if (is_null($pro)) {
            return $this->sendError('Pro not found.');
        }
   
        return $this->sendResponse(new ProResource($pro), 'Pro retrieved successfully.');
    }
    
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Pro $pro): JsonResponse
    {
        $input = $request->all();
   
        $validator = Validator::make($input, [
            'name' => 'required',
            'detail' => 'required'
        ]);
   
        if($validator->fails()){
            return $this->sendError('Validation Error.', $validator->errors());       
        }
   
        $pro->name = $input['name'];
        $pro->detail = $input['detail'];
        $pro->save();
   
        return $this->sendResponse(new ProResource($pro), 'Pro updated successfully.');
    }
   
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Pro $pro): JsonResponse
    {
        $pro->delete();
   
        return $this->sendResponse([], 'Pro deleted successfully.');
    }
}
