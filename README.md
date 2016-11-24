# phptest

PHP Backend test application

# set-up

1. Set 'public' folder as domain root so that it is accessed as like as follows: http://test.local/
2. Configure database host, user, password and database name in 'config/database.php'
3. Run command to build the database by visiting URL '/database/build'. To recreate the database, first destroy it using '/database/destroy' and then recreate it again using '/database/build'.
4. Application is ready to go.

# components used

Back-end:

1. AltoRouter (https://github.com/dannyvankooten/AltoRouter) for routing HTTP requests
2. Illuminate/Database (https://github.com/illuminate/database) for easier database handling
3. Fake library (https://github.com/fzaninotto/Faker) for generating fake data (Subscriptions, Services, Goods)
4. Validation library (https://github.com/Respect/Validation) for Back-end validation
5. Openwall PHPass library (https://github.com/hautelook/phpass) for generating user passwords

Front-end:

1. Bootstrap v3.3.7
2. Bootstrap Date Picker (http://bootstrap-datepicker.readthedocs.io/en/latest/index.html)
3. Vue.js, Vue-resource component

# comments:

This is PHP Back-end test written for BuildEmpire Ltd to support my application

It took me around ~8 hours to complete the Back-end side and around another ~8 hours to complete the Front-end.

- Kostas Gliozeris