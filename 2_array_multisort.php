<?php
/**
 * file_name
 *
 * Oct 31, 2018
 *
 */

/*
 * 2. Given the above example array again. Write a php function/method to sort the array based on a key OR keys
 * regardless of what level it or they occurs with in the array ( i.e. sort by last_name AND sort by account_id ).
 * HINT: Recursion is your friend.
 *
 *
 */
$st_array = array(
    array(
        'guest_id' => 177,
        'guest_type' => 'crew',
        'first_name' => 'Marco',
        'middle_name' => NULL,
        'last_name' => 'Burns',
        'gender' => 'M',
        'guest_booking' => array(
            array(
                'booking_number' => 20008683,
                'ship_code' => 'OST',
                'room_no' => 'A0073',
                'start_time' => 1438214400,
                'end_time' => 1483142400,
                'is_checked_in' => true
            )
        ),
        'guest_account' => array(
            array(
                'account_id' => 20009503,
                'status_id' => 2,
                'account_limit' => 0,
                'allow_charges' => true
            )
        )
    ),
    array(
        'guest_id' => 10000113,
        'guest_type' => 'crew',
        'first_name' => 'Bob Jr ',
        'middle_name' => 'Charles',
        'last_name' => 'Hemingway',
        'gender' => 'M',
        'guest_booking' => array(
            array(
                'booking_number' => 10000013,
                'room_no' => 'B0092',
                'is_checked_in' => true
            )
        ),
        'guest_account' => array(
            array(
                'account_id' => 10000522,
                'account_limit' => 300,
                'allow_charges' => true
            )
        )
    ),
    array(
        'guest_id' => 10000114,
        'guest_type' => 'crew',
        'first_name' => 'Al ',
        'middle_name' => 'Bert',
        'last_name' => 'Santiago',
        'gender' => 'M',
        'guest_booking' => array(
            array(
                'booking_number' => 10000014,
                'room_no' => 'A0018',
                'is_checked_in' => true
            )
        ),
        'guest_account' => array(
            array(
                'account_id' => 10000013,
                'account_limit' => 300,
                'allow_charges' => true
            )
        )
    ),
    array(
        'guest_id' => 10000115,
        'guest_type' => 'crew',
        'first_name' => 'Red ',
        'middle_name' => 'Ruby',
        'last_name' => 'Flowers ',
        'gender' => 'F',
        'guest_booking' => array(
            array(
                'booking_number' => 10000015,
                'room_no' => 'A0051',
                'is_checked_in' => true
            )
        ),
        'guest_account' => array(
            array(
                'account_id' => 10000519,
                'account_limit' => 300,
                'allow_charges' => true
            )
        )
    ),
    array(
        'guest_id' => 10000116,
        'guest_type' => 'crew',
        'first_name' => 'Ismael ',
        'middle_name' => 'Jean-Vital',
        'last_name' => 'Jammes',
        'gender' => 'M',
        'guest_booking' => array(
            array(
                'booking_number' => 10000016,
                'room_no' => 'A0023',
                'is_checked_in' => true
            )
        ),
        'guest_account' => array(
            array(
                'account_id' => 10000015,
                'account_limit' => 300,
                'allow_charges' => true
            )
        )
    )
);

echo '<html><body>';

/* Change these to change sort paramters*/
$sortKeys = array(
    'gender',
    'booking_number'
);

stMultiSort($st_array, $sortKeys);

/* make sure to pass by reference  */
function stMultiSort(array &$array, array $sortKeys)
{
    $arrValue = [];
    $counter = 0;
    /* iterate through the user defined fields */
    /* create an array of value for each user defined field */
    foreach ($sortKeys as $value) {
        /* recursively walk array, find all values for user defined key */
        array_walk_recursive($array, function ($v, $k) use (&$arrValue, $value, $counter) {
            if ($k == $value) {
                $arrValue[$counter][] = $v;
            }
        });
        /* Need to have the sort flag as its own element */
        $counter ++;
        $arrValue[$counter] = SORT_ASC;
        $counter ++;
    }   
    
    /* counter already incremented at end of loop */
    $arrValue[$counter] = &$array;
    /* Pass by reference so that call_user_func_array will sort the array */
    call_user_func_array('array_multisort', $arrValue);
}
echo '<pre>';
var_dump($st_array);
echo '</pre>';
echo '</body></html>';
?>