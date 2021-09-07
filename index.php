<?php

$string =  'This is a string data different from JSON, which needs to be removed.  JSON >> [{"name": "John Doe", "age" : 23},{"name": "Jane Doe", "age": 24}]'; //Simple Raw string with gibber values.

// Pattern to Extract JSON from the Raw String.
$pattern = '
/
\{              # { character
    (?:         # non-capturing group
        [^{}]   # anything that is not a { or }
        |       # OR
        (?R)    # recurses the entire pattern
    )*          # previous group zero or more times
\}              # } character
/x
';


preg_match_all($pattern, $string, $matches); //Match the Given String to the JSON Format.

$finalJson = $matches[0]; //Dispay the Extracted JSON*

foreach($finalJson as $data)
{
	$values = json_decode($data, true); 
	$outputarr[] = $values ;

} 
echo json_encode($outputarr); //Print the Output JSON Array on to the Screen.
	
# > *: Extracted JSON is converted to array of JSON String. Which is then converted to JSON array in Line 23