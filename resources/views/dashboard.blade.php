@extends('app')

@section('content')
	<div id="crud" class="row">
		<div class="col-sm-12">
			<h1 class="page-header">CRUD Laravel VueJS</h1>
		</div>
		<div class="col-sm-7">
			<a href="#" class="btn btn-primary float-right" data-toggle="modal" data-target="#create">Nueva Tarea</a>
			<table class="table table-hover">
				<thead>
					<tr>
						<th>ID</th>
						<th>Tarea</th>
						<th colspan="2">
							&nbsp;
						</th>
					</tr>
				</thead>
				<tbody>
					<tr v-for="keep in keeps">
						<td width="10px">@{{ keep.id }}</td>
						<td>@{{ keep.keep }}</td>
						<td width="10px">
							<a href="#" class="btn btn-warning btn-sm" v-on:click.prevent="editKeep(keep)">Editar</a>
						</td>
						<td width="10px">
							<a href="#" class="btn btn-danger btn-sm" v-on:click.prevent="deleteKeep(keep)">Eliminar</a>
						</td>
					</tr>
				</tbody>
			</table>
		
			<nav>
				<ul class="pagination">
					<li class="page-item">
						<a class="page-link" href=""><span>Atrás</span></a>
					</li>
					<li class="page-item">
						<a class="page-link" href=""><span>1</span></a>
					</li>
					<li class="page-item">
						<a class="page-link" href=""><span>2</span></a>
					</li>
					<li class="page-item">
						<a class="page-link" href=""><span>Siguiente</span></a>
					</li>
				</ul>
			</nav>

			@include('create')
			@include('edit')
		</div>
		<div class="col-sm-5">
			<pre>
				@{{ $data }}
			</pre>
		</div>
	</div>
@endsection