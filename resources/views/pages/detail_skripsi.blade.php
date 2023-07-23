@extends('template.template')
@section('content')
    <div class="row">

        <div class="col-md-4">
            @include('template.component.card.card_left')
        </div>

        {{-- card center --}}
        <div class="col-md-8">
            @include('template.component.card.card_center')
        </div>
        {{--  --}}
    </div>

@section('manual_script')
    <script>
        $('#summernote').summernote({
            placeholder: 'Refrensi',
            fontNames: ['Arial', 'Arial Black', 'Comic Sans MS', 'Courier New'],
            tabsize: 2,
            height: 300
        });
    </script>
@endsection
@endsection
