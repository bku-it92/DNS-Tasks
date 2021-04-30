@extends('layouts.authenticated')

@section('content')
    <div class="container mb-5">
        <div class="row">
            <div class="d-flex flex-row justify-content-between mb-3">
                <h3>Antworten von {{$user->name}}</h3>
            </div>
        </div>
        <div class="row justify-content-center mb-5">
            <table class="table table-bordered table-striped table-hover align-middle table-sm">
                <colgroup>
                    <col class="col-md-1">
                    <col class="col-md-4">
                    <col class="col-md-2">
                    <col class="col-md-2">
                    <col class="col-md-1">
                    <col class="col-md-2">
                </colgroup>
                <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Frage</th>
                    <th scope="col">Korrekte Antwort</th>
                    <th scope="col">Gegebene Antwort</th>
                    <th scope="col">Korrekt?</th>
                    <th scope="col"></th>
                </tr>
                </thead>
                <tbody>
                @foreach($answers as $answer)
                    <tr>
                        <td scope="row">{{ $answer->question->id }}</td>
                        <td>{{ $answer->question->question }}</td>
                        <td>{{ $answer->question->answer }}</td>
                        <td>{{ $answer->answer }}</td>
                        <td class="text-center"><input type="checkbox" @if ($answer->is_correct) checked @endif onclick="return false;"></td>
                        <td>
                            <div class="d-flex flex-row gap-1">
                                <form method="post" action="{{ route('admin.answered.state', ['id' => $answer->id]) }}" class="flex-grow-1">
                                    <input type="checkbox" name="state" class="d-none" checked>
                                    <button type="submit" class="w-100 btn btn-success btn-sm">Richtig</button>
                                </form>
                                <form method="post" action="{{ route('admin.answered.state', ['id' => $answer->id]) }}" class="flex-grow-1">
                                    <input type="checkbox" name="state" class="d-none">
                                    <button type="submit" class="w-100 btn btn-danger btn-sm">Falsch</button>
                                </form>
                            </div>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>

    <script>
        $(document).ready(function() {

            $('form').submit(function (e) {
                e.preventDefault();

                let form = e.target;
                let jForm = $(form);
                let state = jForm.find('input');
                let container = jForm.parent();
                let cell = container.parent();
                let row = cell.parent();
                let check = row.find('input').first();

                let formData = {
                    state: state.is(':checked'),
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
                    success: function() {
                        if (formData.state) {
                            check.attr('checked', 'checked');
                            return;
                        }

                        check.removeAttr('checked');
                    }
                });
            });
        });
    </script>
@endsection
