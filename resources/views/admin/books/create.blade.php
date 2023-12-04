@extends('layouts.admin')
    @section('header')
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Create Book') }}
        </h2>
    @endsection

    @section('content')
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="my-6 p-6 bg-white border-b border-gray-200 shadow-sm sm:rounded-lg">
                <form  enctype="multipart/form-data" action="{{ route('admin.books.store') }}" method="post">
                    @csrf
                    <x-text-input
                        type="text"
                        name="title"
                        field="title"
                        placeholder="Title"
                        class="w-full"
                        autocomplete="off"
                        :value="@old('title')"></x-text-input>

                        @if($errors->has('title'))
                            <span class="invalid-feedback">
                                {{ $errors->first('title') }}
                            </span>
                        @endif

                    <textarea
                        name="description"
                        rows="10"
                        field="description"
                        placeholder="Description..."
                        class="w-full mt-6"
                        value="@old('description')"></textarea>

                        @if($errors->has('description'))
                            <span class="invalid-feedback">
                                {{ $errors->first('description') }}
                            </span>
                        @endif


                    <div class="form-group">
                        <label for="publisher">Publisher</label>
                        <x-text-input
                        type="text"
                        name="publisher_id"
                        field="publisher"
                        placeholder="Publisher"
                        class="w-full"
                        autocomplete="off"
                        :value="@old('publisher')"></x-text-input>

                        @if($errors->has('publisher'))
                        <span class="invalid-feedback">
                            {{ $errors->first('publisher') }}
                        </span>
                        @endif
                     </div>

                     

                    <div class="form-group">
                        <label for="authors"> <strong> Authors</strong> <br> </label>
                            <input type="checkbox", value="1" name="authors[]">
                           John Jones
                    </div>

                    @if($errors->has('authors'))
                        <span class="invalid-feedback">
                            {{ $errors->first('authors') }}
                        </span>
                    @endif

                    <input
                        type="file"
                        name="book_image"
                        placeholder="Book image"
                        class="w-full mt-6"
                        field="book_image"/>
                    
                        @if($errors->has('book_image'))
                            <span class="invalid-feedback">
                                {{ $errors->first('book_image') }}
                            </span>
                        @endif

                    <x-primary-button class="mt-6" type="submit" value="Submit">Save Book</x-primary-button>
                </form>
            </div>
        </div>
    </div>
    @endsection
