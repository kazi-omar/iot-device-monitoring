<?php

namespace App\Http\Resources\Profile;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ProfileResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,  
            'name' => $this->name,
            'email' => $this->email,
            'contactNo' => $this->contact_no, 
            'basePath' => config('app.url') . '/' . config('constants.path.storage'),
            'profilePhotoPath' => $this->profile_photo_path,    
            'createdAt' => $this->created_at, 
            'updatedAt' => $this->updated_at, 
        ];
    }
}
