@extends('twill::layouts.free')

@push('extra_css')
  <link rel="stylesheet" href="{{ asset('css/settings.css') }}">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css"/>
@endpush

@push('extra_js')
  <script type="text/javascript" src="{{asset('js/settingRepeater.js')}}" defer></script>
@endpush

@section('customPageContent')
<form id='settingform' method="POST" action="{{route('admin.homesettings.update')}}">
    @csrf

  <a17-fieldset>
    <a17-textfield :maxlength="50" name="banner_title" label="Banner Titel" :initial-value="'{{$bannerTitle}}'"></a17-textfield>
    <a17-textfield :maxlength="150" name="banner_description" label="Banner Beschrijving" :initial-value="'{{$bannerDescription}}'"></a17-textfield>
  </a17-fieldset>

  <a17-fieldset>
    <div id='links' class="pt-5">

    @for ($i = 0; $i <= count($links); $i++)
      <!-- Linkblock -->
      <div class="linkblock">
        <div class="link mb-5">
          <label for="links">Link naam</label>
          <div class="form__field">
            <input class="link-input" type="text" name="links[{{$i}}][name]" placeholder="Voorbeeld: Facebook" 
              @if($i != count($links)) value="{{ $links[$i]->name}}"@endif>
          </div>
        </div>
        <div class="link">
          <label for="links">Link url</label>
          <div class="form__field">
            <input class="link-input" type="text" name="links[{{$i}}][url]" placeholder="Voorbeeld: https://www.facebook.com/TinyRestaurant.nl/" 
            @if($i != count($links)) value="{{ $links[$i]->url}}"@endif>
          </div>
        </div>
      </div>
      <!-- Linkblock -->
    @endfor
    </div>
    <div class="flex flex-wrap">
      <label id="add-error" class="error"></label>
      <button id="addButton" class="addButton" type="button">Nieuwe link toevoegen</button>
    </div>
  </a17-fieldset>

  <a17-button variant="validate" type="submit">Update</a17-button>
</form>
@stop