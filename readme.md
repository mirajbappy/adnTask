<h1>Adn Digital Task</h1>

<h3>Steps to run</h3>
<ul>
<li>First download project from git</li>
<li>Create a database named 'adn_task' with characterset utf8-unicod-ci</li>
<li>Migrate the file with command (php artisan make migrate)</li>
<li>Create seeder files (php artisan db:seed)</li>
<li>Now login with system admin user (id: systemadmin@gmail.com, pass: 123456)</li>
<li>Create Admin users from System Admin Access Area</li>
<li>Create Manager users from Admin Access Area</li>
<li>Register new customer and login with same login url</li>
</ul>

<h1>Important Changes</h1>
<ul>
<li>Created 2 migration tables at database/migrations [admins,customers]</li>
<li>Created a new seeder file for systemadmin at database/seeders.</li>
<li>Created four new guard on config/auth.php [systemadmin,admin,manager,customer]</li>
<li>Changed the default login function at app/http/controllers/auth/loginController.php</li>
<li>Changed Default register function at app/http/controllers/auth/registercontroller.php</li>
<li>Created four new controller [SystemAdminController, AdminController, ManagerController, CustomerController]</li>
<li>Created four middleware [systemadmin,admin,manager,customer]</li>
<li>Created new blade files for [systemadmin,admin,manager,customer]</li>
<li>Defined middleware for different routes</li>
</ul>

********** End*********
