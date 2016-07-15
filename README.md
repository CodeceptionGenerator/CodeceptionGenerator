# CodeceptionGenerator
This project provide a test code generator for [Codeception](https://github.com/Codeception/Codeception).  
Codeception is a modern full-stack testing framework for PHP.

## Requirement
PHP >=5.4.0

## Installation
1. Install [Selenium IDE add-on](https://addons.mozilla.org/ja/firefox/addon/selenium-ide/) in Firefox.  
1. Download [CodeceptionGenerator](https://github.com/madoka8/CodeceptionGenerator/archive/master.zip) and unzip.  
   If you like git:
~~~
$ git clone https://github.com/CodeceptionGenerator/CodeceptionGenerator.git
~~~



## Folder Structure

~~~
CodeceptionGenerator/
├── Helper/                     ... helper methods
├── Lib/                        ... libraries
│   ├── File/                   ... file classes
│   └── Generator/              ... test code generator classes
├── input/                      ... put your selenium html files
├── output/                     ... test codes will be output here
└── generate.php                ... an execution file
~~~

## How to Generate Test Codes 

If you successfully installed CodeceptionGenerator, follow the steps below.

1. Use [Selenium IDE add-on](https://addons.mozilla.org/ja/firefox/addon/selenium-ide/) and generate a html file.  
1. Put the html file in ```input``` directory.  
1. Execute the following command.  
~~~
$ cd CodeceptionGenerator/
$ php generate.php
~~~
Confirm ```output``` directory. There is an acceptance test class of Codeception.  

## License
MIT
