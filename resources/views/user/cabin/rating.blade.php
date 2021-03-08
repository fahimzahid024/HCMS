@extends('layouts.test')
@section('hero')
<div class="container pt-5" style="margin-top:80px;">
        <div class="card">
            
            <div class="card-header text-center">
              <h1>Add Rating</h1>
            </div>
            @if (session()->has('message'))
              <div class="alert alert-{{ session('type') }}">
                  {{ session('message') }}
              </div>
          @endif
            <div class="card-body">
                <form action="{{ url('/add-rating/'.$id) }}" method="post">
                    @csrf
                    <input type="hidden" name="id" value="{{ $id }}">
                    <div class="form-group">
                        <select class="custom-select custom-select-lg mb-3" name="rating" required>
                            <option selected>Select Rating</option>
                            <option value="1">One</option>
                            <option value="2">Two</option>
                            <option value="3">Three</option>
                            <option value="4">Four</option>
                            <option value="4">Five</option>
                          </select>
                    </div>
                    <button type="submit" class="btn btn-primary">Add Rating</button>
                  </form>
            </div>
          </div>
</div>
@endsection