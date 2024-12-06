<div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="deleteModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="deleteModalLabel">Hapus Data</h3>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
            </div>
            <div class="modal-body">
                Apakah anda yakin untuk menghapus data ini?
            </div>
            <div class="modal-footer">
                <form id="btn_hapus_modal" method="POST">
                    @csrf
                    @method('DELETE')
                    <button type="button" class="btn btn-secondary btn-sm" data-dismiss="modal">Tutup</button>
                    <button type="submit" class="btn btn-danger btn-sm">Hapus</button>
                </form>
            </div>
        </div>
    </div>
</div>


<script>
    $('.select2-biasa').select2();

    $(document).on("click",".btn_delete_modal_href", function() {
        $("#deleteModal").modal("show")
        let url = $(this).data("url_modal");
        $('#btn_hapus_modal').attr('action', url);
    });

    $(document).on("click", ".btn-hapus_aman", function() {
        swal("Mohon Maaf", "Terdapat data yang sedang digunakan!", "warning");
    });


    $('.datatables-simple').DataTable({
        language: {
            searchPlaceholder: "Cari"
        },
        fixedHeader: true
    });


    $('.input_date').datepicker({
        format: 'yyyy-mm-dd',
        language: 'id'
    });

    $('.input_date').datepicker('hide');

    $('.open-datetimepicker').click(function() {
        $(this).next('.input_date').datepicker('show');
    });
</script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">

@if ($errors->any())
    @foreach ($errors->all() as $error)
        <script>
            toastr["error"]("{!! $error !!}")
        </script>
    @endforeach
@endif

<script>
    if ("{{ Session::get('success') }}") {
        toastr["success"]("{!! Session::get('success') !!}")
    }
    if ("{{ Session::get('warning') }}") {
        toastr["warning"]("{!! Session::get('warning') !!}")
    }
    if ("{{ Session::get('error') }}") {
        toastr["error"]("{!! Session::get('error') !!}")
    }

    toastr.options = {
        "closeButton": false,
        "debug": false,
        "newestOnTop": false,
        "progressBar": true,
        "positionClass": "toast-top-right",
        "preventDuplicates": false,
        "onclick": null,
        "showDuration": "300",
        "hideDuration": "1000",
        "timeOut": "5000",
        "extendedTimeOut": "1000",
        "showEasing": "swing",
        "hideEasing": "linear",
        "showMethod": "fadeIn",
        "hideMethod": "fadeOut"
    }
</script>
<script>
    function formatRupiah(angka, prefix) {
        if (angka === undefined || angka === null) {
            return ''; // Atau bisa disesuaikan dengan default value yang diinginkan
        }

        let numberString = angka.toString().replace(/[^,\d]/g, ''),
            split = numberString.split(','),
            sisa = split[0].length % 3,
            rupiah = split[0].substr(0, sisa),
            ribuan = split[0].substr(sisa).match(/\d{3}/gi);

        if (ribuan) {
            let separator = sisa ? '.' : '';
            rupiah += separator + ribuan.join('.');
        }

        rupiah = split[1] !== undefined ? rupiah + ',' + split[1] : rupiah;
        return prefix === undefined ? rupiah : (rupiah ? 'Rp. ' + rupiah : '');
    }

    // $('.nominal').on('keyup', function() {
    //     $(this).val(formatRupiah($(this).val()));
    // });
    $(document).on('keyup', '.nominal', function() {
        $(this).val(formatRupiah($(this).val()));
    });

    function toNumeric(value) {
        let newValue = String(value).replace(/[Rp.\s]/g, '').replace('.', '');
        return parseInt(newValue);
    }

</script>
