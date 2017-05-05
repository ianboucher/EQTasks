EquiniTasks
=================

Installation
------------------

EquiniTasks was developed with the Laravel/Homestead environment. Assuming you have access to a Homestead environment, clone this repo into your Homestead mapped folder and add the following to your .homestead/Homestead.yaml file:

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

Then it should case of navigating to your Homestead directory and running:

```
vagrant up --provision
```

I've added the .env file to this repo, so you should have everything you need to navigate to:

```
http://eqtasks.local
```



Project Dependencies:
---------------
- [Laravel](https://laravel.com/)
- [AngularJS](https://angularjs.org/)
- [Bootstrap](https://getbootstrap.com/)
- [UI-Router](https://ui-router.github.io/)
