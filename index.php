<?php 
// Extract JSON FROM THE STRING FUNCTION
$string =  '[{"name": "John Doe", "age" : 23},{"name": "Jane Doe", "age": 24}]';

// Regular Expression to Extract JSON from String.
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


preg_match_all($pattern, $string, $matches);

print_r($matches[0]); //Dispay the Extracted JSON.
