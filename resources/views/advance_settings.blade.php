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
                    <p class="lead">Fields are the table fields that are required for each activity like Number of <span class="text-success">Male, Female, Session</span> and etc.</p>
                    <a href="{{ route('field.index') }}" class="btn btn-success text-light">View list of fields</a>
                    <a href="{{ route('field.create') }}" class="btn btn-info text-light">Add new field</a>
                </fieldset>
                <fieldset class="border p-2 mb-3">
                    <legend class="w-auto">Categories</legend>
                    <p class="lead">This section contains the links to add and view list of categories. Categories are specially handy for adding different types of parent and one level child category. Like <span class="text-success">Images</span> can be a parent category with <span class="text-success">Child Images, Weekly Report Images, Conferences</span> as its child categories.</p>
                    <a href="{{ route('categories.index') }}" class="btn btn-success text-light">View list of categories</a>
                    <a href="{{ route('categories.create') }}" class="btn btn-info text-light">Add new category</a>
                </fieldset>
                <fieldset class="border p-2 mb-3">
                    <legend class="w-auto">Activity Types</legend>
                    <p class="lead">This section houses the options to view and add Activity Types. Activity Types are the activities that are conducted via the containers, like <span class="text-success">Moderated Social Cultural Dialogue, Thematic Events</span> and more.</p>
                    <a href="{{ route('activity_type.index') }}" class="btn btn-success text-light">View list of activity types</a>
                    <a href="{{ route('activity_type.create') }}" class="btn btn-info text-light">Add new actity type</a>
                </fieldset>
                <fieldset class="border p-2 mb-3">
                    <legend class="w-auto">Provinces</legend>
                    <p class="lead">This section has the features to view the list of the provinces that has operational containers. We can add or remove provinces.</p>
                    <a href="{{ route('province.index') }}" class="btn btn-success text-light">View list of provinces</a>
                    <a href="{{ route('province.create') }}" class="btn btn-info text-light">Add new province (Container)</a>
                </fieldset>
            </div>
        </div>
    </div>
@endsection