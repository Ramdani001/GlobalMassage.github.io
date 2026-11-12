<?php
if (!function_exists('money')) { function money($amount): string { return 'Rp '.number_format((float)$amount,0,',','.'); } }
