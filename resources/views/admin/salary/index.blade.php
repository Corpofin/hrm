@extends('layouts.admin') @section('content')

<div class="panel panel-default">

	<div class="panel-heading text-center">
			<span style="float: right;">
					<a href="{{route('employee.create')}}" class="btn btn-info btn-xs" align="left">
						<span class="glyphicon glyphicon-plus"></span> Export Salary
					</a>
			</span>
			<b style="text-align: center;">All Salaries</b>
	</div>
	<div class="row">

		<div class="col-md-6" style="padding-top:20px;">
			<form action="{{route('salary.processed')}}" method="post">
					{{csrf_field()}}
					<div class="form-group">
						<div class="col-md-6">
							<label for="start_date">Choose Month:</label>
							<div class='input-group date' id='month' name="month">
								<input type='text' class="form-control" name="month" />
								<span class="input-group-addon">
									<span class="glyphicon glyphicon-calendar"></span>
								</span>
							</div>
							<br>
							<button class="btn btn-info" type="submit">Process Salary</button>
							<br>
						</div>
					</div>
			</form>
{{-- 				
			<form action="{{route('salary.export')}}" method="post">
				{{csrf_field()}}
				<div class="form-group">
					<div class="col-md-6">
						<label for="start_date">Start Date</label>
						<div class='input-group date' id='start_date' name="start_date">
							<input type='text' class="form-control" name="start_date" />
							<span class="input-group-addon">
								<span class="glyphicon glyphicon-calendar"></span>
							</span>
						</div>
						<br>
					</div>
					<div class="col-md-6">
						<label for="end_date">End Date</label>
						<div class='input-group date' id='end_date' name="end_date">
							<input type='text' class="form-control" name="end_date" />
							<span class="input-group-addon">
								<span class="glyphicon glyphicon-calendar"></span>
							</span>
						</div>
						<br>
						<button class="btn btn-info" type="submit">Export Salary</button>

					</div>

				</div>


			</form> --}}
		</div>
		<div class="panel-body">
				<div class="modal fade" id="myModal" tabindex="-1" role="dialog">
                        <div class="modal-dialog" role="document">
                          <div class="modal-content">
                            <div class="modal-header">
                              <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                              <h4 class="modal-title">Manage Attendance</h4>
                            </div>
                            <div class="modal-body">
                                <label>Enter value:</label>
                              <input type="text" id="attendance">
                            </div>
                            <div class="modal-footer">
                              <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                              <button type="button" id="update" class="btn btn-primary">Save changes</button>
                              <button type="button" id="del" class="btn btn-danger">Delete</button>
                              
                            </div>
                          </div>
                        </div>
                </div>
			<table class="table">
				<thead>
					<th>Name</th>
					<th>Salary</th>
					<th>Add Bonus</th>
				</thead>

				@foreach($employees as $employee)
				
				<tbody class="table-bordered table-hover table-striped">	

					<tr>
						<td>
								{{$employee->firstname}}
						</td>
						<td>
								{{$salary->basic_salary}}
								
						</td>
						<td>
							<div class="col-sm-2">
									
								<form action="{{ route('salary.bonus' , $employee->id )}}" method="post">
									{{ csrf_field() }}
									<button class="btn btn-success btn-xs">
										Add Bonus
									</button>
								</form>
							</div>
						</td>
						

					</tr>


				</tbody>
				@endforeach
				
			</table>
		</div>
	</div>
	<script type="text/javascript">
		$(document).ready(function () {

			$(function () {

				$('#myModal').on('click',function(){
					
				})

				$('#month').datetimepicker({
					format: 'MM-YYYY'
				});
				// $('#start_date').datetimepicker({
				// 	viewMode: 'years',
				// 	format: 'YYYY/MM/DD'
				// });
				// $('#end_date').datetimepicker({
				// 	viewMode: 'years',
				// 	format: 'YYYY/MM/DD'
				// });
			});
		});
	</script>
</div>

@stop