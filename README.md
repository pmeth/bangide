Bang IDE
========

PROJECT OVERVIEW
----------------

I began this project as a tool to help teach PHP & MySQL to students without having them install any software, setup servers, etc.  I soon realized it could be a pretty good replacement for a desktop IDE for those who want to work directly on the server.  There is a lot of work to be done and there are probably several bugs but the current version works and hilites the potential of the project.

This is a work in progress and in fairly rough condition right now.  I am working on making it more user friendly and may shortly launch a website with additional info, demos, etc.

You can reach me on twitter at:
[@mrpmeth](https://twitter.com/mrpmeth)


TO GET STARTED
--------------

1. Download or clone the source and install on a webserver.  You will probably need PHP 5.3+.  Since this project is still experimental and may open some security holes, I recommend only using this on a private development server for now.
2. To setup the database, first create a database called learninglamp, then run the queries in the following folder against your database.
	/install/tables.sql
	Copy
   /includes/db_connect.php.sample
   To
   /includes/db_connect.php
   You can update this file with your MySQL login credentials.  You will want to make sure your database user can create additional databases and grant permissions.
3. Make the /projects folder writeable by your webserver (chmod 777)
4. Run the code and hope for the best.
5. When visiting the site in your browser you will be prompted for a username & password.  The first time you run this, you can go through the registration process to set one up.  It is very basic right now intended for testing/development purposes.
6. When a user registers, the application will create a new project folder for them and copy all the files from project_skeleton.  It will also create a database with a unique username & password and place the login credentials into a db.php file if an empty file exists in your project skeleton with the pattern /exercise{x}/includes/db.php

FUTURE DEVELOPMENT GOALS
------------------------

- get help from other interested parties
- add ability to upload project skeleton templates
- give users ability to install templates on demand
- give users ability to modify the links at the top
- fix layout issues in various browsers
- make a more flexible design that does not crop anything
- ability to work on remote systems via sftp, etc
- version control integration
- inline help documentation
- autocomplete
- syntax hiliting for more languages
- many more things that are too numerous to mention


Thanks,
Peter
