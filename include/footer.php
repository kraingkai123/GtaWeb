<script src="../admin/vendors/jquery/dist/jquery.min.js"></script>
<script src="../admin/vendors/popper.js/dist/umd/popper.min.js"></script>
<script src="../admin/vendors/bootstrap/dist/js/bootstrap.min.js"></script>
<script src="../admin/assets/js/main.js"></script>
<script src="../admin/vendors/jqvmap/dist/jquery.vmap.min.js"></script>
<script src="../admin/vendors/jqvmap/examples/js/jquery.vmap.sampledata.js"></script>
<script src="../admin/vendors/jqvmap/dist/maps/jquery.vmap.world.js"></script>
<!-- <link href="../vendors/select2/dist/css/select2.min.css" rel="stylesheet" />
<script src="../vendors/select2/dist/js/select2.min.js"></script> -->

<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.10.0/js/bootstrap-datepicker.min.js" integrity="sha512-LsnSViqQyaXpD4mBBdRYeP6sRwJiJveh2ZIbW41EBrNmKxgr/LFZIiWT6yr+nycvhvauz8c2nYMhrP80YhG7Cw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.1.0-rc.0/css/select2.min.css" rel="stylesheet" />
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.1.0-rc.0/js/select2.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<!-- DataTables CSS -->
<link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/jquery.dataTables.min.css">

<!-- DataTables JS -->
<script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>

<script>
    function LoadDatatable(table) {
        var t = $('#' + table).DataTable({
            "responsive": true,
            "lengthChange": false,
            "columnDefs": [{
                    responsivePriority: 1,
                    targets: 0
                },
                {
                    responsivePriority: 2,
                    targets: 1
                }
            ],

            "language": {
                "search": "ค้นหา:",
                "infoFiltered": "( คำที่ค้นหา จาก _MAX_ รายการ ทั้งหมด ) ",

            }
        });
        t.on('order.dt search.dt', function() {
            t.column(0, {
                search: 'applied',
                order: 'applied'
            }).nodes().each(function(cell, i) {
                cell.innerHTML = i + 1;
            });
        }).draw();
    }

    function showLoadingPage(showText = "") {
        let text = showText || "Loading...";
        Swal.fire({
            title: '',
            text: text,
            allowOutsideClick: false,
            didOpen: () => {
                Swal.showLoading(); // Display loading spinner
            }
        });

    }
   
    
</script>