EquiniTasks
=================

Installation
------------------
EquiniTasks is the result of a 3 hour coding challenge to build a simple LAMP stack to-do app. The work carried out during the 3 hour timeframe was committed to ```eqdata-3hr-test``` branch and then merged to ```master``` at the end of the 3 hours. Any subsequent modifications were added to a separate branch, if you would like to see them.

I attempted to commit often and in a way that made it clear in which order I attempted to build the application.

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


Project Reflection:
---------------
* Why was the taken approach chosen?
..* The honest answer to this is that, given the time constraint, I chose to use patterns that are familiar to me. As I have recently been building Angular front-ends on top of Laravel APIs, this was the approach that I felt gave me the best chance of a good result.
..* Angular's data binding and the SPA approach should produce a responsive UI that improves the user experience by enabling the addition/completion of tasks and the changing of views without page reloads.
..* Using a front-end framework such as Angular, allied to a RESTful JSON API should allow the front-end to be loosely coupled to the back-end. Assuming correct design of the service layer of the Angular app, the back-end could be swapped with minimal changes to the front-end.

* What are the disadvantages of this approach and advantages of another?
..* An Angular front-end could be considered overkill for such a simple application. SPAs increase code complexity and initial page load times.
..* Server-side page rendering and progressive enhancement with AJAX could reproduce the responsiveness of the UI with less code complexity and arguably more reliability as you are less reliant on client-side JavaScript.

* What would I have done differently given more time?
..* I would have investigated the use of Laravel for the full-stack, with progressive enhancement/AJAX. I have used AJAX with Rails, but it's not something I have done yet with Laravel.
..* I would have made sure I was familiar with the PHPUnit API. I wasted too much time reading the documentation and then resorting to testing my API with Postman.

* What would be my course of action to improve the application in an iterative manner?
..* Firstly I would refactor my current code and finish the unfinished parts!
..* I would write (and use!) a proper test suite to cover the current functionality and ensure what I have so far meets the specifications.
..* I would revisit the specification to check for missing functionality and write appropriate tests.
..* Implement the code for the missing functionality.
..* Look/implement additional functionality that would significantly improve the app (e.g. proper authentication)
