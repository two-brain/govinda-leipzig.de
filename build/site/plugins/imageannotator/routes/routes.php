<?php
$router = new Router(array(
	array(
		'pattern' => '(:all)/imageannotator/update-coordinates',
		'method'  => 'POST',
		'filter'  => 'auth',
		'action'  => function() {

			/* Get variables from AJAX */
			$uid = $_POST['uid'];
			$fieldname = $_POST['fieldname'];
			$filename = $_POST['filename'];
			$type = $_POST['type'];
		    $id = $_POST['id'];
		    $x = $_POST['x'];
		    $y = $_POST['y'];

		    $page = site()->index()->findBy('uid', $uid);

		    if ($type == 'filepage') {
		    	$page = $page->files()->get($filename);
		    }
		    
		    $field = $page->$fieldname()->yaml();

		    $markerids = array_column($field, 'markerid');
		    $key = array_search($id, $markerids);

		    $field[$key]['x'] = $x;
		    $field[$key]['y'] = $y;

		    $field = yaml::encode($field);

		    try {
		        $page->update(array($fieldname => $field));
		        return true;
		    } catch(Exception $e) {
		        return $e->getMessage();
		    }
        }
	),
));

$route = $router->run(kirby()->path());
if(is_null($route)) return;
$response = call($route->action(), $route->arguments());
exit;