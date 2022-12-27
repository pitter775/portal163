<div class="col-md-12" style="border-top: solid 1px #eee; margin-top: 20px">
    <p class="card-category" style="margin-top: 20px;">REGIÕES DESSE USUÁRIO</p>
</div>
<table id="example2" class="table table-bordered" style="width:100%">
    <thead>
        <tr>
            <th>ID</th>
            <th>REGIÃO</th>
            <th>Município</th>
            <th>Longitude</th>
            <th>Latitude</th>
            <th style="width: 20px;"></th>
        </tr>
    </thead>
    <tbody>
    @foreach($dados_vinculos as $key => $value2)
        <tr>
            <td>{{ $value2->id }}</td>
            <td>{{ $value2->regnome }}</td>
            <td>{{ $value2->munome }}</td>
            <td>{{ $value2->longitude }}</td>
            <td>{{ $value2->latitude }}</td>
            <td>
                <a href="#" class="btn btn-danger btn-link" onclick="return deletar_vinculo('{{ $value2->id }}')"><i class="nc-icon nc-simple-remove"></i></a>   
            </td>
        </tr>
    @endforeach                            
    </tbody>
</table>

<style>
    .dataTables_length{ display: none;}
</style>
<script>
var appUrl ="{{env('APP_URL')}}";
       $('#example2').DataTable({
            "pagingType": "full_numbers", 
            "lengthMenu": [
                        [60, 25, 50, -1],
                        [60, 25, 50, "All"]
                        ],
                responsive: true,
                language: {
                search: "_INPUT_",
                searchPlaceholder: "Buscar",
            }
        });

        function deletar_vinculo(id){
            if(confirm('Deseja remover essa cidade? ')){
                $.get(appUrl+'/gerenciadoras/vinculos/delete/'+id, function(retorno){
                    buscar_vinculo();
                });
            }
        }

    </script>
