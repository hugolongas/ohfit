<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use PayPal\Api\Amount;
use PayPal\Api\Item;

/** All Paypal Details class **/

use PayPal\Rest\ApiContext;
use PayPal\Auth\OAuthTokenCredential;
use PayPal\Api\Payment;
use PayPal\Api\PaymentExecution;
use Redirect;
use Session;
use URL;
class CheckPayment extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'command:name';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    
    protected $_apiContext;

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        $paypal_conf = \Config::get('paypal');
        $this->_apiContext = new ApiContext(new OAuthTokenCredential(
            $paypal_conf['client_id'],
            $paypal_conf['secret'])
        );
        $this->_apiContext->setConfig($paypal_conf['settings']); 
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle(Request $request)
    {
         /** Get the payment ID before session clear **/
         $payment_id = Session::get('paypal_payment_id');/** clear the session payment ID **/
         Session::forget('paypal_payment_id');
         $payerID = $request->PayerID;
         $token = $request->token;
         if (empty($payerID) || empty($token)) {            
             return false;
            }
            $payment = Payment::get($payment_id, $this->_apiContext);
            $execution = new PaymentExecution();
            $execution->setPayerId($payerID);/**Execute the payment **/
            $result = $payment->execute($execution, $this->_apiContext);
            if ($result->getState() == 'approved') {
                return true;
            }
            return false;
    }
}
