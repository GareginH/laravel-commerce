@extends('layouts.admin')
@section('content')
<div class="col-8 dash-content">
    <div class="container">
            
            <category-delete-btn></category-delete-btn>

            <form action="/admin/category"  method="post" >
            @csrf
            <div class="row">
                <h1>Add New Category</h1>
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
                <button class="btn btn-outline-dark col">Add</button>
            </div>
        </form>
    </div>
</div>
@endsection