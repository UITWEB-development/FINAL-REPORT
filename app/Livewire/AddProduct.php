<?php

namespace App\Livewire;

use App\Models\Category;
use App\Models\Product;
use App\Traits\Toast;
use Livewire\WithFileUploads;
use LivewireUI\Modal\ModalComponent;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\ValidationException;

class AddProduct extends ModalComponent
{
    use WithFileUploads, Toast;

    public string $name;
    public float $price;
    public int $category_id = -1;
    public string $description;
    public $image;
    public bool $is_available = true;

    public function add()
    {
        $this->authorize('add', Product::class);

        $validator = Validator::make(
            [
                'name' => $this->name,
                'price' => $this->price,
                'category_id' => $this->category_id,
                'description' => $this->description,
                'image' => $this->image,
                'is_available' => $this->is_available,
            ],
            [
                'name' => 'required|string|between:1,255',
                'price' => 'required|numeric|min:0',
                'category_id' => 'required|integer|exists:categories,id',
                'description' => 'required|string',
                'image' => 'required|image|max:1024',
                'is_available' => 'required|boolean',
            ],
            [
                'required' => 'The :attribute field is required',
                'string' => 'The :attribute must be a string.',
                'min:8' => 'The :attribute must contain at least 8 characters',
                'boolean' => 'The :attribute must be a boolean.',
            ],
        );

        if ($validator->fails()) {
            $errors = $validator->errors()->all();

            foreach ($errors as $error) {
                $this->toast([
                    'type' => 'danger',
                    'expand' => true,
                    'message' => $error,
                    'position' => 'top-right',
                ]);
            }

            throw new ValidationException($validator);
        }

        $storedFile = $this->image->store('public');
        $filename = basename($storedFile);

        Product::create([
            'user_id' => auth()->user()->id,
            'name' => $this->name,
            'price' => $this->price,
            'category_id' => $this->category_id,
            'description' => $this->description,
            'image_path' => $filename,
            'is_available' => $this->is_available,
        ]);

        $this->toast([
            'type' => 'success',
            'position' => 'top-right',
            'expand' => false,
            'message' => 'Product created successfully!',
        ]);

        $this->closeModalWithEvents([
            ProductList::class => 'product_updated',
        ]);
    }

    public function render()
    {
        return view('livewire.add-product', [
            'categories' => Category::all(),
        ]);
    }

    public static function modalMaxWidth(): string
    {
        return 'lg';
    }

    public static function closeModalOnClickAway(): bool
    {
        return false;
    }
}
