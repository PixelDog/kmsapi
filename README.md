Welcome to the KMS API.
This is a simple API created using an MVC approach.
Using an MVC approach, this API can be set up wih endless endpoints.

-------------------------------------------------------------------
REQUIRED
-------------------------------------------------------------------
PHP ^7.4

-------------------------------------------------------------------
SETUP
-------------------------------------------------------------------
1) Clone the repo to your host.

2) Edit Config/_config.php with the appropriate values for your environment.
   Values are as follows:

   // host

   define('HOST', 'localhost');

   // database user

   define('DBUSER', 'root');

   // database password

   define('DBPW', 'root99');

   // database name

   define('DB', 'db_kms');

3) Note: this needs to be setup as root, it is not configured yet to run in a
   a subdirectory (that's an @todo);


-------------------------------------------------------------------
USAGE:
-------------------------------------------------------------------

Study the sample files in Controllers, Models, and Views.
You as many new endpoints as needed. The Router class
will handle the routing for any new endpoints. Also, have a
look at the queries in the sample models so you can get an
idea of how to use the Database class. The Database class
you do all of your substitutions for binding parameters.
