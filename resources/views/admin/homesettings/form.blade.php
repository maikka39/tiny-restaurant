@extends('twill::layouts.free')

@section('customPageContent')
<form method="POST" action="{{route('admin.homesettings.update')}}">
    @csrf

  <a17-fieldset>
    <a17-textfield :maxlength="50" name="banner_title" label="Banner Title" :initial-value="'{{$bannerTitle}}'"></a17-textfield>
    <a17-textfield :maxlength="150" name="banner_description" label="Banner Beschrijving" :initial-value="'{{$bannerDescription}}'"></a17-textfield>
  </a17-fieldset>
  <a17-button variant="validate" type="submit">Update</a17-button>
</form>
@stop