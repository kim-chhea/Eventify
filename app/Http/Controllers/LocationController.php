<?php

namespace App\Http\Controllers;

use App\Exceptions\CustomeExceptions;
use App\Models\Category;
use App\Models\Location;
use App\Models\SocialMedia;
use App\Models\User;
use Exception;
use Illuminate\Http\Request;

class LocationController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        try
        {
         $locations = Location::get();
         if($locations)
         {
            return response()->json([
                "message" => "Locations of events retrieved successfully.",
                "status" => 200,
                "data" => $locations
            ]);
            
         }
         return response()->json([
            "message" => "No locations of events records found.",
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
            "name" => "required|string|unique:locations,name",
            "address" => "required|string",
            "city" => "required|string",
            "state" => "required|string",
            "postal_code" => "required|string",
          ]);
          $locations = Location::create($ValidatedData);
          if($locations)
          {
            return response()->json([
                "message" => "Locations of events created successfully.",
                "status" => 201,
                "data" => $locations
            ]);
            
          }
          return response()->json([
            "message" => "Failed to create locations of events Please try again.",
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
         $locations = Location::findOrFail($id);
         if($locations)
         {
            return response()->json([
                "message" => "Locations of events details retrieved successfully.",
                "status" => 200,
                "data" => $locations
            ]);
            
         }
         return response()->json([
            "message" => "No Locations of events found with the provided ID.",
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
        $locations = Location::findOrFail($id);
        
        $ValidatedData = $request->validate([
            "name" => "required|string|unique:locations,name,". $locations->id,
            "address" => "required|string",
            "city" => "required|string",
            "state" => "required|string",
            "postal_code" => "required|string",
          ]);
        $locations->update($ValidatedData);

        return response()->json([
            "message" => "Locations of events updated successfully.",
            "status" => 200,
            "data" => $locations
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
            $locations = Location::findOrFail($id);
            if($locations)
            {
                $locations->delete();
                return response()->json([
                    "message" => "Locations of events deleted successfully.",
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
