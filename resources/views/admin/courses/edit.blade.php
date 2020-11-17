@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.edit') }} {{ trans('cruds.course.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.courses.update", [$course->id]) }}" enctype="multipart/form-data">
            @method('PUT')
            @csrf

            <div class="form-group">
                <label class="required" for="name">{{ trans('cruds.course.fields.title') }}</label>
                <input class="form-control {{ $errors->has('title') ? 'is-invalid' : '' }}" type="text" name="title" id="title" value="{{ old('title', $course->title) }}" required>
                @if($errors->has('title'))
                    <div class="invalid-feedback">
                        {{ $errors->first('title') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.course.fields.title_helper') }}</span>
            </div>

            <div class="form-group">
                <label class="required" for="teacher_id">{{ trans('cruds.course.fields.teacher') }}</label>
                <select class="form-control" id="teacher_id" name="teacher_id">
                    <option value="">Select</option>
                    @foreach ($teachers as $teacher)
                    <option value="{{$teacher->id}}" @if ($course->teacher_id==$teacher->id)selected @endif >{{$teacher->name}}</option> 
                    @endforeach
                </select>
            </div>


            <div class="form-group">
                <label class="required" for="category_id">{{ trans('cruds.course.fields.category') }}</label>
                <select class="form-control" id="category_id" name="category_id">
                    <option value="">Select</option>
                    @foreach ($categories as $category)
                    <option value="{{$category->id}}" @if ($course->category_id==$category->id)selected @endif >{{$category->name}}</option> 
                    @endforeach
                </select>
            </div>

           
            <div class="form-group">
                <label class="required" for="room_id">{{ trans('cruds.course.fields.room') }}</label>
                <select class="form-control" id="room_id" name="room_id">
                    <option value="">Select</option>
                    @foreach ($rooms as $room)
                    <option value="{{$room->id}}" @if ($course->room_id==$room->id)selected @endif >{{$room->name}}</option> 
                    @endforeach
                </select>
            </div>

            <div class="form-group">
                <label class="required" for="is_featured">{{ trans('cruds.listing.fields.featured') }}</label><br>
                <input type="radio" name="is_featured" value=1 @if($course->is_featured==1) checked @endif>Yes &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                <input type="radio" name="is_featured"  value=0 @if($course->is_featured==0) checked @endif>No
            </div>

            <div class="form-group">
                <label for="day">{{ trans('cruds.course.fields.day') }}</label>
                <input class="form-control {{ $errors->has('day') ? 'is-invalid' : '' }}" type="text" name="day" id="day" value="{{ old('day', $course->day) }}" required>
                @if($errors->has('day'))
                    <div class="invalid-feedback">
                        {{ $errors->first('day') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.course.fields.day_helper') }}</span>
            </div>

            <div class="form-group">
                <label for="time">{{ trans('cruds.course.fields.time') }}</label>
                <input class="form-control {{ $errors->has('time') ? 'is-invalid' : '' }}" type="text" name="time" id="time" value="{{ old('time', $course->time) }}" required>
                @if($errors->has('time'))
                    <div class="invalid-feedback">
                        {{ $errors->first('time') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.course.fields.time_helper') }}</span>
            </div>



            <div class="form-group">
                <label for="description">{{ trans('cruds.course.fields.description') }}</label>
                <textarea class="form-control" rows="5" id="description" name="description">{{ old('description', $course->description) }}</textarea>
            </div>

            <div class="form-group">
                <button class="btn btn-danger" type="submit">
                    {{ trans('global.save') }}
                </button>
            </div>
        </form>
    </div>
</div>



@endsection