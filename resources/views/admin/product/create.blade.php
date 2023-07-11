<x-app-layout>
    @section('content')
        <div class="card card-primary m-3">
            <div class="card-header">
                <h3 class="card-title">Add Product</h3>
            </div>


            <form method="post">
                @csrf
                <div class="card-body">
                    <div class="row">
                        <div class="col-3">
                            <div class="form-group">
                                <label for="product_no">Product ID</label>
                                <input type="text" class="form-control" id="product_no" name="product_no">
                            </div>
                        </div>
                        <div class="col-3">
                            <div class="form-group">
                                <label for="name">Name</label>
                                <input type="text" name="name" id="name" class="form-control">
                            </div>
                        </div>
                        <div class="col-3">
                            <div class="form-group">
                                <label for="slug">Slug</label>
                                <input type="text" name="slug" id="slug" class="form-control">
                            </div>
                        </div>
                        <div class="col-3">
                            <div class="form-group">
                                <label for="qty">Quantity</label>
                                <input type="text" name="qty" id="qty" class="form-control">
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-4">
                            <div class="form-group">
                                <label for="category">Category</label>
                                <select class="custom-select" name="category_id" id="category_id">
                                    <option value="">Select Category</option>
                                    @foreach ($categories as $id => $name)
                                        <option value="{{ $id }}">{{ $name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-4">
                            <div class="form-group">
                                <label for="sub_category">Sub Category</label>
                                <select class="custom-select" name="sub_category_id" id="sub_category_id">
                                    <option value="">Select Sub Category</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-4">
                            <div class="form-group">
                                <label for="material">Material</label>
                                <select class="custom-select" name="material" id="material">
                                    <option value="">Select Material</option>
                                    @foreach ($materials as $id => $name)
                                        <option value="{{ $id }}">{{ $name }}</option>
                                    @endforeach
                                </select>                                                     
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-4">
                            <div class="form-group">
                                <label for="original_price">Original Price</label>
                                <input type="number" class="form-control" id="original_price" name="original_price">
                            </div>
                        </div>
                        <div class="col-4">
                            <div class="form-group">
                                <label for="selling_price">Selling Price</label>
                                <input type="number" class="form-control" id="selling_price" name="selling_price">
                            </div>
                        </div>
                        <div class="col-4">
                            <div class="form-group">
                                <label for="tax">Tax</label>
                                <input type="number" class="form-control" id="tax" name="tax">
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-6">
                            <div class="form-group">
                                <label for="size">Sizes</label><br>
                                @foreach ($sizes as $size => $sizeName)
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="checkbox" name="sizes[]" id="size_{{ $size }}" value="{{ $size }}">
                                        <label class="form-check-label" for="size_{{ $size }}">{{ $sizeName }}</label>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                        
                        <div class="col-6">
                            <div class="form-group">
                                <label for="color">Colors</label><br>
                                @foreach ($colors as $color => $colorName)
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="checkbox" name="colors[]" id="color_{{ $color }}" value="{{ $color }}">
                                        <label class="form-check-label" for="color_{{ $color }}">{{ $colorName }}</label>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                    
                    
                    
                    <div class="form-group">
                        <label for="description">Description</label>
                        <textarea class="form-control" rows="3" name="description" id="description"></textarea>
                    </div>
                    <div class="form-group">
                        <label for="meta_description">Meta Description</label>
                        <textarea class="form-control" rows="3" name="meta_description" id="meta_description"></textarea>
                    </div>
                    <div class="form-group">
                        <label for="meta_keywords">Meta Keywords</label>
                        <textarea class="form-control" rows="2" name="meta_keywords" id="meta_keywords"></textarea>
                    </div>
                    
                    <div class="row">
                        <div class="col-4">
                            <div class="form-group">
                                <label for="slug">Meta Title</label>
                                <input type="text" name="meta_title" id="meta_title" class="form-control">
                            </div>
                        </div>
                        <div class="col-4">
                            <div class="form-group">
                                <label for="status"> Status</label>
                                <select class="custom-select" name="status">
                                    <option>Select Status type</option>
                                    @foreach ($statuses as $key => $status )
                                        <option value="{{ $key }}">{{ $status }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-2">
                            <div class="form-group">
                                <label for="trending">Trending</label>
                                <input type="checkbox" name="trending" id="trending" value="1" class="form-control">
                            </div>
                        </div> 
                        <div class="col-2">
                            <div class="form-group">
                                <label for="popular">Popular</label>
                                <input type="checkbox" name="popular" id="popular" value="1" class="form-control">
                            </div>
                        </div>                        
                    </div>
                    <div class="row">
                        <div class="col-12">
                            <div class="form-group">
                                <label>Images</label>
                                <div id="ProductImageDrop" class="dropzone"></div>
                                <input type="hidden" name="images" id="images">
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
                }
            });


            $(document).ready(function () {
                // When the category selection changes
                $('#category_id').on('change', function () {
                    var category_id = $(this).val();
                    if (category_id) {
                        // Send an AJAX request to retrieve subcategories for the selected category
                        $.ajax({
                            url: "{{ route('product.get.subcategories', ':category_id') }}".replace(':category_id', category_id),
                            type: "GET",
                            dataType: "json",
                            success: function (data) {
                                // Clear the subcategory dropdown and add an empty option
                                $('#sub_category_id').empty();
                                $('#sub_category_id').append('<option value="">Select Sub Category</option>');
                                // Populate the subcategory dropdown with retrieved data
                                $.each(data, function (id, name) {
                                    $('#sub_category_id').append('<option value="' + id + '">' + name + '</option>');
                                });
                            }
                        });
                    } else {
                        $('#sub_category_id').empty();
                        $('#sub_category_id').append('<option value="">Select Sub Category</option>');
                    }
                });
            });
        </script>

    @endpush
</x-app-layout>
