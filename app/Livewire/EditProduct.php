<?php

namespace App\Livewire;

use App\Models\Product;
use App\Traits\Toast;
use Livewire\WithFileUploads;
use LivewireUI\Modal\ModalComponent;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\ValidationException;
use App\Models\Category;

class EditProduct extends ModalComponent
{
    use Toast, WithFileUploads;

    public Product $product;

    public string $name;
    public float $price;
    public int $category_id = -1;
    public string $description;
    public $image;
    public bool $is_available = true;

    public $image_path;

    public function mount(Product $product) {
        $this->product = $product;

        $this->name = $product->name;
        $this->price  = $product->price;
        $this->category_id = $product->category_id;
        $this->description = $product->description;
        $this->image_path = $product->image_path;
        $this->is_available = $product->is_available;
    }

    public function update() {
        $this->authorize('update', $this->product);

        $validator = Validator::make(
            [
                'name' => $this->name,
                'price' => $this->price,
                'category_id' => $this->category_id,
                'description' => $this->description,
                'is_available' => $this->is_available,
            ],
            [
                'name' => 'required|string|between:1,255',
                'price' => 'required|numeric|min:0',
                'category_id' => 'required|integer|exists:categories,id',
                'description' => 'required|string',
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

                $this->toast([
                    'type' => 'danger',
                    'expand' => true,
                    'message' => $imageErr,
                    'position' => 'top-right',
                ]);

                throw new ValidationException($imageValidator);
            }

            $storedFile = $this->image->store('public');
            $filename = basename($storedFile);
            $this->image_path = $filename;
        }

        $this->product->update([
            'name' => $this->name,
            'price' => $this->price,
            'category_id' => $this->category_id,
            'description' => $this->description,
            'image_path' => $this->image_path,
            'is_available' => $this->is_available,
        ]);

        $this->toast([
            'type' => 'success',
            'position' => 'top-right',
            'expand' => false,
            'message' => 'Product updated successfully!',
        ]);

        $this->closeModalWithEvents([
            ProductList::class => 'product_updated',
        ]);
    }


    public function render()
    {
        return view('livewire.edit-product', [
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
