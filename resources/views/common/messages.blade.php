@if (count($errors) > 0)
    <!-- Form Error List -->
    <div class="col-md-12">
        <div class="alert alert-danger" role="atert">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    </div>
@endif
