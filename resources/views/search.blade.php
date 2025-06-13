<div class="container my-4">
    <input type="text" id="search" placeholder="Search..." class="form-control mb-3" autocomplete="off">

    <div id="search-results">
        <!-- Search results will be displayed here -->
    </div>
</div>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    $(document).ready(function() {
        $('#search').on('input', function() {
            var query = $(this).val();
            if (query.length > 2) { // Start searching after 2 characters
                $.ajax({
                    url: "{{ route('search') }}",
                    method: "GET",
                    data: { query: query },
                    success: function(data) {
                        $('#search-results').html(data);
                    }
                });
            } else {
                $('#search-results').empty();
            }
        });
    });
</script>