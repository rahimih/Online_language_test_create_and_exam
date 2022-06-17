<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class BankController extends Controller
{
    //

    public function pay()
    {
        $terminalId = "5860235";                            //-- شناسه ترمینال
        $userName = "language1399";                            //-- نام کاربری
        $userPassword = "24820285";                            //-- کلمه عبور
        $orderId = "140065";	                                //-- شناسه فاکتور
        $amount = "10000";                            //-- مبلغ به ریال
        $callBackUrl = "https://l-tests.com/verify.php";    //-- لینک کال بک
        $localDate = date('Ymd');
        $localTime = date('Gis');
        $additionalData = "";
        $payerId = 0;

//-- تبدیل اطلاعات به آرایه برای ارسال به بانک
        $parameters = array(
            'terminalId' => $terminalId,
            'userName' => $userName,
            'userPassword' => $userPassword,
            'orderId' => $orderId,
            'amount' => $amount,
            'localDate' => $localDate,
            'localTime' => $localTime,
            'additionalData' => $additionalData,
            'callBackUrl' => $callBackUrl,
            'payerId' => $payerId
        );
        require_once('nusoap.php');
        $client = new nusoap_client('https://bpm.shaparak.ir/pgwchannel/services/pgw?wsdl');
        $namespace = 'http://interfaces.core.sw.bps.com/';
        $result = $client->call('bpPayRequest', $parameters, $namespace);

//-- بررسی وجود خطا
        if ($client->fault) {
            //-- نمایش خطا
            die("خطا در اتصال به وب سرویس بانک");
        } else {
            $err = $client->getError();

            if ($err) {
                //-- نمایش خطا
                die($err);
            } else {
                $res = explode(',', $result);
                $ResCode = $res[0];

                if ($ResCode == "0") {
                    //-- انتقال به درگاه پرداخت
                    echo "<form name='myform' action='https://bpm.shaparak.ir/pgwchannel/startpay.mellat' method='POST'><input type='hidden' id='RefId' name='RefId' value='{$res[1]}'></form><script type='text/javascript'>window.onload = formSubmit; function formSubmit() { document.forms[0].submit(); }</script>";
                } else {
                    //-- نمایش خطا
                    die($result);
                }
            }
        }
    }

    public function verify()
    {
        $terminalId = "5860235";                            //-- شناسه ترمینال
        $userName = "language1399";                            //-- نام کاربری
        $userPassword = "24820285";

        $ResCode = (isset($_POST['ResCode']) && $_POST['ResCode'] != "") ? $_POST['ResCode'] : "";

        if ($ResCode == '0') {
            $client = new nusoap_client('https://bpm.shaparak.ir/pgwchannel/services/pgw?wsdl');
            $namespace = 'http://interfaces.core.sw.bps.com/';
            $orderId = (isset($_POST['SaleOrderId']) && $_POST['SaleOrderId'] != "") ? $_POST['SaleOrderId'] : "";
            $verifySaleOrderId = (isset($_POST['SaleOrderId']) && $_POST['SaleOrderId'] != "") ? $_POST['SaleOrderId'] : "";
            $verifySaleReferenceId = (isset($_POST['SaleReferenceId']) && $_POST['SaleReferenceId'] != "") ? $_POST['SaleReferenceId'] : "";

            $parameters = array(
                'terminalId' => $terminalId,
                'userName' => $userName,
                'userPassword' => $userPassword,
                'orderId' => $orderId,
                'saleOrderId' => $verifySaleOrderId,
                'saleReferenceId' => $verifySaleReferenceId
            );

            $result = $client->call('bpVerifyRequest', $parameters, $namespace);

            if ($result == 0) {
                $result = $client->call('bpSettleRequest', $parameters, $namespace);

                if ($result == 0) {
                    //-- تمام مراحل پرداخت به درستی انجام شد.
                    die("عملیات پرداخت با موفقیت انجام شد, شناسه پیگیری تراکنش : {$verifySaleReferenceId}");
                } else {
                    $client->call('bpReversalRequest', $parameters, $namespace);

                    //-- نمایش خطا
                    $error_msg = (isset($result) && $result != "") ? $result : "خطا در ثبت درخواست واریز وجه";
                    die($error_msg);
                }
            } else {
                $client->call('bpReversalRequest', $parameters, $namespace);

                //-- نمایش خطا
                $error_msg = (isset($result) && $result != "") ? $result : "خطا در عملیات وریفای تراکنش";
                die($error_msg);
            }
        } else {
            //-- نمایش خطا
            $error_msg = (isset($ResCode) && $ResCode != "") ? $ResCode : "تراکنش ناموفق";
            die($error_msg);
        }


    }
}
