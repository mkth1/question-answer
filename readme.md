## To run this project
* Clone it from github.
* Composer install
* Change the links to db in app/config/database.php file.
* php artisan migrate.
* php artisan serve.

### Demo
[Heroku Demo Url](http://question-answers.herokuapp.com/)

### Short description of the project
This project was developed when i was trying to find a solution for my question but there was no avilable forum in the university to post my question. This is just a protoype which can be extended to real web service. This service has been done with **[laravel php framework](http://laravel.com/), [postgresql](http://www.postgresql.org/) and [bootstrap 3](http://getbootstrap.com/)**. The website has been hosted on [heroku](http://question-answers.herokuapp.com/) and code is maintained in github.

A registered user is able to post and answer the question. A logged in user can also mark the question as solved as well as edit the question. An unregistered user can search for questions, and see the list of unsolved questions. The search results, questions are paginated with 8 record per page.

#### Workflow
* As a new user , u can register.
	* Login to website.
	* Post a new question.
	* Edit a old question.
	* Answer the question.

* As an unregistred user.
	* Search a question
	* View unanswered questions

