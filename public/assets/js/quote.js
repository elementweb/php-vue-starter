Vue.filter('date', function (date) {
	return moment(date).format('DD/MM/YYYY');
});

Vue.filter('currency', function (value) {
	return '€' + value.toFixed(2);
});

const quote = new Vue({
	el: '#quote-view',

	data() {
		return {
			personal: {
				first_name: '',
				last_name: '',
				email: '',
				email_confirm: '',
				phone: '',
				password: '',
				password_confirm: ''
			},

			// subscriptions
			subscriptions: [],
			selected_subscriptions: [],
			selected_subscription: '',
			selected_subscription_qty: 1,
			selected_subscription_workday_count: 0,
			selected_subscription_start_date: '',
			selected_subscription_end_date: '',

			// services
			services: [],
			selected_services: [],
			selected_service: '',
			service_available_workdays: [],
			service_available_hours: [],
			selected_service_qty: 1,
			service_select_weekday: 1,
			service_select_hour: 9,

			// goods
			goods: [],
			selected_goods: [],
			selected_good: '',
			selected_good_qty: 1,

			response: []
		};
	},

	methods: {
		submitQuote() {
			if(this.validateQuote()){
				var data = {
					personal: this.personal,
					products: {
						subscriptions: this.selected_subscriptions,
						services: this.selected_services,
						goods: this.selected_goods
					}
				};

				this.$http.post('/api/quote/submit', data, {
					headers: {
						'Content-Type': 'multipart/form-data'
					}
				}).then((response) => {
					this.response = response.body;

					if(response.body.status == "OK"){
						window.location.href = '/quote-' + this.response.quote_hash;
					} else {
						alert(this.response.error_msg);
					}
				});
			}
		},

		validateQuote() {
			if(this.personal.first_name.length == 0){
				alert('please enter first name');
				return false;
			}

			if(this.personal.last_name.length == 0){
				alert('please enter last name');
				return false;
			}

			if(this.personal.email.length == 0){
				alert('please enter your email');
				return false;
			}

			if(!validateEmail(this.personal.email)){
				alert('please enter valid email address');
				return false;
			}

			if(this.personal.email_confirm.length == 0 || this.personal.email_confirm != this.personal.email){
				alert('emails do not match');
				return false;
			}

			if(this.personal.password.length == 0){
				alert('please enter your password');
				return false;
			}

			if(this.personal.password_confirm.length == 0 || this.personal.password_confirm != this.personal.password){
				alert('passwords do not match');
				return false;
			}

			if(this.total_amount_unformatted == 0){
				alert('please select at least one product');
				return false;
			}

			return true;
		},

		addSubscriptionToQuote() {
			if(this.selected_subscription.length <= 0){
				alert('please select subscription!');
				return;
			}

			if(this.selected_subscription_start_date <= 0 || this.selected_subscription_end_date <= 0){
				alert('please select dates!');
				return;
			}

			var subscription = findById(this.subscriptions, this.selected_subscription);

			this.selected_subscriptions.push({
				id: this.selected_subscription,
				title: subscription.title,
				charge: subscription.charge_per_day,
				qty: this.selected_subscription_workday_count,
				start: this.selected_subscription_start_date,
				end: this.selected_subscription_end_date
			});
			
			$('#addSubscriptionModal').modal('toggle');
		},

		removeSubscriptionFromQuote(id) {
			this.selected_subscriptions = this.selected_subscriptions.filter(function(e) {
			    return e.id !== id;
			});
		},

		updateDateObjects() {
			this.selected_subscription_start_date = $('#subs_start_date').datepicker('getDate');
			this.selected_subscription_end_date = $('#subs_end_date').datepicker('getDate');
			this.selected_subscription_workday_count = workingDaysBetweenDates(
				this.selected_subscription_start_date,
				this.selected_subscription_end_date
			);
		},

		addServiceToQuote() {
			if(this.selected_service.length <= 0){
				alert('please select service!');
				return;
			}

			var qty = this.selected_service_qty*1;

			if (!(Number(qty) === qty && qty % 1 === 0 && qty > 0)){
				alert('quantity must be an integer!');
				return;
			}

			var service = findById(this.services, this.selected_service);

			this.selected_services.push({
				id: this.selected_service,
				title: service.title,
				charge: service.charge_per_hour,
				qty: qty,
				day: this.service_select_weekday,
				hour: this.service_select_hour
			});

			$('#addServiceModal').modal('toggle');
		},

		removeServiceFromQuote(id) {
			this.selected_services = this.selected_services.filter(function(e) {
			    return e.id !== id;
			});
		},

		addGoodToQuote() {
			if(this.selected_good.length <= 0){
				alert('please select item!');
				return;
			}

			var qty = this.selected_good_qty*1;

			if (!(Number(qty) === qty && qty % 1 === 0 && qty > 0)){
				alert('quantity must be an integer!');
				return;
			}

			var good = findById(this.goods, this.selected_good);

			if(exists(this.selected_goods, this.selected_good)){
				var current_qty = findById(this.selected_goods, this.selected_good).qty;

				for (var i in this.selected_goods) {
					if (this.selected_goods[i].id == this.selected_good) {
						this.selected_goods[i].qty = current_qty + qty;
						break;
					}
				}
			} else {
				this.selected_goods.push({
					id: this.selected_good,
					title: good.title,
					charge: good.charge_per_unit,
					qty: qty
				});
			}

			$('#addGoodModal').modal('toggle');
		},

		removeGoodFromQuote(id) {
			this.selected_goods = this.selected_goods.filter(function(e) {
			    return e.id !== id;
			});
		},

		fetchProductsList() {
			this.$http.get('api/products/subscriptions').then((response) => {
				this.subscriptions = response.body;
			});

			this.$http.get('api/products/services').then((response) => {
				this.services = response.body;
			});

			this.$http.get('api/products/services/workdays').then((response) => {
				this.service_available_workdays = response.body;
			});

			this.$http.get('api/products/services/hours').then((response) => {
				this.service_available_hours = response.body;
			});

			this.$http.get('api/products/goods').then((response) => {
				this.goods = response.body;
			});
		}
	},

	created() {
		this.fetchProductsList();
	},

	computed: {
		total_amount_unformatted: function () {
			return sumQuote(this.selected_goods, 'charge')
				+sumQuote(this.selected_subscriptions, 'charge')
				+sumQuote(this.selected_services, 'charge');
		},

		total_amount: function () {
			return '€' + this.total_amount_unformatted.toFixed(2);
		}
	}
})
