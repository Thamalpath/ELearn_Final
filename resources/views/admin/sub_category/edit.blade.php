<x-app-layout>
    @section('content')
        <div class="card card-primary m-3">
            <div class="card-header">
                <h3 class="card-title">Edit Sub Category</h3>
            </div>


            <form method="post">
                @csrf
                @method('PUT')
                <div class="card-body">
                    <div class="row">
                        <div class="col-3">
                            <div class="form-group">
                                <label for="sub_category_no">Sub_Category ID</label>
                                <input type="text" class="form-control" id="sub_category_no" value="{{ $sub_category->number }}" name="sub_category_no">
                            </div>
                        </div>
                        <div class="col-3">
                            <div class="form-group">
                                <label for="name">Sub Category Name</label>
                                <input type="text" name="name" id="name" value="{{$sub_category->name}}" class="form-control">
                            </div>
                        </div>
                        <div class="col-3">
                            <div class="form-group">
                                <label for="slug">Slug</label>
                                <input type="text" name="slug" id="slug" value="{{$sub_category->slug}}" class="form-control">
                            </div>
                        </div>
                        <div class="col-3">
                            <div class="form-group">
                                <label for="category_id">Category</label>
                                <select class="custom-select" name="category_id">
                                    <option>Select Category</option>
                                    @foreach ($categories as $category_id => $category_name)
                                        @if ($category_id == $sub_category->category_id) <!-- Check if category_id matches the current category -->
                                            <option value="{{ $category_id }}" selected>{{ $category_name }}</option> 
                                        @else
                                            <option value="{{ $category_id }}">{{ $category_name }}</option>
                                        @endif
                                    @endforeach
                                </select>
                            </div>
                        </div>                        
                    </div>
                    <div class="form-group">
                        <label for="description">Description</label>
                        <textarea class="form-control" rows="3" name="description" id="description">{{ $sub_category->description }}</textarea>
                    </div>
                    <div class="form-group">
                        <label for="meta_description">Meta Description</label>
                        <textarea class="form-control" rows="3" name="meta_description" id="meta_description">{{ $sub_category->meta_description }}</textarea>
                    </div>
                    <div class="form-group">
                        <label for="meta_keywords">Meta Keywords</label>
                        <textarea class="form-control" rows="2" name="meta_keywords" id="meta_keywords">{{ $sub_category->meta_keywords }}</textarea>
                    </div>
                    <div class="row">
                        <div class="col-6">
                            <div class="form-group">
                                <label for="slug">Meta Title</label>
                                <input type="text" name="meta_title" id="meta_title" value="{{$sub_category->meta_title}}" class="form-control">
                            </div>
                        </div>
                        <div class="col-3">
                            <div class="form-group">
                                <label for="status">Status</label>
                                <select class="custom-select" name="status">
                                    <option>Select Status type</option>
                                    @foreach ($statuses as $key => $status)
                                        @if ($key == $sub_category->status) <!-- Check if key matches the current status -->
                                            <option value="{{ $key }}" selected>{{ $status }}</option> 
                                        @else
                                            <option value="{{ $key }}">{{ $status }}</option>
                                        @endif
                                    @endforeach
                                </select>
                            </div>
                        </div>        
                        
                        <div class="col-3">
                            <div class="form-group">
                                <label for="popular">Popular</label>
                                <input type="checkbox" name="popular" id="popular" value="1" class="form-control" {{ $sub_category->popular ? 'checked' : '' }}>
                            </div>
                        </div>                        
                    </div>

                    <div class="row">
                        <div class="col-6">
                            <div class="form-group">
                                <label>Images</label>
                                <div id="SubCategoryImageDrop" class="dropzone {{ $sub_category->image ? 'd-none' : '' }} "></div>
                                <x-drop-img-preview class="{{ $sub_category->image ? 'd-block' : 'd-none' }} w-50"
                                    src="{{ asset('storage/' . $sub_category->image) }}" id="SubCategoryImage">
                                </x-drop-img-preview>
                                <input type="hidden" name="image" id="image" value="{{ $sub_category->image }}">
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


            ///Image Upload Function using Dropzone
            Dropzone.autoDiscover = false;

            let myDropzone = new Dropzone("#SubCategoryImageDrop", {
                url: '{{ route('sub_category.image.upload') }}',
                maxFilesize: 3,
                acceptedFiles: 'image/*',
                paramName: 'image',
                addRemoveLinks: true,
                init: function() {
                    this.on('sending', function(file, xhr, formData) {
                        formData.append('_token', '{{ csrf_token() }}');
                    });
                    this.on('success', function(file, response) {
                        console.log(response);
                        if (response.status) {
                            $('#image').val(response.image);
                            notyf.success('Image uploaded successfully')
                        } else {
                            notyf.error('Image upload failed')
                        }

                    });
                }
            });

            //Image Remove Button Function
            $('#SubCategoryImage .remove-btn').on('click', function() {
                $('#image').val('');
                $('#SubCategoryImage').addClass('d-none').removeClass('d-block');
                $('#SubCategoryImageDrop').removeClass('d-none');
            });
        </script>
        
    @endpush
</x-app-layout>
