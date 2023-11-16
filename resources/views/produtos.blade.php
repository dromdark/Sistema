<x-app-layout>

<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" >
<script src="https://cdn.jsdelivr.net/npm/jquery@3.7.0/dist/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js"></script>
<link  href="https://cdn.datatables.net/1.13.4/css/jquery.dataTables.min.css" rel="stylesheet">
<script src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js"></script>
</head>
<body>
<div class="container mt-2">
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Produtos</h2>
            </div>
            <div class="pull-right mb-2">
                <a class="btn btn-success" onClick="add()" href="javascript:void(0)"> Criar Produtos</a>
            </div>
        </div>
    </div>
    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif
    <div class="card-body">
        <table class="table table-bordered" id="ajax-crud-datatable3">
            <thead>
                <tr>
                    <th>Código</th>
                    <th>Nome</th>
                    <th>Valor</th>
                    <th>Descrição</th>
                    <th>Criado em</th>
                    <th>Ações</th>
                </tr>
            </thead>
        </table>
    </div>
</div>
 
<!-- boostrap Produtos model -->
<div class="modal fade" id="Produtos-modal" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Produtos</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Fechar"></button>
            </div>
            <div class="modal-body">
                <form action="javascript:void(0)" id="ProdutosForm" name="ProdutosForm" class="form-horizontal" method="POST" enctype="multipart/form-data">
                    <input type="hidden" name="id" id="id">
                    <div class="form-group">
                        <label for="nome" class="col-sm-2 control-label">Nome</label>
                            <div class="col-sm-12">
                            <input type="text" class="form-control" id="Nome" name="Nome" placeholder="Nome" maxlength="50" required="">
                        </div>
                        <label for="Valor" class="col-sm-2 control-label">Valor</label>
                            <div class="col-sm-12">
                            <input type="number" class="form-control" id="Valor" name="Valor" placeholder="Valor" required="">
                        </div>
                        <label for="Descrição" class="col-sm-2 control-label">Descrição</label>
                            <div class="col-sm-12">
                            <input type="text" class="form-control" id="Descricao" name="Descricao" placeholder="Descrição" >
                        </div>
                    </div> 
                    <div class="col-sm-offset-2 col-sm-10"><br/>
                        <button type="submit" class="btn btn-primary" id="btn-save">Salvar</button>
                    </div>
                </form>
            </div>
            <div class="modal-footer"></div>
        </div>
    </div>
</div>
<!-- end bootstrap model -->
<script type="text/javascript">
$(document).ready( function () {
    $.ajaxSetup({
        headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    $('#ajax-crud-datatable3').DataTable({
        processing: true,
        serverSide: true,
        ajax: "{{ url('ajax-crud-datatable3') }}",
        columns: [
            { data: 'id', name: 'id' },
            { data: 'Nome', name: 'Nome' },
            { data: 'Valor', name: 'Valor' },
            { data: 'Descricao', name: 'Descricao' },
            { data: 'created_at', name: 'created_at' },
            { data: 'action', name: 'action', orderable: false},
        ],
        order: [[0, 'desc']]
    });
});


function add(){
    $('#ProdutosForm').trigger("reset");
    $('#ProdutosModal').html("Add Produtos");
    $('#Produtos-modal').modal('show');
    $('#id').val('');
}   
     
function editFunc(id){
    $.ajax({
        type:"POST",
        url: "{{ url('edit') }}",
        data: { id: id },
        dataType: 'json',
        success: function(res){
            $('#ProdutosModal').html("Editar Produtos");
            $('#Produtos-modal').modal('show');
            $('#id').val(res.id);
            $('#Nome').val(res.Nome);
            $('#Valor').val(res.Valor);
            $('#Descricao').val(res.Descricao);
        }
    });
}  
 
function deleteFunc(id){
    if (confirm("Apagar?") == true) {
        var id = id;
        // ajax
        $.ajax({
            type:"POST",
            url: "{{ url('delete') }}",
            data: { id: id },
            dataType: 'json',
            success: function(res){
                var oTable = $('#ajax-crud-datatable3').dataTable();
                oTable.fnDraw(false);
            }
        });
    }
}
 
$('#ProdutosForm').submit(function(e) {
    e.preventDefault();
    var formData = new FormData(this);
    $.ajax({
        type:'POST',
        url: "{{ url('add')}}",
        data: formData,
        cache:false,
        contentType: false,
        processData: false,
        success: (data) => {
            $("#Produtos-modal").modal('hide');
            var oTable = $('#ajax-crud-datatable3').dataTable();
            oTable.fnDraw(false);
            $("#btn-save").html('Salvar');
            $("#btn-save"). attr("disabled", false);
        },
        error: function(data){
            console.log(data);
        }
    });
});
</script>
</x-app-layout>