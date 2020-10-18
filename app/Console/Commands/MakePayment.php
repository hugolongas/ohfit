<?php

namespace App\Console\Commands;
use Illuminate\Http\Request;
use Illuminate\Console\Command;
use PayPal\Api\Amount;
use PayPal\Api\Item;

/** All Paypal Details class **/

use PayPal\Rest\ApiContext;
use PayPal\Auth\OAuthTokenCredential;
use PayPal\Api\ItemList;
use PayPal\Api\Payer;
use PayPal\Api\Payment;
use PayPal\Api\RedirectUrls;
use PayPal\Api\Transaction;
use Redirect;
use Session;
use URL;
use App\Product;

class MakePayment extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'command:makePayment';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Make contact';

    
    protected $_product;
    protected $_apiContext;


    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct(Product $product)
    {
        
        $this->_product = $product;
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
    public function handle()
    {
        $idForm = $this->_product->id; 
        $confirmUrl = route('trainingComplete', ['idForm' => $idForm]);
        $cancelUrl = route('training');

        $payer = new Payer();
        $payer->setPaymentMethod('paypal');

        $item = new Item();
        $item->setName($this->_product->training->name)
        ->setCurrency('EUR')
        ->setQuantity(1)
        ->setPrice($this->_product->price);
        $itemList = new ItemList();
        $itemList->setItems(array($item));
        $amount = new Amount();
        $amount->setCurrency('EUR')
        ->setTotal($this->_product->price);
        $transaction = new Transaction();
        $transaction->setAmount($amount)
        ->setItemList($itemList)
        ->setDescription($this->_product->training->description);
        $redirect_urls = new RedirectUrls();
        $redirect_urls->setReturnUrl($confirmUrl)
        ->setCancelUrl($cancelUrl);

        $payment = new Payment();
        $payment->setIntent('Sale')
        ->setPayer($payer)
        ->setRedirectUrls($redirect_urls)
        ->setTransactions(array($transaction));

        try{
            $payment->create($this->_apiContext);
        }catch (\PayPal\Exception\PPConnectionException $ex) {

            if (\Config::get('app.debug')) {

                \Session::put('error', 'Connection timeout');
                return Redirect::to('/');

            } else {

                \Session::put('error', 'Some error occur, sorry for inconvenient');
                return Redirect::to('/');

            }

        }

        foreach ($payment->getLinks() as $link) {

            if ($link->getRel() == 'approval_url') {

                $redirect_url = $link->getHref();
                break;

            }

        }
        /** add payment ID to session **/
        Session::put('paypal_payment_id', $payment->getId());

        if (isset($redirect_url)) {

            /** redirect to paypal **/
            return Redirect::away($redirect_url);

        }

        \Session::put('error', 'Unknown error occurred');
        return Redirect::to('/training');
    }
}
