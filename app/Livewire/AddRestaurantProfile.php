<?php

namespace App\Livewire;

use App\Models\RestaurantDescription;
use Illuminate\Support\Facades\Validator;
use Livewire\WithFileUploads;
use LivewireUI\Modal\ModalComponent;
use Illuminate\Validation\ValidationException;
use Masmerise\Toaster\Toaster;

class AddRestaurantProfile extends ModalComponent
{
    use WithFileUploads;

    public $image;
    public $restaurant_name;
    public $phone_number;
    public $opening_time;
    public $closing_time;

    public $position = ['lat' => 0, 'lng' => 0, 'address' => ''];


    public function add() {
        $this->authorize('add', RestaurantDescription::class);

        $is_profile_exist = RestaurantDescription::where('user_id', auth()->user()->id)->exists();

        if ($is_profile_exist) {
            Toaster::error('Profile already exists!');
            return;
        }

        $validator = Validator::make(
            [
                'image' => $this->image,
                'restaurant_name' => $this->restaurant_name,
                'phone_number' => $this->phone_number,
                'opening_time' => $this->opening_time,
                'closing_time' => $this->closing_time,
                'latitude' => $this->position['lat'],
                'longitude' => $this->position['lng'],
                'address' => $this->position['address'],
            ],
            [
                'image' => 'required|image|max:1024',
                'restaurant_name' => 'required|string|between:3,100',
                'phone_number' => 'required|phone:VN',
                'opening_time' => 'required|date_format:H:i',
                'closing_time' => 'required|date_format:H:i',
                
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

        


        $user = auth()->user();

        RestaurantDescription::create([
            'user_id' => $user->id,
            'restaurant_name' => $this->restaurant_name,
            'address' => $this->position['address'],
            'phone_number' => $this->phone_number,
            'opening_time' => $this->opening_time,
            'closing_time' => $this->closing_time,
            'longitude' => $this->position['lng'],
            'latitude' => $this->position['lat'],
        ]);

        $storedFile = $this->image->store('public');
        $filename = basename($storedFile);
        
        $user->image_path = $filename;
        $user->save();

        Toaster::success('Profile created successfully!');

        $this->closeModalWithEvents([
            SellerProfile::class => 'profile_updated',
            
        ]);

        $this->dispatch('map-update', $this->position, $this->restaurant_name);
    }


    public function render()
    {
        return view('livewire.add-restaurant-profile');
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
