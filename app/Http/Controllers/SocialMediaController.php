<?php

namespace App\Http\Controllers;

use App\Exceptions\CustomeExceptions;
use App\Models\SocialMedia;
use App\Models\User;
use Exception;
use Illuminate\Http\Request;

class SocialMediaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        try
        {
         $social = SocialMedia::get();
         if($social)
         {
            return response()->json([
                "message" => "Social media platforms retrieved successfully.",
                "status" => 200,
                "data" => $social
            ]);
            
         }
         return response()->json([
            "message" => "No social media records found.",
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
            "platform" => "required|string",
            "username" => "required|exists:social_media,username",
          ]);
          $social = SocialMedia::create($ValidatedData);
          if($social)
          {
            return response()->json([
                "message" => "Social media account created successfully.",
                "status" => 201,
                "data" => $social
            ]);
            
          }
          return response()->json([
            "message" => "Failed to create social media account. Please try again.",
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
         $social = SocialMedia::findOrFail($id);
         if($social)
         {
            return response()->json([
                "message" => "Social media details retrieved successfully.",
                "status" => 200,
                "data" => $social
            ]);
            
         }
         return response()->json([
            "message" => "No social media account found with the provided ID.",
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
        $validatedData = $request->validate([
            "platform" => "required",
            "username" => "required|string",
        ]);

        $social = SocialMedia::findOrFail($id);
        $social->update($validatedData);

        return response()->json([
            "message" => "Social media account updated successfully.",
            "status" => 200,
            "data" => $social
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
            $social = SocialMedia::findOrFail($id);
            if($social)
            {
                $social->delete();
                return response()->json([
                    "message" => "Social media account deleted successfully.",
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
