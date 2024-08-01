# PaginationDataTableServer
pagination using data table server side using php


     $(document).ready(function() {
            $('#datatable').DataTable({
                "bProcessing": true,
                "bServerSide": true,
                "ajax": "ajax_pagination.php"
            });

        });

        have to use jquery and jquerydata table library using cdn or locally
