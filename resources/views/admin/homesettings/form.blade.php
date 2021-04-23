@extends('twill::layouts.free')

@section('customPageContent')
<form method="POST" action="{{route('admin.homesettings.update')}}">
    @csrf

  <a17-fieldset>
    <a17-textfield name="banner_title" label="Banner Title"></a17-textfield>
    <a17-textfield name="banner_description" label="Banner Beschrijving"></a17-textfield>
  </a17-fieldset>
  <a17-button variant="validate" type="submit">Update</a17-button>
</form>
@stop