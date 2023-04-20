@if ($errors->any())
    <div {{ $attributes }}>
        <div class="font-medium text-red-600">{{ __('validation.whoops') }}</div>

      <ul class="mt-3 list-disc list-inside text-sm alert alert-danger">
            @foreach ($errors->all() as $error)
            <li>{{ __('validation.error') }} {{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
