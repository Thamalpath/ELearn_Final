<x-app-layout>
    @section('content')
        <div class="card card-primary m-3">
            <div class="card-header">
                <h3 class="card-title">Add Sub Category</h3>
            </div>


            <form method="post">
                @csrf
                <div class="card-body">
                    <div class="row">
                        <div class="col-3">
                            <div class="form-group">
                                <label for="sub_category_no">Sub_Category ID</label>
                                <input type="text" class="form-control" id="sub_category_no" name="sub_category_no">
                            </div>
                        </div>
                        <div class="col-3">
                            <div class="form-group">
                                <label for="name">Sub_Category Name</label>
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
                                <label for="category">Category</label>
                                <select class="custom-select" name="category_id" id="category_id">
                                    <option value="">Select Category</option>
                                    @foreach ($categories as $id => $name)
                                        <option value="{{ $id }}">{{ $name }}</option>
                                    @endforeach
                                </select>
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
                        <div class="col-6">
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
                                <label for="popular">Popular</label>
                                <input type="checkbox" name="popular" id="popular" value="1" class="form-control">
                            </div>
                        </div>                        
                    </div>
                    <div class="row">
                        <div class="col-12">
                            <div class="form-group">
                                <label>Images</label>
                                <div id="subcategoryImageDrop" class="dropzone"></div>
                                <input type="hidden" name="image" id="image">
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

            let myDropzone = new Dropzone("#subcategoryImageDrop", {
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
                        if(response.status){
                            $('#image').val(response.image);
                            notyf.success('Image uploaded successfully')
                        }else{
                            notyf.error('Image upload failed')
                        }

                    });
                }
            });
        </script>
    @endpush
</x-app-layout>
