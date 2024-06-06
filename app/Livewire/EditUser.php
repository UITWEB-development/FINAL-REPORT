<?php

namespace App\Livewire;


use App\Models\RestaurantDescription;
use App\Models\User;
use Illuminate\Support\Facades\Validator;
use Livewire\WithFileUploads;
use LivewireUI\Modal\ModalComponent;
use Illuminate\Validation\ValidationException;
use Masmerise\Toaster\Toaster;

class EditUser extends ModalComponent
{
    use WithFileUploads;

    public User $user;

    public string $name;
    public $image;

    public $image_path;

    public function mount(User $user) {
        $this->user = $user;
        $this->name = $user->name;
        $this->image_path = $user->image_path;
    }

    public function update() {
        $this->authorize('update_user', User::class);

        $validator = Validator::make(
            [
                'name' => $this->name,
            ],
            [
                'name' => 'required|string|between:1,255'
            ],
            [
                'required' => 'The :attribute field is required',
                'string' => 'The :attribute must be a string.',
                'min:8' => 'The :attribute must contain at least 8 characters',
                'boolean' => 'The :attribute must be a boolean.',
            ]
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

        

        $this->user->update([
            'image_path' => $this->image_path,
            'name' => $this->name,
            
        ]);

        Toaster::success('User profile updated successfully!');

        $this->closeModalWithEvents([
            UserDashboard::class => 'user_updated',
        ]);
    }

    public function render()
    {
        return view('livewire.edit-user');
    }
}
