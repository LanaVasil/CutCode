<!-- Відображення назв помилок валідації Displaying the Validation Errors -->
@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
@endif
<!--  /Відображення назв помилок валідації Displaying the Validation Errors -->
