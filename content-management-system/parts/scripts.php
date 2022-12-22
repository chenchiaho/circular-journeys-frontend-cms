<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.2/jquery.min.js"></script>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js"></script>

<script>
$(document).ready(function() {
  $('#myTable').DataTable({
    "paging": false, // disable pagination
    "ordering": false, // disable sorting
    "searching": false, // disable search field
    "pagingType": "full_numbers", // use full numeric pagination
    "lengthMenu": [[10, 25, 50, -1], [10, 25, 50, "All"]], // options for number of rows per page
    "order": [[ 0, "asc" ]], // sort by first column in ascending order
    "language": { // set language options
      "search": "Filter records:", // change search placeholder text
      "info": "Showing _START_ to _END_ of _TOTAL_ records", // customize info text
      "paginate": { // customize pagination controls
        "first": "First",
        "last": "Last",
        "next": "Next",
        "previous": "Previous"
      }
    }
  });
});
</script>