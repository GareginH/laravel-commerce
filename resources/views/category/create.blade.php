@extends('layouts.admin')
@section('content')
<div class="col-8 dash-content">
    <category-delete-btn></category-delete-btn>
    <div class="container mt-5">
            
            

            <form action="/admin/category"  method="post" >
            @csrf
            <div class="row">
                <h3>Add New Category</h3>
            </div>
            <div class="form-group row">
                <label for="name" class="col-form-label">Category Name</label>

                <input id="name"
                        type="text"
                        class="form-control{{ $errors->has('title') ? ' is-invalid' : '' }}"
                        name="name"
                        autocomplete="name" autofocus>

                @if ($errors->has('name'))
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $errors->first('name') }}</strong>
                    </span>
                @endif
            </div>
    
            <div class="row pt-4">
                <button class="btn btn-main col">Add</button>
            </div>
        </form>
    </div>
</div>
@endsection