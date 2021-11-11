<?php

namespace App\Http\Controllers;

use App\Coupon;
use App\Store;

class AffiliateRedirectController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke($cid)
    {
        $coupon = Coupon::select('affiliate_url', 'store_id')->whereId($cid)->first();

        abort_if(!$coupon, 404);

        if ($coupon->affiliate_url) {
            return redirect($coupon->affiliate_url);
        }

        $store = Store::select('affiliate_url', 'website_url')->find($coupon->store_id);

        abort_if(!$store, 404);

        if ($store->affiliate_url) {
            return redirect($store->affiliate_url);
        }

        if ($store->website_url) {
            return redirect($store->website_url);
        }

        abort(404);
    }
}
