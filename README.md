# CakePHP-SocialLinks

[![Latest Version](https://img.shields.io/github/release/loadsys/CakePHP-SocialLinks.svg?style=flat-square)](https://github.com/loadsys/CakePHP-SocialLinks/releases)
[![Software License](https://img.shields.io/badge/license-MIT-brightgreen.svg?style=flat-square)](LICENSE.md)
[![Build Status](https://travis-ci.org/loadsys/CakePHP-SocialLinks.svg?branch=master&style=flat-square)](https://travis-ci.org/loadsys/CakePHP-SocialLinks)
<!--
[![Total Downloads](https://img.shields.io/packagist/dt/loadsys/cakephp_sociallinks.svg?style=flat-square)](https://packagist.org/packages/loadsys/cakephp_sociallinks)
-->

Adds fields to a model for saving social links, eg. Blog, Facebook, Twitter, etc.

## Requirements ##

* PHP 5.3+
* CakePHP 2.1+

## Installation

### Composer

````bash
$ composer require loadsys/cakephp_sociallinks:~1.0
````

## Usage ##

* Add SocialLinks to your application by adding this line to your bootstrap.php

````php
CakePlugin::load('SocialLinks');
````

* Add Behavior to the Model, each parameter is the database field name, or `false` to not include that field

````php
public $actsAs = array(
	'SocialLinks.SocialLinks' => array(
		'blog' => 'blog', //blog field name in the database, or false if you don't have this field
		'pinterest' => false, //pinterest field name in the database, or false if you don't have this field
		'googleplus' => 'googleplus', //googleplus field name in the database, or false if you don't have this field
		'youtube' => 'youtube', //youtube field name in the database, or false if you don't have this field
		'linkedin' => 'linkedin', //linkedin field name in the database, or false if you don't have this field
		'facebook' => 'facebook', //facebook field name in the database, or false if you don't have this field
		'twitter' => 'twitter', //twitter field name in the database, or false if you don't have this field
	),
);
````

## Contributing

* Fork the plugin to your Github account
* Checkout the plugin
* Create a new branch with your changes
* Issue a PR back to the master branch with your changes

##License

Copyright (c) 2015 Loadsys Web Strategies
