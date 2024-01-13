@extends('layouts.admin.admin')
@section('tittle', 'Edit Main Category')
@section('content')
    @include('includes.sidebars.adminSidebar')
    @include('includes.navbars.adminNavbar')
    <!-- Form Start -->
    {{ $category }}
    <div class="container-fluid pt-5 px-5">
        <div class="row g-4">
            <div class="col-sm-20 col-xl-50">
                <div class="bg-secondary rounded h-100 p-4">
                    <h6 class="mb-4">Edit Main Category ({{ $category->name }})</h6>
                    @include('includes.alerts.success')
                    @include('includes.alerts.errors')
                    <form method="post" action="{{ route('updateCategories',$category->id) }}" enctype="multipart/form-data">
                        @csrf
                        <input type="hidden" name="id" value="{{ $category->id }}">

                        <div class="form-group">
                            <div class="text-center">
                                <label class="form-label"> Current Image </label>
                                <br>
                                <img style="height: 500px ;width: 500px" src="{{ $category->photo }}" alt="Photo">

                            </div>
                        </div>
                        <br>
                        <div>
                            <label class="form-label"> Main Category Image </label>
                            <br>
                            <input type="file" name="photo" class="form-control @error('photo') is-invalid @enderror">
                            @error('photo')
                                <span class="invalid-feedback" role="alert">
                                    <strong>
                                        {{ $message }}
                                    </strong>
                                </span>
                            @enderror
                        </div>
                        <br>



                        <div class="mb-3">
                            <label class="form-label"> Main Category Nmae</label>
                            <input type="text" value="{{ $category->name }}"
                            name="category[0][name]"
                                class="form-control @error("category.0.name") is-invalid @enderror">

                            @error("category.0.name")
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror

                        </div>

                        <div class="mb-3" hidden>
                            <label class="form-label"> Abbreviation</label>
                            <input type="text" value="{{ $category->translation_lang }}"
                             name="category[0][abbr]" value=""
                                class="form-control @error("category.0.abbr") is-invalid @enderror">
                            @error("category.0.abbr")
                                <span class="invalid-feedback" role="alert">
                                    <strong> {{ $message }}</strong>
                                </span>
                            @enderror
                        </div>


                        <div class="mb-3">
                            <label class="form-label">Active Main Category ?</label>
                            <div>
                                <input type="radio" name="active" value=1 @if($category->active==1) checked @endif class="@error('active') is-invalid @enderror">
                                <label for="html">Active Now</label><br>
                                <input type="radio" name="active"  value=0 @if($category->active==0) checked @endif class="@error('active') is-invalid @enderror">
                                <label for="css">Active Later</label><br>
                                @error('active')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>
                                            {{ $message }}
                                        </strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <button type="submit" class="btn btn-primary">Save</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- Form End --
@endsection
