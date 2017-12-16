<?php
/**
 * LaraClassified - Geo Classified Ads CMS
 * Copyright (c) BedigitCom. All Rights Reserved
 *
 * Website: http://www.bedigit.com
 *
 * LICENSE
 * -------
 * This software is furnished under a license and may be used and copied
 * only in accordance with the terms of such license and with the inclusion
 * of the above copyright notice. If you Purchased from Codecanyon,
 * Please read the full License from here - http://codecanyon.net/licenses/standard
 */

namespace App\Observer;

use App\Models\HomeSection;
use Illuminate\Support\Facades\Cache;

class HomeSectionObserver
{
    /**
     * Listen to the Entry saved event.
     *
     * @param  HomeSection $homeSection
     * @return void
     */
    public function saved(HomeSection $homeSection)
    {
        // Removing Entries from the Cache
        $this->clearCache($homeSection);
    }
    
    /**
     * Listen to the Entry deleted event.
     *
     * @param  HomeSection $homeSection
     * @return void
     */
    public function deleted(HomeSection $homeSection)
    {
        // Removing Entries from the Cache
        $this->clearCache($homeSection);
    }
    
    /**
     * Removing the Entity's Entries from the Cache
     *
     * @param $homeSection
     */
    private function clearCache($homeSection)
    {
        Cache::forget('homeSections');
    }
}
