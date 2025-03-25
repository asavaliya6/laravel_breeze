<!DOCTYPE html>
<html>
<head>
    <title>Ajax Dropdown</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</head>
<body>
    <div class="container mt-5">
        <div class="card shadow-lg p-4">
            <h2 class="text-center text-black mb-4">Laravel AJAX Dropdown</h2>

            <div class="mb-3">
                <label class="form-label fw-bold">Country</label>
                <select id="country" name="country" class="form-select">
                    <option value="">Select Country</option>
                    @foreach ($countries as $country)
                        <option value="{{ $country->id }}">{{ $country->name }}</option>
                    @endforeach
                </select>
            </div>

            <div class="mb-3">
                <label class="form-label fw-bold">State</label>
                <select id="state" name="state" class="form-select">
                    <option value="">Select State</option>
                </select>
            </div>

            <div class="mb-3">
                <label class="form-label fw-bold">City</label>
                <select id="city" name="city" class="form-select">
                    <option value="">Select City</option>
                </select>
            </div>
        </div>
    </div>

    <script>
        $(document).ready(function () {
            $('#country').on('change', function () {
                var countryId = $(this).val();
                if (countryId) {
                    $.ajax({
                        url: "{{ route('getStates') }}",
                        type: "POST",
                        data: { country_id: countryId },
                        headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') },
                        success: function (data) {
                            $('#state').empty().append('<option value="">Select State</option>');
                            $.each(data, function (key, value) {
                                $('#state').append('<option value="' + value.id + '">' + value.name + '</option>');
                            });
                        }
                    });
                } else {
                    $('#state').empty().append('<option value="">Select State</option>');
                    $('#city').empty().append('<option value="">Select City</option>');
                }
            });

            $('#state').on('change', function () {
                var stateId = $(this).val();
                if (stateId) {
                    $.ajax({
                        url: "{{ route('getCities') }}",
                        type: "POST",
                        data: { state_id: stateId },
                        headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') },
                        success: function (data) {
                            $('#city').empty().append('<option value="">Select City</option>');
                            $.each(data, function (key, value) {
                                $('#city').append('<option value="' + value.id + '">' + value.name + '</option>');
                            });
                        }
                    });
                } else {
                    $('#city').empty().append('<option value="">Select City</option>');
                }
            });
        });
    </script>
</body>
</html>
