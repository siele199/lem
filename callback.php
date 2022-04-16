<?php


       $callbackJSONData=file_get_contents('php://input');
        $callbackData=json_decode($callbackJSONData);
        $resultCode=$callbackData->Body->stkCallback->ResultCode;
        $resultDesc=$callbackData->Body->stkCallback->ResultDesc;
        $merchantRequestID=$callbackData->Body->stkCallback->MerchantRequestID;
        $checkoutRequestID=$callbackData->Body->stkCallback->CheckoutRequestID;

        $amount=$callbackData->stkCallback->Body->CallbackMetadata->Item[0]->Value;
        $mpesaReceiptNumber=$callbackData->Body->stkCallback->CallbackMetadata->Item[1]->Value;
        $balance=$callbackData->stkCallback->Body->CallbackMetadata->Item[2]->Value;
        $b2CUtilityAccountAvailableFunds=$callbackData->Body->stkCallback->CallbackMetadata->Item[3]->Value;
        $transactionDate=$callbackData->Body->stkCallback->CallbackMetadata->Item[4]->Value;
        $phoneNumber=$callbackData->Body->stkCallback->CallbackMetadata->Item[5]->Value;
        $result="'$resultDesc','$merchantRequestID','$checkoutRequestID','$amount','$mpesaReceiptNumber','$balance','$b2CUtilityAccountAvailableFunds','$transactionDate','$phoneNumber'";

          
        //Insert into all fields in mpesa table 
        // id, resultDesc, merchantRequestID, resultCode, checkoutRequestID, amount, mpesaReceiptNumber, balance, b2CUtilityAccountAvailableFunds, transactionDate, phoneNumber
        
        $insert=("INSERT INTO mpesa resultDesc,merchantRequestID,resultCode,checkoutRequestID,amount,mpesaReceiptNumber,balance,b2CUtilityAccountAvailableFunds,transactionDate,phoneNumber VALUES('$resultDesc','$merchantRequestID','$resultCode','$checkoutRequestID','$amount','$mpesaReceiptNumber','$balance','$b2CUtilityAccountAvailableFunds','$transactionDate','$phoneNumber')");
       

        //QEUERY INSER INTO THE TABLE      
        $Insert_Fuction
       
        


?>