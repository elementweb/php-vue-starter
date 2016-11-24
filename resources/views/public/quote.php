<div class="row" id="quote-view">	
	<div class="col-sm-8 col-sm-offset-2">
		<h3 class="margin-bottom-20">Step 1 - Personal Details</h3>

		<div class="form-group">
			<label class="control-label">Personal details*</label>

			<div class="row">
				<div class="col-sm-6">
					<input v-model="personal.first_name" maxlength="100" type="text" required="required" class="form-control margin-bottom-10" placeholder="First name"  />
				</div>

				<div class="col-sm-6">
					<input v-model="personal.last_name" maxlength="100" type="text" required="required" class="form-control margin-bottom-10" placeholder="Last name"  />
				</div>
			</div>

			<label class="control-label">E-mail address*</label>

			<div class="row">
				<div class="col-sm-6">
					<input v-model="personal.email" maxlength="100" type="text" required="required" class="form-control margin-bottom-10" placeholder="E-mail address"  />
				</div>

				<div class="col-sm-6">
					<input v-model="personal.email_confirm" maxlength="100" type="text" required="required" class="form-control margin-bottom-10" placeholder="Confirm e-mail address"  />
				</div>
			</div>

			<label class="control-label">Phone number</label>

			<div class="row">
				<div class="col-sm-6">
					<input v-model="personal.phone" maxlength="100" type="text" required="required" class="form-control margin-bottom-10" placeholder="Phone number"  />
				</div>
			</div>

			<label class="control-label">Create password*</label>

			<div class="row">
				<div class="col-sm-6">
					<input v-model="personal.password" maxlength="100" type="password" required="required" class="form-control margin-bottom-10" placeholder="Password"  />
				</div>

				<div class="col-sm-6">
					<input v-model="personal.password_confirm" maxlength="100" type="password" required="required" class="form-control margin-bottom-10" placeholder="Confirm password"  />
				</div>
			</div>
		</div>

		<h3 class="margin-bottom-20">Step 2 - Select Products</h3>

		<div class="form-group">
			<label class="control-label">Subscriptions</label>

			<div class="row">
				<div class="col-sm-12">
					<div class="panel panel-default">
						<div class="panel-body">
							<p v-for="subscription in selected_subscriptions">{{ subscription.title }} ({{ subscription.charge | currency }}/day) <span class="label label-warning">{{ subscription.qty }} day(s)</span> <b>({{ subscription.start | date }} - {{ subscription.end | date }})</b><button class="btn btn-danger btn-xs pull-right" type="button" @click="removeSubscriptionFromQuote(subscription.id)"><i class="fa fa-trash"></i></button></p>

							<button type="button" class="btn btn-default" data-toggle="modal" data-target="#addSubscriptionModal" aria-haspopup="true" aria-expanded="false"><i class="fa fa-plus"></i> Add subscription</span></button>
						</div>
					</div>
				</div>
			</div>

			<!-- Subscription Modal -->
			<div id="addSubscriptionModal" class="modal fade" role="dialog">
				<div class="modal-dialog">
					<div class="modal-content">
						<div class="modal-header">
							<button type="button" class="close" data-dismiss="modal">&times;</button>
							<h4 class="modal-title">Add subscription to your quote</h4>
						</div>
						<div class="modal-body">
							<label class="control-label">Select subscription:</label>

							<div class="row margin-bottom-10">
								<div class="col-sm-12">
									<select v-model="selected_subscription" style="padding:5px;width:100%;">
										<option v-for="subscription in subscriptions" :value="subscription.id">
											{{ subscription.title }} ({{ subscription.charge_per_day | currency }}/day)
										</option>
									</select>
								</div>
							</div>

							<label class="control-label">Select subscription dates:</label>

							<div class="input-group" style="width: 70px;">
								<div class="input-daterange input-group" id="datepicker">
								    <input @blur="updateDateObjects()" id="subs_start_date" type="text" class="input-sm form-control" name="start" style="width:100px; font-size: 15px;" />
								    <span class="input-group-addon">to</span>
								    <input @blur="updateDateObjects()" id="subs_end_date" type="text" class="input-sm form-control" name="end" style="width:100px; font-size: 15px;" />
								</div>
								<p v-show="selected_subscription_workday_count > 0">{{ selected_subscription_workday_count }} business days</p>
							</div>

						</div>
						<div class="modal-footer">
							<button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
							<button type="button" class="btn btn-success" @click="addSubscriptionToQuote()">Add subscription</button>
						</div>
					</div>
				</div>
			</div>

			<label class="control-label">Services</label>

			<div class="row">
				<div class="col-sm-12">
					<div class="panel panel-default">
						<div class="panel-body">
							<p v-for="service in selected_services">{{ service.title }} ({{ service.charge | currency }}/hour) <span class="label label-warning">{{ service.qty }} hour(s)</span> <b>({{ service_available_workdays[service.day] }} {{ service_available_hours[service.hour] }})</b><button class="btn btn-danger btn-xs pull-right" type="button" @click="removeServiceFromQuote(service.id)"><i class="fa fa-trash"></i></button></p>

							<button type="button" class="btn btn-default" data-toggle="modal" data-target="#addServiceModal" aria-haspopup="true" aria-expanded="false"><i class="fa fa-plus"></i> Add service</span></button>
						</div>
					</div>
				</div>
			</div>

			<!-- Service Modal -->
			<div id="addServiceModal" class="modal fade" role="dialog">
				<div class="modal-dialog">
					<div class="modal-content">
						<div class="modal-header">
							<button type="button" class="close" data-dismiss="modal">&times;</button>
							<h4 class="modal-title">Add service to your quote</h4>
						</div>
						<div class="modal-body">
							<label class="control-label">Select service:</label>

							<div class="row margin-bottom-10">
								<div class="col-sm-12">
									<select v-model="selected_service" style="padding:5px;width:100%;">
										<option v-for="service in services" :value="service.id">
											{{ service.title }} ({{ service.charge_per_hour | currency }}/hour)
										</option>
									</select>
								</div>
							</div>

							<label class="control-label">Select day of week:</label>

							<div class="input-group margin-bottom-10">
								<select v-model="service_select_weekday" style="padding:5px;width: 120px;">
									<option v-for="(day, index) in service_available_workdays" :value="index">
										{{ day }}
									</option>
								</select>

								<select v-model="service_select_hour" style="padding:5px;margin-left:10px;width: 120px;">
									<option v-for="(hour, index) in service_available_hours" :value="index">
										{{ hour }}
									</option>
								</select>
							</div>

							<label class="control-label">How many weeks?</label>

							<div class="input-group" style="width: 70px;">
								<input type="text" name="service_qty" class="form-control input-number" style="text-align: center;" v-model="selected_service_qty" min="1" max="1000">
							</div>

						</div>
						<div class="modal-footer">
							<button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
							<button type="button" class="btn btn-success" @click="addServiceToQuote()">Add service</button>
						</div>
					</div>
				</div>
			</div>

			<label class="control-label">Goods</label>

			<div class="row">
				<div class="col-sm-12">
					<div class="panel panel-default">
						<div class="panel-body">
							<p v-for="good in selected_goods">{{ good.title }} ({{ good.charge | currency }}/unit) <span class="label label-warning">{{ good.qty }} unit(s)</span><button class="btn btn-danger btn-xs pull-right" type="button" @click="removeGoodFromQuote(good.id)"><i class="fa fa-trash"></i></button></p>

							<button type="button" class="btn btn-default" data-toggle="modal" data-target="#addGoodModal" aria-haspopup="true" aria-expanded="false"><i class="fa fa-plus"></i> Add good</span></button>
						</div>
					</div>
				</div>
			</div>

			<!-- Good Modal -->
			<div id="addGoodModal" class="modal fade" role="dialog">
				<div class="modal-dialog">
					<div class="modal-content">
						<div class="modal-header">
							<button type="button" class="close" data-dismiss="modal">&times;</button>
							<h4 class="modal-title">Add good to your quote</h4>
						</div>
						<div class="modal-body">
							<label class="control-label">Select good:</label>

							<div class="row margin-bottom-10">
								<div class="col-sm-12">
									<select v-model="selected_good" style="padding:5px;width:100%;">
										<option v-for="good in goods" :value="good.id">
											{{ good.title }} ({{ good.charge_per_unit | currency }}/unit)
										</option>
									</select>
								</div>
							</div>

							<label class="control-label">Select quantity:</label>

							<div class="input-group" style="width: 70px;">
								<input type="text" name="good_qty" class="form-control input-number" style="text-align: center;" v-model="selected_good_qty" min="1" max="1000">
							</div>

						</div>
						<div class="modal-footer">
							<button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
							<button type="button" class="btn btn-success" @click="addGoodToQuote()">Add good</button>
						</div>
					</div>
				</div>
			</div>	
		</div>

		<h3 class="margin-bottom-20">Step 3 - Confirm</h3>

		<div class="form-group">
			<label class="control-label">Total amount</label>

			<div class="row">
				<div class="col-sm-12">
					<h2 class="no-top-margin">{{ total_amount }}</h2>
				</div>
			</div>
		</div>

		<button @click="submitQuote" class="btn btn-danger btn-lg pull-right" type="button">Confirm</button>

		<br>
		<br>
		<br>
		<br>
		<br>
		<br>
	</div>
</div>