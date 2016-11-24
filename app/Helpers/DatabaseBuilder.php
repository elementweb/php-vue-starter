<?php

namespace App\Helpers;

use Illuminate\Database\Capsule\Manager as Capsule;
use Illuminate\Database\Schema\Blueprint;
use App\Models\User;
use App\Models\Subscription;
use App\Models\Service;
use App\Models\Good;
use Faker\Factory as Faker;

class DatabaseBuilder extends Helper
{

	/**
	 * USERS
	 */

	public static function buildUsers()
	{
		Capsule::schema()->create('users', function (Blueprint $table) {
		    $table->increments('id');
		    $table->string('first_name', 50)->nullable();
		    $table->string('last_name', 50)->nullable();
	        $table->string('email', 100);
		    $table->string('phone', 25);
		    $table->string('password', 100);
		    $table->timestamps();
		});
	}

	public static function destroyUsers()
	{
		Capsule::schema()->dropIfExists('users');
	}

	/**
	 * QUOTES
	 */

	public static function buildQuotes()
	{
	    Capsule::schema()->create('quotes', function (Blueprint $table) {
	        $table->increments('id');
	        $table->string('hash');
	        $table->integer('user_id');
	        $table->float('charge_total');
	        $table->timestamps();

	        $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
	    });
	}

	public static function destroyQuotes()
	{
		Capsule::schema()->dropIfExists('quotes');
	}

	/**
	 * PRODUCTS
	 */
	
	public static function buildProducts()
	{
		Capsule::schema()->create('subscriptions', function (Blueprint $table) {
	        $table->increments('id');
	        $table->string('title');
	        $table->string('description');
	        $table->float('charge_per_day');
	        $table->timestamps();
		});

	    Capsule::schema()->create('services', function (Blueprint $table) {
	        $table->increments('id');
	        $table->string('title');
	        $table->string('description');
	        $table->float('charge_per_hour');
	        $table->timestamps();
	    });

	    Capsule::schema()->create('goods', function (Blueprint $table) {
	        $table->increments('id');
	        $table->string('title');
	        $table->string('description');
	        $table->float('charge_per_unit');
	        $table->integer('stock');
	        $table->timestamps();
	    });
	}

	public static function populateProducts()
	{
	    $faker = Faker::create();

	    $number_of_subscriptions = rand(5, 15);
	    $number_of_services = rand(5, 15);
	    $number_of_goods = rand(5, 15);

	    for($i=0; $i<$number_of_subscriptions; $i++)
	    {
	        $subscription = new Subscription();
	        
	        $subscription->title = $title = $faker->catchPhrase();
	        $subscription->description = $title . ' description';
	        $subscription->charge_per_day = $faker->randomFloat(2, 20.00, 150.00);

	        $subscription->save();
	    }

	    for($i=0; $i<$number_of_services; $i++)
	    {
	        $service = new Service();

	        $service->title = $title = $faker->catchPhrase();
	        $service->description = $title . ' description';
	        $service->charge_per_hour = $faker->randomFloat(2, 20.00, 150.00);

	        $service->save();
	    }

	    for($i=0; $i<$number_of_goods; $i++)
	    {
	        $good = new Good();

	        $good->title = $title = $faker->catchPhrase();
	        $good->description = $title . ' description';
	        $good->charge_per_unit = $faker->randomFloat(2, 20.00, 150.00);
	        $good->stock = $faker->numberBetween(20, 150);

	        $good->save();
	    }
	}

	public static function destroyProducts()
	{
	    Capsule::schema()->dropIfExists('subscriptions');

	    Capsule::schema()->dropIfExists('services');
		
	    Capsule::schema()->dropIfExists('goods');
	}

	/**
	 * QUOTE PRODUCTS
	 */

	public static function buildQuoteProducts()
	{
	    Capsule::schema()->create('quote_subscriptions', function (Blueprint $table) {
	        $table->increments('id');
	        $table->integer('quote_id');
	        $table->integer('subscription_id');
	        $table->integer('days');
	        $table->float('charge_per_day');
	        $table->float('subtotal');
	        $table->string('start');
	        $table->string('end');
	        $table->timestamps();

	        $table->foreign('quote_id')->references('id')->on('quotes')->onDelete('cascade');
	        $table->foreign('subscription_id')->references('id')->on('subscriptions');
	    });

	    Capsule::schema()->create('quote_services', function (Blueprint $table) {
	        $table->increments('id');
	        $table->integer('quote_id');
	        $table->integer('service_id');
	        $table->integer('hours');
	        $table->float('charge_per_hour');
	        $table->float('subtotal');
	        $table->integer('day');
	        $table->integer('hour');
	        $table->timestamps();

	        $table->foreign('quote_id')->references('id')->on('quotes')->onDelete('cascade');
	        $table->foreign('service_id')->references('id')->on('services');
	    });

	    Capsule::schema()->create('quote_goods', function (Blueprint $table) {
	        $table->increments('id');
	        $table->integer('quote_id');
	        $table->integer('good_id');
	        $table->float('quantity');
	        $table->float('charge_per_unit');
	        $table->float('subtotal');
	        $table->timestamps();

	        $table->foreign('quote_id')->references('id')->on('quotes')->onDelete('cascade');
	        $table->foreign('good_id')->references('id')->on('goods');
	    });
	}

	public static function destroyQuoteProducts()
    {
        Capsule::schema()->dropIfExists('quote_subscriptions');

        Capsule::schema()->dropIfExists('quote_services');
		
        Capsule::schema()->dropIfExists('quote_goods');
	}

}
