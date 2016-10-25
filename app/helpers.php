<?php

/**
 * Set 
 * 
 * @return 
 */
function get_total_production (Production $production) {
	
	return $production->quantity * $production->model->cavity; 

}

function finished_production (Production $production, $total_by_injection) {
	//Plan Type { 1 => cavidad, 2 => injección }

	$icon_ok = 'glyphicon-ok'; $icon_error = 'glyphicon-remove';

	$type = $production->plan->type; //2

	if ($production->model) {

		$total_by_cavity = $production->quantity * $production->model->cavity;
	} else {

		$total_by_cavity = $production->quantity;
	}

	$plan_total = $production->plan->quantity; //10

	

	switch ($type->id) {
		case 1:
			
			if ($total_by_cavity >= $plan_total) {
				return $icon_ok;
			} else {
				return $icon_error;
			}

			break;
		case 2:
			if ($total_by_injection >= $plan_total) {
				return $icon_ok;
			} else {
				return $icon_error;
			}
			break;
		
		default:
				return '---';
			break;
	}

}

function active_option_nav ($route) {

	$path =  Request::segment(1);

	if ($route == $path) {
		
		return 'in';
	}

}

function set_background_option_nav ($route) {

	$path =  Request::segment(1);

	if ($route == $path) {
		
		return 'set_bg_option_nav';
	}

}

function day_production ($plan, $dates) {

	$class = '';

	$time = date('H:i:s');

	$date = date('Y-m-d');

	for ($i=0; $i < sizeof($dates); $i++) {
     	if ($dates[$i] === $plan->production_date_begin) {

     		if ($time > $plan->production_time_end and $date == $plan->production_date_end) { // 
     			$class = 'alert-success ';
     		}

        	if ($plan->status_plan === 2) {
            	$class = "alert-error";
          	}

        	echo '<td class="'.$class.'">'.$plan->quantity.'</td>';
      }else{
        	echo '<td></td>';
      }  
    }

}

/**
 * Set application locale in routes.php
 * 
 * @return mixed
 */

/*function set_applicaton_locale()
{
	$languages = array('en', 'es');

	$locale = Request::segment(1);

	if (in_array($locale, $languages))
	{
		App::setLocale($locale);

		return $locale;
	}

	return null;
}*/

/**
 * Get locale dropdown options
 * 
 * @return array
 */
/*function get_locale_options()
{
	return array(
		'es'  => 'Spanish',
		'en'  => 'English'
	);
}*/

/**
 * It gets the created_at field in a full date format
 * 
 * @param object
 * @param array
 * @return string
 */

/*function get_post_date($article, $months)
{
	$day  = $article->created_at->format('d');

	$month = $months[$article->created_at->format('m')];

	$time = $article->created_at->format('h:i a');

	return trans('strings.post_date', compact('day', 'month', 'time'));
}*/

/*function twitter_update_image ($src, $x, $y, $w, $h) {

	$targ_w = 460;

	$targ_h = 345;
	
	$jpeg_quality = 86;

	try {
		
		$what = getimagesize($src);

		switch (strtolower($what['mime'])) {
			case 'image/png':
		        $ìmage = imagecreatefrompng($src) or die('error');
		        break;
		    case 'image/jpeg':
		        $ìmage = imagecreatefromjpeg($src) or die('error');
		        break;
		    case 'image/gif':
		        $ìmage = imagecreatefromgif($src) or die('error');
		        break;
		    default: die();
		}

		$name_image = uniqid() . date('YmdHis') .'460x345'.'.jpeg';
		
		$new_image = ImageCreateTrueColor($targ_w, $targ_h);

		$image_path = public_path('uploads/'. $name_image);

		imagecopyresampled($new_image, $ìmage, 0, 0, $x, $y, $targ_w, $targ_h, $w, $h);

		imagejpeg($new_image, $image_path, $jpeg_quality);
		
		imagedestroy($new_image);

	} catch (Exception $e) {
		
		return null;
	}
	
	return $name_image;

}*/

/**
 * Builds an HTML image tag
 * 
 * @param string
 * @param string
 * @param string
 * @return string
 */

/*function img_tag($src, $alt, $attributes = '')
{
	$format = '<img src="%s" alt="%s" %s>';

    $uri = "assets/{$src}";
    
    return sprintf($format, url($uri), $alt, $attributes);
}*/

/**
 * It gets the current day off from query string or the system
 * 
 * @return integer
 */
/*function get_day_input()
{
	$day = Input::get('day');

	if ( ! in_array($day, range(16, 26)))
	{
		$day = date('d');
	}

	return $day;
}*/

/**
 * Day filter links
 * 
 * @param integer
 * @return string
 */
/*function get_day_filter($day)
{
	$output  = '';
	//change
	for($i = 16; $i <= 26; $i++)
	{
		if ($i == $day)
		{
			$output .= '<li>' . link_to_route('home', $i, array('day' => $i), array('class' => 'active')) . '</li>';
		}
		else
		{
			$output .= '<li>' . link_to_route('home', $i, array('day' => $i)) . '</li>';
		}
	}

	for($j = date('d'); $i <= 26; $i++)
	{
		$output .= "<li><a title='$i' href='#' class='disabled'>$i</a></li>";
	}

	return $output;
}*/

/**
 * Adds 'today', 'tomorrow' or '' before an event title
 * 
 * @param object
 * @return string
 */
/*function get_event_date($article)
{
	$date = explode(' ', $article->date);

	$day  = (App::getLocale() === 'en') ? $date[1] : $date[0];

	if ($day < date('d'))
	{
		return $article->title;
	}

	if ($day == date('d'))
	{
		return trans('strings.today') . ': ' . $article->title;
	}
	
	if ($day > date('d'))
	{
		return trans('strings.tomorrow') . ': ' . $article->title;
	}
}*/

/**
 * Display search result count
 * 
 * @param object
 * @return string
 */
/*function get_search_results($articles)
{
	$count = count($articles);

	if ($count === 1)
	{
		return trans('strings.result', array('count' => $count));
	}

	return trans('strings.results', array('count' => $count));
}
*/
/**
 * Language filter
 * 
 * @param object
 * @return string
 */
/*function filter_articles_by($column, $value, $text)
{
	$input = Input::except('language');

	$attributes = (Input::get('language') !== $value) ? array() : array('class' => 'active');

	return link_to_route(Route::currentRouteName(), $text, $input + array($column => $value), $attributes);
}*/

/**
 * Table sorting
 * 
 * @param object
 * @return string
 */
/*function sort_articles_by($column, $text)
{
	$input = Input::except('sort', 'direction');

	$direction = (Input::get('direction') == 'asc') ? 'desc' : 'asc';

	return link_to_route(Route::currentRouteName(), $text, $input + array('sort' => $column, 'direction' => $direction));
}*/

/**
 * Get link to buy a ticket
 * 
 * @param object
 * @return string
 */
/*function get_event_ticket($article)
{
	if ( ! $article->with_ticket) return '';

	$date = explode(' ', $article->date);

	$day  = (App::getLocale() === 'en') ? $date[1] : $date[0];

	$text = ($article->ticket) ? trans('strings.buy_tickets') : trans('strings.free_event');

	if ($day < date('d'))
	{
		return '<a class="btn-buy-tickets btn-buy-tickets-disabled" href="#">' . $text . '</a>';
	}

	$link = ( ! $article->ticket) ? '#' : $article->ticket;

	return '<a class="btn-buy-tickets" href="' . $link . '" target="_blank">' . $text . '</a>';
}
*/