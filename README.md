# AimaneCouissi_StripeWebhookSignatureBypass

[![Latest Stable Version](http://poser.pugx.org/aimanecouissi/module-stripe-webhook-signature-bypass/v)](https://packagist.org/packages/aimanecouissi/module-stripe-webhook-signature-bypass) [![Total Downloads](http://poser.pugx.org/aimanecouissi/module-stripe-webhook-signature-bypass/downloads)](https://packagist.org/packages/aimanecouissi/module-stripe-webhook-signature-bypass) [![Magento Version Require](https://img.shields.io/badge/magento-~2.4.0-E68718)](https://packagist.org/packages/aimanecouissi/module-stripe-webhook-signature-bypass) [![License](http://poser.pugx.org/aimanecouissi/module-stripe-webhook-signature-bypass/license)](https://packagist.org/packages/aimanecouissi/module-stripe-webhook-signature-bypass) [![PHP Version Require](http://poser.pugx.org/aimanecouissi/module-stripe-webhook-signature-bypass/require/php)](https://packagist.org/packages/aimanecouissi/module-stripe-webhook-signature-bypass)

Bypasses Stripe webhook signature verification to allow local testing against real event payloads when Stripe cannot reach your machine. Also suppresses the **Webhooks Unconfigured** admin notification to reduce noise during development.

> [!CAUTION]
> This module is intended for development environments only and must **never** be enabled on a **production store**.

## Installation
```bash
composer require --dev aimanecouissi/module-stripe-webhook-signature-bypass
bin/magento module:enable AimaneCouissi_StripeWebhookSignatureBypass
bin/magento setup:upgrade
bin/magento cache:flush
```

## Usage

Make a test payment in Magento, then in the Stripe Dashboard open **Developers → Webhooks**, select your Magento endpoint (typically `/stripe/webhooks`), and locate the relevant event delivery. Copy the request JSON and POST it to your local webhook endpoint using Postman or `curl` with `Content-Type: application/json`. The request will be accepted without a `Stripe-Signature` header and processed as if it arrived directly from Stripe.

## Uninstall
```bash
bin/magento module:disable AimaneCouissi_StripeWebhookSignatureBypass
composer remove --dev aimanecouissi/module-stripe-webhook-signature-bypass
bin/magento setup:upgrade
bin/magento cache:flush
```

## Changelog

See [CHANGELOG](CHANGELOG.md) for all recent changes.

## License

[MIT](LICENSE)
