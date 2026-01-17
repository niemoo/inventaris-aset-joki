{{-- <script>
    $(function() {
        $('#year').change(function() {
            let val = $('#year').val();

            if (val !== '') {
                let url = `{{ url('laporan/print') }}/` + val;
                $('#href-print').attr('href', url);
            } else {
                $('#href-print').attr('href', '');
            }
        });
    });
</script> --}}
<script>
    $(function() {
        function updatePrintLink() {
            let start = $('#start_date').val();
            let end = $('#end_date').val();

            if (start !== '' && end !== '') {
                let url = `{{ route('admin.laporan.print.in') }}?start_date=${start}&end_date=${end}`;
                $('#href-print').attr('href', url);
            } else {
                $('#href-print').attr('href', '#');
            }
        }

        $('#start_date, #end_date').change(function() {
            updatePrintLink();
        });
    });
</script>
