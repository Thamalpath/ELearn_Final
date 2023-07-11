<x-app-layout>
    @section('content')
        <div class="card card-primary m-3">
            <div class="card-header">
                <h3 class="card-title">Edit Product</h3>
            </div>


            <form method="post">
                @csrf
                @method('PUT')
                <div class="card-body">
                    <div class="row">
                        <div class="col-3">
                            <div class="form-group">
                                <label for="product_no">Product ID</label>
                                <input type="text" class="form-control" id="product_no" value="{{ $product->number }}" name="product_no">
                            </div>
                        </div>
                        <div class="col-3">
                            <div class="form-group">
                                <label for="name">Name</label>
                                <input type="text" name="name" id="name" value="{{$product->name}}" class="form-control">
                            </div>
                        </div>
                        <div class="col-3">
                            <div class="form-group">
                                <label for="slug">Slug</label>
                                <input type="text" name="slug" id="slug" value="{{$product->slug}}" class="form-control">
                            </div>
                        </div>
                        <div class="col-3">
                            <div class="form-group">
                                <label for="qty">Quantity</label>
                                <input type="text" name="qty" id="qty" value="{{$product->qty}}" class="form-control">
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-4">
                            <div class="form-group">
                                <label for="category_id">Category</label>
                                <select class="custom-select" name="category_id">
                                    <option>Select Category</option>
                                    @foreach ($categories as $category_id => $category_name)
                                        @if ($category_id == $product->category_id) <!-- Check if category_id matches the current category -->
                                            <option value="{{ $category_id }}" selected>{{ $category_name }}</option> 
                                        @else
                                            <option value="{{ $category_id }}">{{ $category_name }}</option>
                                        @endif
                                    @endforeach
                                </select>
                            </div>
                        </div>     
                        <div class="col-4">
                            <div class="form-group">
                                <label for="category_id">Sub Category</label>
                                <select class="custom-select" name="sub_category_id">
                                    <option>Select Sub Category</option>
                                    @foreach ($sub_categories as $sub_category_id => $sub_category_name)
                                        @if ($sub_category_id == $product->sub_category_id) <!-- Check if sub_category_id matches the current sub_category -->
                                            <option value="{{ $sub_category_id }}" selected>{{ $sub_category_name }}</option> 
                                        @else
                                            <option value="{{ $sub_category_id }}">{{ $sub_category_name }}</option>
                                        @endif
                                    @endforeach
                                </select>
                            </div>
                        </div>  
                        <div class="col-4">
                            <div class="form-group">
                                <label for="material">Material</label>
                                <select class="custom-select" name="material">
                                    <option>Select Material type</option>
                                    @foreach ($materials as $key => $material)
                                        @if ($key == $product->material) <!-- Check if key matches the current material -->
                                            <option value="{{ $key }}" selected>{{ $material }}</option> 
                                        @else
                                            <option value="{{ $key }}">{{ $material }}</option>
                                        @endif
                                    @endforeach
                                </select>
                            </div>
                        </div>                       
                    </div>
                    
                    <div class="row">
                        <div class="col-4">
                            <div class="form-group">
                                <label for="original_price">Original Price</label>
                                <input type="number" name="original_price" id="original_price" value="{{$product->original_price}}" class="form-control">
                            </div>
                        </div>
                        <div class="col-4">
                            <div class="form-group">
                                <label for="selling_price">Selling Price</label>
                                <input type="number" name="selling_price" id="selling_price" value="{{$product->selling_price}}" class="form-control">
                            </div>
                        </div>
                        <div class="col-4">
                            <div class="form-group">
                                <label for="tax">Tax</label>
                                <input type="number" name="tax" id="tax" value="{{$product->tax}}" class="form-control">
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-6">
                            <div class="form-group">
                                <label for="size">Sizes</label><br>
                                @foreach ($sizes as $id => $size)
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="checkbox" name="sizes[]" id="size_{{ $id }}" value="{{ $id }}" {{ in_array($id, explode(', ', $product->size)) ? 'checked' : '' }}>
                                        <label class="form-check-label" for="size_{{ $id }}">{{ $size }}</label>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="form-group">
                                <label for="color">Colors</label><br>
                                @foreach ($colors as $id => $color)
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="checkbox" name="colors[]" id="color_{{ $id }}" value="{{ $id }}" {{ in_array($id, explode(', ', $product->color)) ? 'checked' : '' }}>
                                        <label class="form-check-label" for="color_{{ $id }}">{{ $color }}</label>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>                    

                    <div class="form-group">
                        <label for="description">Description</label>
                        <textarea class="form-control" rows="3" name="description" id="description">{{ $product->description }}</textarea>
                    </div>
                    <div class="form-group">
                        <label for="meta_description">Meta Description</label>
                        <textarea class="form-control" rows="3" name="meta_description" id="meta_description">{{ $product->meta_description }}</textarea>
                    </div>
                    <div class="form-group">
                        <label for="meta_keywords">Meta Keywords</label>
                        <textarea class="form-control" rows="2" name="meta_keywords" id="meta_keywords">{{ $product->meta_keywords }}</textarea>
                    </div>
                    <div class="row">
                        <div class="col-4">
                            <div class="form-group">
                                <label for="slug">Meta Title</label>
                                <input type="text" name="meta_title" id="meta_title" value="{{$product->meta_title}}" class="form-control">
                            </div>
                        </div>
                        <div class="col-4">
                            <div class="form-group">
                                <label for="status">Status</label>
                                <select class="custom-select" name="status">
                                    <option>Select Status type</option>
                                    @foreach ($statuses as $key => $status)
                                        @if ($key == $product->status) <!-- Check if key matches the current status -->
                                            <option value="{{ $key }}" selected>{{ $status }}</option> 
                                        @else
                                            <option value="{{ $key }}">{{ $status }}</option>
                                        @endif
                                    @endforeach
                                </select>
                            </div>
                        </div>        
                        <div class="col-2">
                            <div class="form-group">
                                <label for="trending">Trending</label>
                                <input type="checkbox" name="trending" id="trending" value="1" class="form-control" {{ $product->trending ? 'checked' : '' }}>
                            </div>
                        </div>  
                        <div class="col-2">
                            <div class="form-group">
                                <label for="popular">Popular</label>
                                <input type="checkbox" name="popular" id="popular" value="1" class="form-control" {{ $product->popular ? 'checked' : '' }}>
                            </div>
                        </div>                        
                    </div>

                    <div class="row">
                        <div class="col-12">
                            <div class="form-group">
                                <label>Images</label>
                                <div id="ProductImageDrop" class="dropzone"></div>
                                <div id="ProductImagePreview" class="mt-3">
                                    @foreach ((array) json_decode($product->images) as $image)
                                        <div class="d-inline-block mr-2">
                                            <img src="{{ asset('storage/'.$image) }}" alt="Image" height="100px" width="auto">
                                            <button class="btn btn-sm btn-danger remove-btn" data-image="{{ $image }}">Remove</button>
                                        </div>
                                    @endforeach
                                </div>
                                <input type="hidden" name="images" id="images" value="{{ $product->images }}">
                            </div>
                        </div>
                    </div>
                    
                </div>

                <div class="card-footer">
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>
            </form>
        </div>
    @endsection
    @push('css')
        <link rel="stylesheet" href="https://unpkg.com/dropzone@5/dist/min/dropzone.min.css" type="text/css" />
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/tinymce@6.4.2/skins/ui/oxide/content.min.css">
    @endpush
    @push('scripts')
        <script src="https://unpkg.com/dropzone@5/dist/min/dropzone.min.js"></script>   
        <script src="https://cdn.jsdelivr.net/npm/tinymce@6.4.2/tinymce.min.js"></script>
        <script>
            tinymce.init({
                selector: '#description'
            });
        
            tinymce.init({
                selector: '#meta_description'
            });


            //Image Upload Function using Dropzone
            Dropzone.autoDiscover = false;

            let myDropzone = new Dropzone("#ProductImageDrop", {
                url: '{{ route('product.image.upload') }}',
                maxFilesize: 3,
                acceptedFiles: 'image/*',
                paramName: 'image',
                addRemoveLinks: true,
                multipleuploads: true, 
                parallelUploads: 5, 

                init: function() {
                    this.on('sending', function(file, xhr, formData) {
                        formData.append('_token', '{{ csrf_token() }}');
                    });

                    this.on('success', function(file, response) {
                        console.log(response);
                        if (response.status) {
                            // Add the uploaded image path to the hidden input field
                            let imagesInput = document.getElementById('images');
                            let existingImages = imagesInput.value ? JSON.parse(imagesInput.value) : [];
                            existingImages.push(response.image);
                            imagesInput.value = JSON.stringify(existingImages);

                            notyf.success('Image uploaded successfully');
                        } else {
                            notyf.error('Image upload failed');
                        }
                    });

                    this.on('removedfile', function(file) {
                        // Remove the deleted image path from the hidden input field
                        let imagesInput = document.getElementById('images');
                        let existingImages = imagesInput.value ? JSON.parse(imagesInput.value) : [];
                        let removedIndex = existingImages.indexOf(file.path);
                        if (removedIndex !== -1) {
                            existingImages.splice(removedIndex, 1);
                            imagesInput.value = JSON.stringify(existingImages);
                        }
                    });
                }
            });
            
            // Image Remove Button Function
            $('#ProductImagePreview').on('click', '.remove-btn', function() {
                let removedImage = $(this).data('image');
                let existingImages = JSON.parse($('#images').val());
                let removedIndex = existingImages.indexOf(removedImage);
                if (removedIndex !== -1) {
                    existingImages.splice(removedIndex, 1);
                    $('#images').val(JSON.stringify(existingImages));
                }
                $(this).parent().remove();
            });

        </script>
        
    @endpush
</x-app-layout>
