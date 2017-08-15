Notes Api coding test

Curl Command to run on console
Unfortunately, these commands paramters need to be set in each function to test properly.

Example 1:
Inside application/controllers/CurlController.php

The function createNote is generating a sort of a random title and note on a specific user. 
This functionality is not very dynamic but for small testing purposes should be useful.


$ php index.php CurlController createNote //creates note
$ php index.php CurlController getAllNotes //gets all notes
$ php index.php CurlController updateNote //update note 
$ php index.php CurlController deleteNote //delete note
 
*Note* (Please change the url in CurlController class)


All endpoints points to /api/notes
These are rerouted in applcation/config/routes.php

$route['api/notes']['GET'] = 'NotesController/index';
$route['api/notes']['POST'] = 'NotesController/insertNote';
$route['api/notes']['PUT'] = 'NotesController/updateNote';
$route['api/notes']['DELETE'] = 'NotesController/deleteNote';

Each endpoint must have Authorization: Basic Header
This library that validates the request is in application/libraries/ValidRequest.php



