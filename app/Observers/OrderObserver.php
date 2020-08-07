<?php

namespace App\Observers;
use App\Models\Order;
use App\Models\Log;
use App\User;
use Illuminate\Support\Facades\Auth;

class OrderObserver
{
    /**
     * Handle the order "created" event.
     *
     * @param  Order  $order
     * @return void
     */
    public function created(Order $order)
    {
        $log = new Log();
        $log->user_id =  Auth::user() ? Auth::user()->id : 'anonymous';
        $log->action = "Created";
        $log->url = "locahost";
        $log->contentId = 'test-working';

        $log->save();
    }

    /**
     * Handle the order "updated" event.
     *
     * @param  Order  $order
     * @return void
     */
    public function updated(Order $order)
    {
        $log = new Log();
        $log->user_id =  Auth::user() ? Auth::user()->id : 'anonymous';
        $log->action = "update";
        $log->url = "locahost";
        $log->contentId =
            $order->getOriginal('id')+','+$order->getOriginal('status')+','+$order->getOriginal('comment');

        $log->save();
    }

    /**
     * Handle the order "deleted" event.
     *
     * @param  Order  $order
     * @return void
     */
    public function deleted(Order $order)
    {
        $log = new Log();
        $log->user_id =  Auth::user() ? Auth::user()->id : 'anonymous';
        $log->action = "Delected";
        $log->url = "locahost";
        $log->contentId = 'test-working';

        $log->save();
    }

    /**
     * Handle the order "restored" event.
     *
     * @param  Order  $order
     * @return void
     */
    public function restored(Order $order)
    {
        //
    }

    /**
     * Handle the order "force deleted" event.
     *
     * @param  Order  $order
     * @return void
     */
    public function forceDeleted(Order $order)
    {
        //
    }
}
