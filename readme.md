EquiniTasks
=================

Installation
------------------
EquiniTasks is the result of a 3 hour coding challenge to build a simple LAMP stack to-do app. The work carried out during the 3 hour timeframe was committed to ```eqdata-3hr-test```.

I attempted to commit often and in a way that made it clear in which order I attempted to build the application.

Subsequent work was added to separate branches ```after-hours``` (for general finishing-off) and ```jwt-auth``` (for improved user authentication), which were merged to master.

EquiniTasks was developed with the Laravel/Homestead environment. Assuming you have access to a Homestead environment, clone this repo into your Homestead mapped folder and add the following to your ```~/.homestead/Homestead.yaml file:```

```ruby
sites:
    - map: eqtasks.local
      to: /home/vagrant/Code/EqTasks/public

databases:
  - eqtasks_db      
```

Then map the IP address in your /etc/hosts file, like so:

```
192.168.10.10   eqtasks.local
```

Then it should be a case of navigating to your Homestead directory and running:

```
vagrant up --provision
```

Once the Vagrant box has finished provisioning, run:

```
vagrant ssh
cd /your/vagrant/box/structure/EqTasks
php artisan migrate
php artisan db:seed
```

I've added the .env file to this repo, so you should now have everything you need. Navigate to:

```
http://eqtasks.local
```


Project Dependencies:
---------------
- [Laravel](https://laravel.com/)
- [AngularJS](https://angularjs.org/) (via CDN)
- [Bootstrap](https://getbootstrap.com/) (via CDN)
- [UI-Router](https://ui-router.github.io/) (via CDN)


Summary of Approach:
---------------
1. Consult specification for features & technical requirements.

2. Create the required migrations, models and relationships (only User and Task).

3. Add the routes, minimal DB seeds and PHPUnit tests.
    * I lost a lot of time here due to unfamiliarity with the PHPUnit API - I was trying to use the deprecated ```seeJson``` syntax, rather than the current ```assertJson``` syntax. Serves me right for neglecting TDD recently!

4. Stub basic CRUD controllers for Users and Tasks (committed from my Vagrant box - hence different contributor listed).

5. Add crud actions to controllers. Further attempts to test API with PHPUnit, but had to move on and test manually with Postman.

6. Set-up Angular and front-end dependencies. Add basic landing page and associated controller.

7. Add task view and and associated controller. Add TasksService service to handle Task related communication between API and Angular.
    * I also lost time at this stage due to encountering an issue whereby Angular checkboxes are compatible only with boolean true/false values and not with integer 0/1 values stored in MySQL. This was subsequently solved by the addition of the UI-Bootstrap library. On reflection, this was an avoidable consequence of my decision to increase complexity (and therefore risk) by using a full front-end framework, despite the time constraint.


Project Reflection:
---------------
* Why was the taken approach chosen?
  * The honest answer is that, given the time constraint, I chose to use technologies/patterns that are familiar to me. As I have recently been building Angular front-ends on top of Laravel APIs, this was the approach that I felt gave me the best chance of a good result.
  * Angular's data binding and the SPA approach should produce a responsive UI that improves the user experience by enabling the addition/completion of tasks and the changing of views without page reloads.
  * Using a front-end framework such as Angular, allied to a RESTful JSON API should allow the front-end to be loosely coupled to the back-end. Assuming correct design of the service layer of the Angular app, the back-end could be swapped with minimal changes to the front-end.

* What are the disadvantages of this approach and advantages of another?
  * An Angular front-end could be considered overkill for such a simple application. SPAs increase code complexity and initial page load times.
  * Server-side page rendering and progressive enhancement with AJAX could reproduce the responsiveness of the UI with less code complexity and arguably more reliability, due to less reliance on client-side JavaScript.

* What would I have done differently given more time?
  * I would have investigated the use of Laravel for the full-stack, with progressive enhancement/AJAX. I have used AJAX with Rails, but it's not something I have done yet with Laravel.
  * I would have made sure I was familiar with the PHPUnit API. I wasted too much time reading the documentation and then resorting to testing my API with Postman.

* What would be my course of action to improve the application in an iterative manner?
  * Firstly I would refactor my current code and finish the unfinished parts!
  * I would write (and use!) a proper test suite to cover the current functionality and ensure what I have so far meets the specifications.
  * I would revisit the specification to check for missing functionality and write appropriate tests.
  * Implement the code for the missing functionality.
  * Look/implement additional functionality that would significantly improve the app (e.g. proper authentication)

  **I have implemented these iterative improvements (minus front-end tests) and they can be found in the** ```master``` **branch.**
