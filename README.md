# SocialLinks Plugin #

Add fields to a model for storing Social Links, eg. Blog, Facebook, Twitter, etc.

##Background##

Currently has a behavior to add the fields along with validation to the model

## Requirements ##

* PHP 5.3+
* CakePHP 2.1+

##Installation##

_[Manual]_

* Download this: http://github.com/loadsys/CakePHP-SocialLinks/zipball/master
* Unzip that download.
* Copy the resulting folder to app/Plugin
* Rename the folder you just copied to @SocialLinks@

_[GIT Submodule]_

In your app directory type:
<pre><code>git submodule add git://github.com/loadsys/CakePHP-SocialLinks.git Plugin/SocialLinks
git submodule init
git submodule update
</code></pre>

_[GIT Clone]_

In your Plugin directory type
<pre><code>git clone git://github.com/loadsys/CakePHP-SocialLinks.git SocialLinks</code></pre>

## Usage ##

* Add The Plugin to your application by adding this line to your bootstrap.php
<pre><code>CakePlugin::load('SocialLinks');</pre></code>
* Add Behavior to the Model, each parameter is the database field name, or FALSE to not include that field
<pre><code>
public $actsAs = array(
	'SocialLinks.SocialLinks' => array(
		'blog' => 'blog',
		'pinterest' => FALSE,
		'googleplus' => 'googleplus',
		'youtube' => 'youtube',
		'linkedin' => 'linkedin',
		'facebook' => 'facebook',
		'twitter' => 'twitter',
	),
);


## Options ##

* blog : blog field name in the database, or FALSE if you don't have this field
* pinterest : pinterest field name in the database, or FALSE if you don't have this field
* googleplus : googleplus field name in the database, or FALSE if you don't have this field
* youtube : youtube field name in the database, or FALSE if you don't have this field
* linkedin : linkedin field name in the database, or FALSE if you don't have this field
* facebook : facebook field name in the database, or FALSE if you don't have this field
* twitter : twitter field name in the database, or FALSE if you don't have this field

## Todo ##

* Unit Tests