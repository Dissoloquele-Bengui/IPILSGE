@extends('layout.admin.body')
@section('titulo','Lista das Categórias de Livro')

@section('conteudo')
<div class="container-fluid">
  <div class="row justify-content-center">
    <div class="col-12">
      <h2 class="mb-2 page-title">Lista das Categórias de Livro</h2>

      <div class="row my-4">
        
        <!-- Small table -->
        <div class="col-md-12">
          <div class="card shadow">

            <div class="card-body">
              <!-- table -->
              <div class="mb-3 toolbar row">
                <div class="ml-auto col">
                    <div class="float-right dropdown">
                      <button class="float-right ml-3 btn btn-primary"
                      class="btn botao" data-toggle="modal" data-target="#ModalCreate"
                      type="button">Adicionar +</button>

                    </div>
                  </div>

              </div>
              <table class="table datatables" id="dataTable-1">


                <thead>
                  <tr>
                      <th>ID</th>
                      <th>NOME</th>
                      <th>Opções</th>
                  </tr>
                </thead>
                <tbody>
                  @foreach ($categoria_livros as $categoria_livro)
                      <tr>
                          <td>{{$categoria_livro->id}}</td>
                          <td>{{{$categoria_livro->nome}}}</td>
                          <td>
                              <div class="dropdown">
                                  <button class="btn btn-sm dropdown-toggle more-horizontal" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                  <span class="text-muted sr-only">Action</span>
                                  </button>
                                  <div class="dropdown-menu dropdown-menu-right">
                                      <a class="dropdown-item" href="#" data-toggle="modal" data-target="#ModalEdit{{$categoria_livro->id}}">{{ __('Editar') }}</a>
                                      {{-- <a class="dropdown-item" href="{{route('admin.categoria_livro.edit',['id'=>$categoria_livro->id])}}">Editar</a> --}}
                                      <a class="dropdown-item" href="{{route('admin.categoria_livro.destroy',['id'=>$categoria_livro->id])}}">Remover</a>
                                      <a class="dropdown-item" href="{{route('admin.categoria_livro.purge',['id'=>$categoria_livro->id])}}">Purgar</a>
                                  </div>
                                  </div>

                          </td>
                      </tr>
                  {{-- ModalUpdate --}}
                  <div class="modal fade text-left" id="ModalEdit{{$categoria_livro->id}}" tabindex="-1" role="dialog" aria-hidden="true">
                      <div class="modal-dialog modal-md" role="document">
                          <div class="modal-content">
                              <div class="modal-header">
                                  <h4 class="modal-title">{{ __('Editar Categória de Livro') }}</h4>
                                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                      <span aria-hidden="true">&times;</span>
                                  </button>
                              </div>
                              <div class="modal-body">
                                  @include('admin.categoria_livro.edit.index')
                                  </div>
                              </div>
                          </div>
                      </div>
                  {{-- ModalUpdate --}}
                  @endforeach
              </tbody>
              </table>
            </div>
          </div>
        </div> <!-- simple table -->
      </div> <!-- end section -->
    </div> <!-- .col-12 -->
  </div> <!-- .row -->
</div> <!-- .container-fluid -->

{{-- ModalCreate --}}
        <div class="modal fade text-left" id="ModalCreate" tabindex="-1" role="dialog" aria-hidden="true">
            <div class="modal-dialog modal-md" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title">{{ __('Adicionar Categória de Livro') }}</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        @include('admin.categoria_livro.create.index')
                        </div>
                    </div>
                </div>
            </div>
        </div>
{{-- ModalCreate --}}

<script>
    $(document).ready(function() {
    $('#ModalCreate').on('show.bs.modal', function (event) {
        $.get('/categoria_livro/create', function(response) {
            $('#ModalCreate .modal-body').html(response);
        });
    });
});

</script>



@if (session('categoria_livro.destroy.success'))
    <script>
        Swal.fire(
            'Categória de Livro Eliminada com sucesso!',
            '',
            'success'
        )
    </script>
@endif
@if (session('categoria_livro.destroy.error'))
    <script>
        Swal.fire(
            'Erro ao Eliminar Categória de Livro!',
            '',
            'error'
        )
    </script>
@endif
@if (session('categoria_livro.purge.success'))
    <script>
        Swal.fire(
            'Categória de Livro Purgada com sucesso!',
            '',
            'success'
        )
    </script>
@endif
@if (session('categoria_livro.purge.error'))
    <script>
        Swal.fire(
            'Erro ao Purgar Categória de Livro!',
            '',
            'error'
        )
    </script>
@endif
@endsection
