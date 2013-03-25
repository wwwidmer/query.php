/*
* Movements prototype 
* query.php query.html
* v 1.0 3/25/2013 
* Authors: William Widmer (coding) &
* The movements.org team: ()
* Website templates by ()
*/


Website application designed to break down user input and find associated case studies and how to guides,
among other things, hosted on the Movements.org website. 

query.html
sets a number of tags to be associated with a particular user. The user can be one of several archetypes and
their choice determines the topics that are recommended. User can select up to three topics to search for.
Unrecommended topics can also be selected. Output is determined by the user and his topics in combination.

query.php
directed to after query.html. Queries a database running MySQL by using php PDO for selected tags and topics and 
returns particular articles sorted by topic and type. Returns text and links along with descriptions of each
link's content. PDO used to help prevent SQL injection.


Selections are responsive. Run time requires testing. Optimization in progress. Under version 1.0 not run on 
actual server but using EasyPHP along with PHPMyAdmin for simulated server / database relations.
Database method chosen instead of searching the website for each query to emphasize less computing clientside
and require more computing server side.

1.0 - Code runs cleanly,formatting and integrating onto Movements.org
.7 - Code runs, doesn't format data

