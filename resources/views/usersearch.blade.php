<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Select2 Ajax Search</title>
    <link href="https://cdn.jsdelivr.net/npm/select2@4.0.13/dist/css/select2.min.css" rel="stylesheet" />
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/select2@4.0.13/dist/js/select2.min.js"></script>
</head>
<body>
    <h2>Select2 Ajax Search in Laravel 11</h2>
    <select class="user-search form-control" multiple="multiple" style="width: 300px;">
        <option value="">Search User...</option>
    </select>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/select2@4.0.13/dist/js/select2.min.js"></script>

    <script>
        $(document).ready(function() {
            $('.user-search').select2({
                placeholder: "Search for a user",
                allowClear: true,
                multiple: true,
                ajax: {
                    url: '{{ route("user.search") }}',
                    dataType: 'json',
                    delay: 250,
                    data: function (params) {
                        return {
                            q: params.term
                        };
                    },
                    processResults: function (data) {
                        return {
                            results: data.map(user => ({
                                id: user.id,
                                text: user.name
                            }))
                        };
                    },
                    cache: true
                }
            });
        });
    </script>
</body>
</html>
