<script src="{{ asset('vendor/js/jquery-3.2.1.min.js') }}"></script>
<script src="{{ asset('vendor/materialize/js/materialize.min.js') }}"></script>
<script src="{{ asset('js/app.js') }}"></script>
@if(app()->environment() == 'production')
    <script src="{{ asset('js/ga.js') }}"></script>
@endif