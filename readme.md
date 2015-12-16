# soma-tech
![CircleCI Badge](https://circleci.com/gh/andela-sachungo/soma-tech.svg?style=shield&circle-token=eab6015ece8c084d689495dcbbf2bd5bd22c50cb)
[![Coverage Status](https://coveralls.io/repos/andela-sachungo/soma-tech/badge.svg?branch=master&service=github)](https://coveralls.io/github/andela-sachungo/soma-tech?branch=master)

Soma-tech is a learning management system that helps people learn various technologies.

**NOTE:** It is highly recommended that you use [Homestead virtual machine](http://laravel.com/docs/5.1/homestead).

##Installation instructions
* Clone the repository `git clone <repository>`
*  Run `composer install`
* Rename `.env.example`  to `.env`
* Run `php artisan key:generate` to generate the *application key*

##Defining the site in Homestead
[Laravel](http://laravel.com/docs/5.1/homestead#connecting-via-ssh) explains how to configure **Homestead**.

In summary:

 1. Identify which folder(s) you want to share with Homestead as
    explained in [Configuring Shared Folders](http://laravel.com/docs/5.1/homestead#configuring-homestead).
 2. Map a domain to a folder on your Homestead environment as explained in [Configuring Nginx Sites](http://laravel.com/docs/5.1/homestead#configuring-homestead).
 3. Then add the domain to your Nginx site to the `hosts` file on your machine, as explained in [The Hosts File](http://laravel.com/docs/5.1/homestead#configuring-homestead).
 4. Run the `vagrant up` command from your Homestead directory.

**NOTE:** When your Homestead environment is provisioned and running, to add an additional Nginx site ; add it on `Homestead.yaml` file and then run `vagrant provision`.
