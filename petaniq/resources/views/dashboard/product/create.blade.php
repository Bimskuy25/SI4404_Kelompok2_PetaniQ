@extends('dashboard.layouts.main')

@section('container')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Vendors - add</h1>   
</div>
<div class="col-lg-8">
  <form method="post" action="/dashboard/vendors" enctype="multipart/form-data">
    @csrf
      <div class="mb-3">
        <label for="name" class="form-label ">Name</label>
        <input type="text" class="form-control @error('name') is-invalid @enderror" name="name" id="name" required autofocus value="{{ old('name') }}">
        @error('name')
        <div class="invalid-feedback">
          {{ $message }}
        </div>
        @enderror
      </div>
      <div class="mb-3">
        <label for="slug" class="form-label ">Slug</label>
        <input type="text" class="form-control @error('slug') is-invalid @enderror" name="slug" id="slug" required value="{{ old('slug') }}">
        @error('slug')
        <div class="invalid-feedback">
          {{ $message }}
        </div>
        @enderror
      </div>
      

      <div class="mb-3">
        <label for="founder" class="form-label ">Founder</label>
        <input type="text" class="form-control @error('founder') is-invalid @enderror" id="founder" name="founder" required value="{{ old('founder') }}" >
        @error('founder')
        <div class="invalid-feedback">
          {{ $message }}
        </div>
        @enderror
      </div>
      
      <div class="mb-3">
          <label for="star" class="form-label ">Star</label>
          <input type="text" class="form-control @error('star') is-invalid @enderror" id="star" name="star" required value="{{ old('star') }}">
          @error('star')
        <div class="invalid-feedback">
          {{ $message }}
        </div>
        @enderror
        </div>

        <div class="mb-3">
          <label for="formFile" class="form-label">Foto Flyer</label>
          <img class="img-preview img-fluid" src="" alt="">
          <input class="form-control @error('image') is-invalid @enderror" type="file" id="image" name="image" onchange="previewImage()">
          @error('image')
        <div class="invalid-feedback">
          {{ $message }}
        </div>
        @enderror
        </div>

        <div class="mb-3">
          <label for="desription" class="form-label ">description</label>
          <input type="hidden" name="description" id="description" class="@error('description') is-invalid @enderror" required value="{{ old('description') }}" >
          <trix-editor input="description"></trix-editor>
        </div>

      <button type="submit" class="btn btn-primary">Create Vendor</button>
    </form>
</div>

<script>
  const name = document.querySelector('#name');
  const slug = document.querySelector('#slug');

  name.addEventListener('change',function(){
    fetch('/dashboard/vendors/checkSlug?name=' + name.value)
      .then(response => response.json())
      .then(data => slug.value = data.slug) 
  });

  document.addEventListener('trix-file-accept',function(e){
    e.preventDefault()
  });


  function previewImage(){
    const image = document.querySelector('#image');
    const imgPreview = document.querySelector('.img-preview')

    imgPreview.style.display = 'block';
    const oFReader = new FileReader();
    oFReader.readAsDataURL(image.files[0]);

    oFReader.onload = function(oFREvent){
      imgPreview.src=oFREvent.target.result;
    }
  }
</script>
@endsection

