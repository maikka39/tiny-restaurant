<div class="box">
    <div class="columns">
        <div class="column is-one-third is-offset-three-fifths box">
            <form class="control" method="POST" action="{{ route('contact.sendMail') }}">
                @csrf
                <h1 class="title mt-5 mb-5">Contact</h1>

                <div class="columns">
                    <div class="column">
                        <div class="control">
                            <input class="input" id="firstname" type="text" name="firstname" value="{{ old("firstname") }}" placeholder="Voornaam" required>
                            @error('firstname')
                                <div class="has-text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="column is-three-fifths">
                        <input class="input" id="lastname" type="text" name="lastname" value="{{ old("lastname") }}" placeholder="Achternaam" required>
                        @error('lastname')
                            <div class="has-text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

                <div class="columns">
                    <div class="column is-full">
                        <div class="control">
                            <input class="input" id="email" type="email" name="email" value="{{ old("email") }}" placeholder="E-mailadres" required>
                            @error('email')
                                <div class="has-text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                </div>

                <div class="columns">
                    <div class="column is-full">
                        <div class="control">
                            <textarea class="textarea has-fixed-size" id="message" name="message" placeholder="Bericht" required>{{ old("message") }}</textarea>
                            @error('message')
                                <div class="has-text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                </div>

                <span class="icon-text">
                <label class="label has-icons-right" for="project">Optioneel</label>
                <span class="icon is-right">
                        <i class="far fa-question-circle"></i>
                    </span>
            </span>

                <div class="columns">
                    <div class="column">
                        <div class="control select">
                            <select id="project" name="project">
                                <option selected disabled>Selecteer een project</option>
                                @foreach($projectList as $project)
                                    <option>{{$project->name}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                </div>

                {!! NoCaptcha::displaySubmit('my-form-id', 'Verstuur bericht') !!}

                @error('g-recaptcha-response')
                <div class="has-text-danger">{{ $message }}</div>
                @enderror

                @if (session('success_message'))
                    <p class="has-text-success">{{ session('success_message') }}</p>
                @endif
            </form>
        </div>


    </div>
</div>

@push('scripts')
    {!! NoCaptcha::renderJs() !!}
    <script src="https://www.google.com/recaptcha/api.js?render=6LdQs94aAAAAADY5gu0AFUSYCIh8zxSdzmGbepGy"></script>
@endpush