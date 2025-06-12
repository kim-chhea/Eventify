<?php

namespace App\Http\Controllers;

use App\Exceptions\CustomeExceptions;
use App\Models\Category;
use App\Models\SocialMedia;
use App\Models\User;
use Exception;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        try
        {
         $categories = Category::with(['event:id,category_id,titles,description,start_time,end_time,online_link,capacity'])->get(['id','name']);
         if($categories)
         {
            return response()->json([
                "message" => "Categories of events retrieved successfully.",
                "status" => 200,
                "data" => $categories
            ]);
            
         }
         return response()->json([
            "message" => "No categories of events records found.",
            "status" => 404
        ]);
        
        }
        catch(Exception $e)
        {
            throw new CustomeExceptions($e->getMessage(), 500);
        }

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        try
        {
          $ValidatedData = $request->validate([
            "name" => "required|string|unique:categories,name",
          ]);
          $categories = Category::create($ValidatedData);
          if($categories)
          {
            return response()->json([
                "message" => "Categories of events created successfully.",
                "status" => 201,
                "data" => $categories
            ]);
            
          }
          return response()->json([
            "message" => "Failed to create categories of events Please try again.",
            "status" => 400
        ]);
        
        }
        catch(Exception $e)
        {
            throw new CustomeExceptions($e->getMessage(), 500);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        try
        {
         $categories = Category::with(['event:id,category_id,titles,description,start_time,end_time,online_link,capacity'])->findOrFail($id);
         if($categories)
         {
            return response()->json([
                "message" => "Categories of events details retrieved successfully.",
                "status" => 200,
                "data" => $categories
            ]);
            
         }
         return response()->json([
            "message" => "No categories of events found with the provided ID.",
            "status" => 404
        ]);
        
        }
        catch(Exception $e)
        {
            throw new CustomeExceptions($e->getMessage(), 500);
        }
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
    try {
        $categories = Category::findOrFail($id);
        $validatedData = $request->validate([
            "name" => "required|string|unique:categories,name,". $categories->id,
        ]);

        $categories->update($validatedData);

        return response()->json([
            "message" => "Categories of events updated successfully.",
            "status" => 200,
            "data" => $categories
        ]);
        
    } catch (Exception $e) {
        throw new CustomeExceptions($e->getMessage(), 500);
    }
}

    /**
     * Remove the specified resource from storage.
     */
    public function destroy( $id)
    {
        //
        try
        {
            $categories = Category::findOrFail($id);
            if($categories)
            {
                $categories->delete();
                return response()->json([
                    "message" => "Categories of events deleted successfully.",
                    "status" => 200
                ]);
                
            }

        }
        catch(Exception $e)
        {
            throw new CustomeExceptions($e->getMessage(), 500);
        }
    }
}
