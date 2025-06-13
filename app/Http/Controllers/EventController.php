<?php

namespace App\Http\Controllers;

use App\Exceptions\CustomeExceptions;
use App\Models\Event;
use Exception;
use Illuminate\Http\Request;

class EventController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        try
        {
         $evevnts = Event::with(['location:id,name,address,city,state,postal_code'])->get(['id','category_id','location_id','titles','description','start_time','end_time','online_link','capacity']);
         if($evevnts)
         {
            return response()->json([
                "message" => "Events retrieved successfully.",
                "status" => 200,
                "data" => $evevnts
            ]);
            
         }
         return response()->json([
            "message" => "No events records found.",
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
            "location_id" => "required",
            "category_id" => "required",
            "titles" => "required|string",
            "description" => "required|string",
            "start_time" => "required|string",
            "end_time" => "required|string",
            'capacity' => "required|integer",
            'online_link' => "nullable",
          ]);
          $evevnts = Event::create($ValidatedData);
          if($evevnts)
          {
            return response()->json([
                "message" => "Events created successfully.",
                "status" => 201,
                "data" => $evevnts
            ]);
            
          }
          return response()->json([
            "message" => "Failed to create events Please try again.",
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
            $evevnts = Event::with(['location:id,name,address,city,state,postal_code'])->findOrFail($id);
         if($evevnts)
         {
            return response()->json([
                "message" => "Events details retrieved successfully.",
                "status" => 200,
                "data" => $evevnts
            ]);
            
         }
         return response()->json([
            "message" => "No Events found with the provided ID.",
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
        $evevnts = Event::findOrFail($id);
        
        $ValidatedData = $request->validate([
            "location_id" => "required",
            "category_id" => "required",
            "titles" => "required|string",
            "description" => "required|string",
            "start_time" => "required|string",
            "end_time" => "required|string",
            'capacity' => "required|integer",
            'online_link' => "nullable",
          ]);
        $evevnts->update($ValidatedData);

        return response()->json([
            "message" => "Event updated successfully.",
            "status" => 200,
            "data" => $evevnts
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
            $evevnts = Event::findOrFail($id);
            if($evevnts)
            {
                $evevnts->delete();
                return response()->json([
                    "message" => "Event deleted successfully.",
                    "status" => 200
                ]);
                
            }

        }
        catch(Exception $e)
        {
            throw new CustomeExceptions($e->getMessage(), 500);
        }
    }

    public function show_user_event()
    {
        
    }
}
