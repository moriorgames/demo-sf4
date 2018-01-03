Demo Symfony 4
==============

This repository shows some use cases to work with Symfony 4 Framework.
The aim is to test the new version of SF4, and try components and concepts for I+D purposes.

As a single developer I'm not an expert about this topic, my goal is to share this project with the community and be able to improve the repository.

Do not hesitate to email me at *moriorgames@gmail.com* if there is any issue with the project or open a Pull Request. 

## Installation

Follow this steps to install and have the Symfony up and running:

* Clone repository
```
$ git clone https://github.com/moriorgames/demo-sf4.git
```

* Navigate to project folder
```
$ cd demo-sf4
```

* Install dependencies with Composer
```
$ php phars/composer.phar install
```

* Create database with Doctrine
```
$ php bin/console doctrine:database:create
```

* Create Schema database with Doctrine
```
$ php bin/console doctrine:schema:update --force
```

* Load Fixtures
```
$ php bin/console doctrine:fixtures:load -n
```

## (Optional) Development with mysql in docker Container

* To drop and rebuild fixtures
```
$ php doctrine:schema:drop --force
$ php doctrine:schema:update --force
$ php doctrine:fixtures:load -n
```

* To create the docker image of mysql
``` 
$ docker run -d --name mysql -p 3306:3306 -e MYSQL_ROOT_PASSWORD=db-pass -v /Users/Shared/data:/var/lib/mysql mysql
```
