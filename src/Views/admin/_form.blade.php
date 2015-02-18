@section('js')
    <script src="//tinymce.cachefly.net/4.1/tinymce.min.js"></script>
    <script src="{{ asset('js/admin/form.js') }}"></script>
@stop

@section('otherSideLink')
    @include('core::admin._navbar-public-link')
@stop


@include('core::admin._buttons-form')

{!! BootForm::hidden('id') !!}

@include('core::admin._image-fieldset', ['field' => 'image'])

@include('core::admin._tabs-lang-form', ['target' => 'content'])

<div class="tab-content">

{!! BootForm::checkbox(trans('validation.attributes.homepage'), 'homepage') !!}

<div class="row">
    <div class="col-sm-2 form-group @if($errors->has('position'))has-error @endif">
        {!! BootForm::text(trans('validation.attributes.position'), 'position')->value(1) !!}
    </div>
</div>

@foreach ($locales as $lang)

    <div class="tab-pane fade @if($locale == $lang)in active @endif" id="content-{{ $lang }}">
        @include('core::form._title-and-slug')
        {!! BootForm::checkbox(trans('validation.attributes.online'), $lang.'[status]') !!}
        {!! BootForm::text(trans('validation.attributes.website'), $lang.'[website]') !!}
        {!! BootForm::textarea(trans('validation.attributes.body'), $lang.'[body]')->addClass('editor') !!}
    </div>

@endforeach

</div>
