<?php

namespace App\Livewire;

use App\Models\RestaurantDescription;
use Illuminate\Support\Facades\Validator;
use Livewire\WithFileUploads;
use LivewireUI\Modal\ModalComponent;
use Illuminate\Validation\ValidationException;
use Masmerise\Toaster\Toaster;


class EditRestaurantProfile extends ModalComponent
{
    use WithFileUploads;

    public RestaurantDescription $restaurant_description;

    public $image;
    public $restaurant_name;
    public $phone_number;
    public $opening_time;
    public $closing_time;

    public $position = ['lat' => null, 'lng' => null, 'address' => null];

    public $image_path;

    public function mount(RestaurantDescription $restaurant_description){
        $this->restaurant_description = $restaurant_description;

        $this->restaurant_name = $restaurant_description->restaurant_name;
        $this->phone_number = $restaurant_description->phone_number;
        $this->opening_time = \Carbon\Carbon::createFromFormat('H:i:s',$restaurant_description->opening_time)->format('h:i');
        
        $this->closing_time = \Carbon\Carbon::createFromFormat('H:i:s',$restaurant_description->closing_time)->format('h:i');;

        $this->position = [
            'lat' => $restaurant_description->latitude,
            'lng' => $restaurant_description->longitude,
            'address' => $restaurant_description->address
        ];

        $this->image_path = $restaurant_description->user->image_path;
    }
    
    public function edit(){
        $this->authorize('update', $this->restaurant_description);

        $validator = Validator::make(
            [
                'restaurant_name' => $this->restaurant_name,
                'phone_number' => $this->phone_number,
                'opening_time' => $this->opening_time,
                'closing_time' => $this->closing_time,
                'latitude' => $this->position['lat'],
                'longitude' => $this->position['lng'],
                'address' => $this->position['address'],
            ],
            [
                'restaurant_name' => 'required|string|between:3,100',
                'phone_number' => 'required|phone:VN',
                'opening_time' => 'required|date_format:H:i',
                'closing_time' => 'required|date_format:H:i|after:opening_time',
                
                'latitude' => 'required|numeric|between:-90,90',
                'longitude' => 'required|numeric|between:-180,180',
                'address' => 'required|string|between:3,100',
            ],
            [
                'required' => 'The :attribute field is required',
                'string' => 'The :attribute must be a string.',
                'min:8' => 'The :attribute must contain at least 8 characters',
                'boolean' => 'The :attribute must be a boolean.',
                'phone:VN' => 'The :attribute must be a valid phone number.'
            ],
        );


        if ($validator->fails()) {
            $errors = $validator->errors()->all();

            foreach ($errors as $error) {   
                Toaster::error($error);

            }

            throw new ValidationException($validator);
        }

        if ($this->image) {
            $imageValidator = Validator::make(
                [
                    'image' => $this->image,
                ],
                [
                    'image' => 'image|max:1024',
                ],
            );

            if ($imageValidator->fails()) {
                $imageErr = $imageValidator->errors()->first();
                Toaster::error($imageErr);

                throw new ValidationException($imageValidator);
            }

            $storedFile = $this->image->store('public');
            $filename = basename($storedFile);
            $this->image_path = $filename;
        }

        $this->restaurant_description->update([
            'restaurant_name' => $this->restaurant_name,
            'address' => $this->position['address'],
            'phone_number' => $this->phone_number,
            'opening_time' => $this->opening_time,
            'closing_time' => $this->closing_time,
            'longitude' => $this->position['lng'],
            'latitude' => $this->position['lat'],
        ]);

        $user = auth()->user();

        $user->image_path = $this->image_path;
        $user->save();

        Toaster::success('Profile updated successfully!');

        $this->closeModalWithEvents([
            SellerProfile::class => 'profile_updated',
            
        ]);

        $this->dispatch('map-update', $this->position, $this->restaurant_name);
    }

    public function render()
    {
        return view('livewire.edit-restaurant-profile');
    }

    public static function modalMaxWidth(): string
    {
        return '2xl';
    }

    public static function closeModalOnClickAway(): bool
    {
        return false;
    }
}
