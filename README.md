# The Jibimo PHP Sample API
This project contains sample PHP code for Jibimo business API.

The Jibimo APIs are currently in three parts. With part one, you can make and validate a pay transaction which means you can pay money from your Jibimo account to a person. (Pay with phone number)

With part two, you can request money from your friends and charge them, and validate their payment. (Payment Gateway)

With part three, you can directly pay to a bank account and validate it as well. (Direct Pay with IBAN)

File structure:

```text
functions.php ==> This file contains some helper functions to send HTTP requests to Jibimo server.

pay.php ==> Use this file to pay to anyone from your Jibimo account.
pay-validation.php ==> Validate your payments using this file.

request.php ==> Use this file to charge people whenever they are in Jibimo or not.
request-validation.php ==> Use this file to validate you charges.

extended-pay.php ==> Use this file to directly pay to a bank account.
extended-pay-validation.php ==> Use this file to validate your direct payments to bank accounts.
```


You can change between Jibimo sandbox sever and main production server by adding or removing `sandbox` part from the URLs in sample codes.

## API Documentation

For API documentation please visit https://jibimo.com/api/documentation
