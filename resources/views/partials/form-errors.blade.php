@if ($errors->any())
    <div class="min-w-0 p-4 text-white bg-purple-600 roundedp-lg shadow-xs">
        <h4 class="mb-4 font-semibold">
            Verifique los campos del formulario
        </h4>
        <p>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </p>
    </div>
@endif