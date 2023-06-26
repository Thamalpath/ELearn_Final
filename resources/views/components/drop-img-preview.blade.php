{{-- This component used to remove the uploaded image --}}
<div class="drop-img-preview {{$class}}" id={{$id}}>
    <button class="remove-btn" type="button" >X</button>
    <img src="{{ $src }}" alt="" class="img-fluid">
</div>
