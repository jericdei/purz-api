<?php

use Jericdei\PsgcDatabase\Models\City;

$city = City::find('1380600000');

dd($city->barangays);
