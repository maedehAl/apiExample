<?php

namespace App\Http\Controllers\APi\v1;

use App\course;
use App\Http\Requests\CourseRequest;
use App\Http\Resources\v1\course as CourceResource;
use App\Http\Resources\v1\courseCollection;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;

class courseController extends Controller
{
    public function index()
    {
//        $courses=Course::all();
        $courses=Course::paginate(1);

//        return response()->json($courses);
//        return  CourceResource::collection($courses);
        return new courseCollection($courses);
    }
    public function single(Course $course)
    {
        return new CourceResource($course);
    }

    public function store(CourseRequest $request)
    {
//        return $request->all();
//        $validator=Validator::make($request->all(),[
//            'title'=>'required|unique:courses|max:255'
//        ]);
//
//        if($validator->fails()){
//            return response([
//                'data'=>[
//                    'message'=>$validator->errors()
//                ],
//                'status'=>'error'
//            ],422);
//        }
        return response([
            'data'=>[],
            'status'=>'success'

        ],200);
    }
}
