<?php

namespace App\Http\Controllers;

use App\Exceptions\CustomeExceptions;
use App\Models\Event;
use App\Models\User;
use Exception;
use Illuminate\Http\Request;
use PhpParser\Node\Expr\Throw_;

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

    public function show_user_event($id)
    {
        try
        {
            $evevnts = Event::with(['user.socialMedia'])->findOrFail($id);
            if($evevnts)
            {
            return response()->json([
                "message" => "Events that user attented retrieved successfully.",
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

    public function registerUserToEvent($user_id , $event_id)
    {
        try
        {
        $user = User::findOrFail($user_id);
        $event = Event::findOrFail($event_id);
        $user->events()->syncWithoutDetaching([
            $event_id => ['status' => 'attending']
        ]);
        return response()->json([
            'message' => "User registered to event successfully.",
            'status' => 200,
            'data' => [
                'user' => $user,
                'event' => $event
            ]
        ]);
        }
        catch (Exception $e) {
         throw new CustomeExceptions($e->getMessage(), 500);
    }

    }
    public function unregisterUserFromEvent($user_id , $event_id)
    {
        try 
        {
            $user = User::findOrFail($user_id);
            $event = Event::findOrFail($event_id);
    
            // Detach the event from the user
            $user->events()->detach($event_id);
    
            return response()->json([
                'message' => 'User successfully unregistered from the event.',
                'status' => 200
            ]);
        } 
        catch (Exception $e) {
            return response()->json([
                'message' => 'Failed to unregister user from event: ' . $e->getMessage(),
                'status' => 500
            ]);
        }
    }

    public function show_event_user($id)
{
    try {
        $user = User::with(['events' => function ($query) {
            $query->with('location', 'category'); // optional: eager-load related data
        }, 'socialmedia']) // include user's social media too
        ->findOrFail($id);

        return response()->json([
            'message' => 'User with events retrieved successfully.',
            'status' => 200,
            'data' => $user
        ]);
    } catch (Exception $e) {
        return response()->json([
            'message' => 'Something went wrong: ' . $e->getMessage(),
            'status' => 500,
        ]);
    }
}
}
