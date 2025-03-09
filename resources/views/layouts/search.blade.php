<!-- Search Bar -->
<input class="m-2 rounded-md" type="text" id="search" placeholder="Search...">

<!-- Results Container -->
<div id="results"></div>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    $(document).ready(function() {
        $('#search').on('keyup', function() {
            let query = $(this).val(); // Get the search query

            if (query.length >= 2) { // Trigger search only after 2 characters
                $.ajax({
                    url: "{{ route('search') }}", // Route to handle search
                    method: 'GET',
                    data: { query: query },
                    success: function(response) {
                        $('#results').html(response); // Display results
                    }
                });
            } else {
                $('#results').html(''); // Clear results if query is too short
            }
        });
    });
</script>