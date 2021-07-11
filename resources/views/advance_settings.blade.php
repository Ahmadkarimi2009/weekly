@extends('layouts.app')
@section('content')
    <div class="container mt-5">
        <div class="row">
            <div class="col-12">
                <h1>Advance Settings</h1>
            </div>
            <div class="col-sm-12">
                <fieldset class="border p-2 mb-3">
                    <legend class="w-auto">Fields</legend>
                    <p class="text">Fields are the table fields that are required for each activity like Number of Male, Female, Session and etc.</p>
                    <a href="{{ route('field.index') }}" class="btn btn-success text-light">View list of fields</a>
                    <a href="{{ route('field.create') }}" class="btn btn-info text-light">Add new field</a>
                </fieldset>
                <fieldset class="border p-2 mb-3">
                    <legend class="w-auto">Categories</legend>
                    <a href="{{ route('categories.index') }}" class="btn btn-success text-light">View list of categories</a>
                    <a href="{{ route('categories.create') }}" class="btn btn-info text-light">Add new category</a>
                </fieldset>
                <fieldset class="border p-2 mb-3">
                    <legend class="w-auto">Activities</legend>
                    <a href="{{ route('activity_type.index') }}" class="btn btn-success text-light">View list of activity types</a>
                    <a href="{{ route('activity_type.create') }}" class="btn btn-info text-light">Add new actity type</a>
                </fieldset>
            </div>
        </div>
    </div>
@endsection