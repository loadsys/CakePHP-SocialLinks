# CakePHP-SocialLinks

[![Software License](https://img.shields.io/badge/license-MIT-brightgreen.svg?style=flat-square)](LICENSE.md)
<!--
[![Build Status](https://travis-ci.org/loadsys/CakePHP-SocialLinks.svg?branch=master&style=flat-square)](https://travis-ci.org/loadsys/CakePHP-SocialLinks)
[![Total Downloads](https://img.shields.io/packagist/dt/loadsys/cakephp_sociallinks.svg?style=flat-square)](https://packagist.org/packages/loadsys/cakephp_sociallinks)
-->

Add fields to a model for storing Social Links, eg. Blog, Facebook, Twitter, etc.

## Background

Currently has a behavior to add the fields along with validation to the model

## Requirements ##

* PHP 5.3+
* CakePHP 2.1+

##Installation##

### Composer ###

Ensure `require` is present in `composer.json`. This will install the plugin into `Plugin/SocialLinks`:

````bash
{
	"require": {
		"loadsys/cakephp_sociallinks": "dev-master",
	}
}
````

### GIT Submodule ###

In your app directory type:

````bash
git submodule add git://github.com/loadsys/CakePHP-SocialLinks.git Plugin/SocialLinks
git submodule init
git submodule update
````

### GIT Clone ###

In your Plugin directory type:

````bash
git clone git://github.com/loadsys/CakePHP-SocialLinks.git SocialLinks
````

## Usage ##

* Add The Plugin to your application by adding this line to your bootstrap.php

````php
CakePlugin::load('SocialLinks');
````

* Add Behavior to the Model, each parameter is the database field name, or FALSE to not include that field

````php
public $actsAs = array(
	'SocialLinks.SocialLinks' => array(
		'blog' => 'blog', //blog field name in the database, or FALSE if you don't have this field
		'pinterest' => FALSE, //pinterest field name in the database, or FALSE if you don't have this field
		'googleplus' => 'googleplus', //googleplus field name in the database, or FALSE if you don't have this field
		'youtube' => 'youtube', //youtube field name in the database, or FALSE if you don't have this field
		'linkedin' => 'linkedin', //linkedin field name in the database, or FALSE if you don't have this field
		'facebook' => 'facebook', //facebook field name in the database, or FALSE if you don't have this field
		'twitter' => 'twitter', //twitter field name in the database, or FALSE if you don't have this field
	),
);
````

## Contributing

* Fork the plugin to your Github account
* Checkout the plugin
* Create a new branch with your changes
* Issue a PR back to the master branch with your changes

##License

Copyright (c) 2013 Loadsys Web Strategies
