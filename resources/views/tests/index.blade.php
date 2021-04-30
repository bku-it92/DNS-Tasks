@extends('layouts.authenticated')

@section('content')
    <div class="container pb-5">
        @foreach($questions as $question)
            <div class="row justify-content-center mb-3">
                <div class="col-md-8">
                    <div class="card">
                        <div class="card-header">Frage #{{ $loop->index + 1 }}</div>

                        <div class="card-body">
                            @if($question->is_correct)
                                <div class="alert alert-success">
                                    Frage korrekt beantwortet!
                                </div>
                            @endif
                            <form method="post" action="{{ route('test.answer', ['id' => $question->id]) }}">
                                <p class="card-text fw-bold">{{ $question->question }}</p>
                                <textarea name="answer" id="answer" class="form-control w-100 mb-1" rows="5" style="resize: none" @if($question->is_correct) disabled @endif>{{ $question->given_answer }}</textarea>
                                <button type="submit" class="btn btn-lg btn-primary w-100" @if($question->is_correct) disabled @endif>@if($question->is_correct) Bereits beantwortet! @else Beantworten @endif</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    </div>

    <script>
        $(document).ready(function() {

            $('form').submit(function (e) {
                e.preventDefault();

                let form = e.target;
                let jForm = $(form);
                let textArea = jForm.find('textarea');
                let button = jForm.find('button');
                let card = jForm.parent();

                button.attr('disabled', 'disabled');
                button.html('<i class="fas fa-circle-notch fa-spin"></i>');

                let formData = {
                    answer: textArea.val(),
                };

                $.ajax({
                    type: form.method,
                    url: form.action,
                    data: formData,
                    dataType: 'json',
                    headers: {
                        'X-CSRF-TOKEN': '{{ csrf_token() }}'
                    },
                    encode: true,
                    success: function(data) {
                        if (data.is_correct) {
                            card.prepend(`<div class="alert alert-success">Frage korrekt beantwortet!</div>`);
                            textArea.attr('disabled', 'disabled');
                            button.html('Bereits beantwortet!');
                            return;
                        }

                        console.dir(data);
                        button.html('Abgesendet!');
                        button.attr('disabled', null);
                    },
                    error: function() {
                        button.html('Fehler beim senden!');
                        button.attr('disabled', null);
                    }
                });
            });
        });
    </script>
@endsection
